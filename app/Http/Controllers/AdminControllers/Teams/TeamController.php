<?php

namespace App\Http\Controllers\AdminControllers\Teams;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Team\TeamCategory;
use App\Models\Team\TeamModel;
use App\Models\Team\Achievements;
use App\Models\Team\Certificates;
use App\Models\Team\MountainSubmitted;
use Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $bod = TeamModel::where('category','1')->orderBy('id','desc')->get();
         $int = TeamModel::where('category','2')->orderBy('id','desc')->get();
         $office = TeamModel::where('category','3')->orderBy('id','desc')->get();
         $field = TeamModel::where('category','4')->orderBy('id','desc')->get();
        return view('admin.team.index', compact('bod','int','office','field'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $achievement = Achievements::all();
        $certificates = Certificates::all();
        $mountains = MountainSubmitted::all();
        $category = TeamCategory::where('team_parent','0')->get();
        $category2 = TeamCategory::where('team_parent','4')->get();
        $ordering = TeamModel::max('ordering');
        $ordering = $ordering + 1;
        return view('admin.team.create', compact('category','ordering','achievement','certificates','mountains','category2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->ajax()) {
            // dd($request->all());
        $request->validate([
          'name'=>'required',                
        ]);

        $banner_width = env('BANNER_WIDTH');
        $banner_height = env('BANNER_HEIGHT');

        // $thumbnail_width = env('BANNER_WIDTH');
        // $thumbnail_height = env('BANNER_HEIGHT');

        $data = $request->all();           

        /*************Banner Upload************/
        $file =  $request->file('banner');
        $banner_name = '';
        if($request->hasfile('banner')){
        $banner = $request->file('banner')->getClientOriginalName();
        $extension = $request->file('banner')->getClientOriginalExtension();
        $banner = explode('.', $banner);
        $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('uploads/team');

        $banner_picture = Image::make($file->getRealPath());
        //$width = Image::make($file->getRealPath())->width();
        //$height = Image::make($file->getRealPath())->height();     
        $banner_picture->resize($banner_width, $banner_height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath .'/'. $banner_name ); 
      }

      /******Upload Thumbnail******/
      $thumb_file =  $request->file('thumbnail');
      $thumbnail_name = '';
        if($request->hasfile('thumbnail')){
        $thumbnail = $request->file('thumbnail')->getClientOriginalName();
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        $thumbnail = explode('.', $thumbnail);
        $thumbnail_name = Str::slug($thumbnail[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('uploads/team');

        $thumbnail_picture = Image::make($thumb_file->getRealPath());
        $width = Image::make($thumb_file->getRealPath())->width();
        $height = Image::make($thumb_file->getRealPath())->height();     
        $thumbnail_picture->resize($width, $height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath .'/'. $thumbnail_name ); 
      }
      /*****************************/

       $data['team_key'] = time().rand(500000,999999999);
      $data['uri'] = Str::slug($request->uri); 
      $data['banner'] = $banner_name;     
      $data['thumbnail'] = $thumbnail_name;    
       
      
      $is_draft  = '0';
      if($request->submit == 'publish'){
        $is_draft = '0';
      }else if($request->submit == 'draft'){
        $is_draft = '1';
      }
       $isChecked = $request->has('published');       
      $data['published'] = ($isChecked)?'1':'0';
      $data['is_draft'] = $is_draft; 
      $result = TeamModel::create($data);
      $last_id = $result->id;

      
       // Insert into Mountain

      if(isset($request->mountain_ordering)){
        $info_keys = array_keys($request->mountain_ordering);   
        $sn_info = 1;
        $sn_info_count = count($request->mountain_ordering);
        foreach($info_keys as $key){
          if( $key + 1 >= $sn_info_count ){
            continue;
          }
          $MemberMountain = new MountainSubmitted();
          $MemberMountain->team_id = $last_id;       
          $MemberMountain->ordering = $request->mountain_ordering[$key];   
          $MemberMountain->mountain = $request->mountain_name[$key];    
          $MemberMountain->total = $request->total_submitted[$key];
           $MemberMountain->year = $request->year[$key];    
          $MemberMountain->link = $request->link[$key];
          $MemberMountain->save(); 
          $sn_info++;     
        }
      }
    

      // Insert into Achievements
      if(isset($request->achievement_ordering)){
        $faqs_keys = array_keys($request->achievement_ordering);   
        $sn_faqs = 1;
        $sn_faqs_count = count($request->achievement_ordering);
        foreach($faqs_keys as $key){
          if( $key + 1 >= $sn_faqs_count ){
            continue;
          }
          $MemberAchievement = new Achievements();
          $MemberAchievement->team_id = $last_id;       
          $MemberAchievement->ordering = $request->achievement_ordering[$key];   
          $MemberAchievement->title = $request->achievement_title[$key]; 
         
          $MemberAchievement->save(); 
          $sn_faqs++;     
        }
      }
      
       // Insert into Certificates
            if (isset($request->certificates_ordering)) {
                $gear_keys = array_keys($request->certificates_ordering);
                $sn_gear = 1;
                $sn_gear_count = count($request->certificates_ordering);
                foreach ($gear_keys as $key => $value) {
                    if ($key + 1 >= $sn_gear_count) {
                        continue;
                    }
                    $MemberCertificate = new Certificates();
                    $MemberCertificate->team_id = $last_id;
                    $thumb_file = $request->file('image');
                    if (isset($thumb_file[$value])) {
                        $thumb = time() . '-' . Str::random(15) . $thumb_file[$value]->getClientOriginalName();
                        $destinationPath = public_path('uploads/team');
                        $thumb_file[$value]->move($destinationPath, $thumb);
                        $MemberCertificate->image = $thumb;
                    }
             $MemberCertificate->ordering = $request->certificates_ordering[$key];   
            $MemberCertificate->title = $request->certificates_title[$key];  
                    $MemberCertificate->save();
                    $sn_gear++;
                }
            }


      return response()->json(['status' => 'success', 'message' => 'Member Added Successfully']);
    }
    return false;

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = TeamModel::find($id);     
       $category = TeamCategory::where('team_parent','0')->get();
        $category2 = TeamCategory::where('team_parent','4')->get();
        $mountains = $data->mountains()->get();
        $achievements = $data->achievements()->get();
        $certificates = $data->certificates()->get();
       
        return view('admin.team.edit',compact('data','category','mountains','achievements','certificates',
        'category2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {     
      if ($request->ajax()) {  

        $is_draft = 0;
        if($request->submit == 'publish'){
          $is_draft = 0;
        }else if($request->submit == 'draft'){
          $is_draft = 1;
        }
      
      $banner_width = env('BANNER_WIDTH');
      $banner_height = env('BANNER_HEIGHT');

      $data = TeamModel::find($id);  
      
      $file =  $request->file('banner');
      $thumbnail_file =  $request->file('thumbnail');    
      $banner_name = '';
      $thumbnail_name = '';
     
      if($request->hasfile('banner')){
        $data = TeamModel::find($id); 
        if($data->banner){
          if(file_exists(env('PUBLIC_PATH').'uploads/team/' . $data->banner)){
            unlink(env('PUBLIC_PATH').'uploads/team/' . $data->banner);
          }
        }
        $banner = $request->file('banner')->getClientOriginalName();
        $extension = $request->file('banner')->getClientOriginalExtension();
        $banner = explode('.', $banner);
        $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;
        $destinationPath = public_path('uploads/team');
        $banner_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();    

        $banner_picture->resize($banner_width, $banner_height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath .'/'. $banner_name ); 
        $data->banner = $banner_name;
      }  

      /*****Thumbnail*****/
      if($request->hasfile('thumbnail')){
        $data = TeamModel::find($id); 
        if($data->thumbnail){
          if(file_exists(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail)){
            unlink(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail);
          }
        }
        $thumbnail = $request->file('thumbnail')->getClientOriginalName();
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        $thumbnail = explode('.', $thumbnail);
        $thumbnail_name = Str::slug($thumbnail[0]) . '-' . Str::random(40) . '.' . $extension;
        $destinationPath = public_path('uploads/team');
        $thumbnail_picture = Image::make($thumbnail_file->getRealPath());
        $width = Image::make($thumbnail_file->getRealPath())->width();
        $height = Image::make($thumbnail_file->getRealPath())->height();    

        $thumbnail_picture->resize($width, $height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath .'/'. $thumbnail_name ); 
        $data->thumbnail = $thumbnail_name;
      }   

       $data['team_key'] = time().rand(500000,999999999);
      $data->name = $request->name;
      $data->position = $request->position;
      $data->category = $request->category;
       $data->subcategory = $request->subcategory;
      $data->phone = $request->phone;
      $data->email = $request->email;
      $data->brief = $request->brief; 
      $data->content = $request->content; 
      $data->ordering = $request->ordering; 
      $data->fb_url = $request->fb_url; 
      $data->instagram_url = $request->instagram_url; 
      $data->twitter_url = $request->twitter_url; 
      $data->linkedin_url = $request->linkedin_url;
       $data->uri = Str::slug($request->uri);
        $isChecked = $request->has('published');
      $data->published = ($isChecked)?'1':'0';   
      $isChecked = $request->has('status');
      $data->status = ($isChecked)?'1':'0';     
      $data->is_draft = $is_draft;      
      $_data = TeamModel::find($id);
        

    // Update Mountains        
     if(isset($request->mountain_ordering)){
        $mountain_keys = array_keys($request->mountain_ordering); 
        $sn_mountain = 1;
        $sn_mountain_count = count($request->mountain_ordering);  
        foreach($mountain_keys as $key=>$value){          
            if($key + 1 >= $sn_mountain_count){
              continue;
            }          
          if($request->mountains_id[$value] == ""){
              $mountainData = new MountainSubmitted();
              $mountainData->team_id = $data->id;
              $mountainData->ordering = $request->mountain_ordering[$key];
              $mountainData->mountain = $request->mountain_name[$key];
              $mountainData->total = $request->total_submitted[$key]; 
              $mountainData->year = $request->year[$key]; 
              $mountainData->link = $request->link[$key]; 
              $mountainData->save();  
          } else if($request->mountains_id[$value] !== NULL && $request->mountains_id[$value] !== ""){
            $mountains_id = $request->mountains_id[$value];
              $mountainData = MountainSubmitted::find($mountains_id);
              $mountainData->team_id = $data->id;
              $mountainData->ordering = $request->mountain_ordering[$key];
              $mountainData->mountain = $request->mountain_name[$key];
              $mountainData->total = $request->total_submitted[$key]; 
              $mountainData->year = $request->year[$key]; 
              $mountainData->link = $request->link[$key]; 
              $mountainData->save(); 
          }         
          $sn_mountain++;
        }
      }

     //  //update achievements
       if(isset($request->achievement_id)){
        $achievement_keys = array_keys($request->achievement_id); 
        $sn_achievement = 1;
        $sn_achievement_count = count($request->achievement_id);  
        foreach($achievement_keys as $key=>$value){          
            if($key + 1 >= $sn_achievement_count){
              continue;
            }          
          if($request->achievement_id[$value] == ""){
              $achievementData = new Achievements();
              $achievementData->team_id = $data->id;
              $achievementData->ordering = $request->achievement_ordering[$key];
              $achievementData->title = $request->achievement_title[$key]; 
              $achievementData->save();  
          } else if($request->achievement_id[$value] !== NULL && $request->achievement_id[$value] !== ""){
            $achievement_id = $request->achievement_id[$value];
              $achievementData = Achievements::find($achievement_id);
              $achievementData->team_id = $data->id;
              $achievementData->ordering = $request->achievement_ordering[$key];
              $achievementData->title = $request->achievement_title[$key]; 
              $achievementData->save(); 
          }         
          $sn_achievement++;
        }
      }
     

      // Update Certificates        
     
     if (isset($request->certificates_id)) {
                $certificates_keys = array_keys($request->certificates_id);
                $sn_certificates = 1;
                $sn_certificate_count = count($request->certificates_id);

                foreach ($certificates_keys as $key => $value) {
                    if ($key + 1 >= $sn_certificate_count) {
                        continue;
                    }

                    if ($request->certificates_id[$value] == "") {
                        $certificateData = new Certificates();
                        $certificateData->team_id = $data->id;
                        $thumb_file = $request->file('image');
                        if (isset($thumb_file[$value])) {
                            $thumb = $thumb_file[$value]->getClientOriginalName();
                            $destinationPath = public_path('uploads/team');
                            $thumb_file[$value]->move($destinationPath, $thumb);
                            $certificateData->image = $thumb;
                        }
                        $certificateData->ordering = $request->certificates_ordering[$key];
                        $certificateData->title = $request->certificates_title[$key];                       
                       
                        $certificateData->save();
                    } else if ($request->certificates_id[$value] !== null && $request->certificates_id[$value] !== "") {
                        $certificates_id = $request->certificates_id[$value];
                        $certificateData = Certificates::find($certificates_id);

                        $thumb_file = $request->file('image');
                        if (isset($thumb_file[$key])) {

                            if ($certificateData->image) {
                                if (file_exists(env('PUBLIC_PATH') . 'uploads/team/' . $certificateData->image)) {
                                    unlink(env('PUBLIC_PATH') . 'uploads/team/' . $certificateData->image);
                                }
                            }

                            $thumb = $thumb_file[$key]->getClientOriginalName();
                            $destinationPath = public_path('uploads/team');
                            $thumb_file[$key]->move($destinationPath, $thumb);
                            $certificateData->image = $thumb;
                        }
                        $certificateData->team_id = $data->id;
                        $certificateData->ordering = $request->certificates_ordering[$key];
                        $certificateData->title = $request->certificates_title[$key];                    
                        $certificateData->save();
                    }

                    $sn_certificates++;
                }
            }

      $data->save();
      return response()->json(['status' => 'success', 'message' => 'Member Updated Successful!']);
    }
    return false;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         $data = TeamModel::find($id);
      if($data->banner  != NULL){
        if(file_exists(env('PUBLIC_PATH').'uploads/team/' . $data->banner)){
          unlink(env('PUBLIC_PATH').'uploads/team/' . $data->banner);
        }
      }    
      if($data->thumbnail  != NULL){
        if(file_exists(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail)){
          unlink(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail);
        }
      }      
    
      $data->certificates()->delete();
      $data->mountains()->delete();
      $data->achievements()->delete();
      $data->delete();
      return 'Are you sure to delete?';
    }

    public function mountainsdestroy($team_id,$id)
    {
      $data = MountainSubmitted::find($id);      
      $data->delete();    
    }

     public function achievementdestroy($team_id,$id)
    {
      $data = Achievements::find($id);      
      $data->delete();
    
    }

     public function certificatesdestroy($team_id,$id)
    {
        $data = Certificates::find($id);
         if($data->image  != NULL){
            unlink('uploads/team/' . $data->image );
        }
        $data->delete();
        return 'Are you sure to delete?';    
    }

     public function thumbdelete($id)
    {
        $data = TeamModel::find($id);
     if($data->thumbnail){      
      if(file_exists(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail)){
        unlink(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail);
      }
    }
    $data->thumbnail = NULL;
    $data->save();
    return response('Delete Successful.');
    }

     public function bannerdelete($id)
    {
        $data = TeamModel::find($id);
     if($data->banner){      
      if(file_exists(env('PUBLIC_PATH').'uploads/team/' . $data->banner)){
        unlink(env('PUBLIC_PATH').'uploads/team/' . $data->banner);
      }
    }
    $data->banner = NULL;
    $data->save();
    return response('Delete Successful.');
    }
}
