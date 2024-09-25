<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\ActivityGroupModel;
use App\Models\Travels\DestinationModel;
use Image;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ActivityModel::orderBy('id','desc')->get();
        return view('admin.activities.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // List Activity Template
      $fileList = scandir(resource_path('views/themes/default/'));
      $filterArray = $this->filter_activity_template($fileList);

      $filename = array();
      foreach ($filterArray as $filterArr) {
        $filename[] = $this->remove_extention($filterArr);
      }
      $file1 = array('template-triplist'=>'Choose Template');
      foreach ($filename as $file) {
        $file1[$file] = $file;
      }
      $templates = $file1; 

      /*********/

        $ordering = 0;
        $ord = ActivityModel::max('ordering');
        $ordering += $ord + 1;
        $activities = ActivityGroupModel::all();
        $destinations = DestinationModel::all();
        return view('admin.activities.create', compact('ordering','activities','destinations','templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'title'=>'required'        
        ]);

        $banner_width = env('BANNER_WIDTH');
        $banner_height = env('BANNER_HEIGHT');

        $data = $request->all();
        $file =  $request->file('banner');
        $banner_name = '';
        if($request->hasfile('banner')){

        $banner = $request->file('banner')->getClientOriginalName();
        $extension = $request->file('banner')->getClientOriginalExtension();
        $banner = explode('.', $banner);
        $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('uploads/banners');

        $banner_picture = Image::make($file->getRealPath());
        //$width = Image::make($file->getRealPath())->width();
        //$height = Image::make($file->getRealPath())->height();      

        $banner_picture->resize($banner_width, $banner_height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath .'/'. $banner_name ); 

      }
      
      $data['banner'] = $banner_name; 
      $data['uri'] = Str::slug($request->uri); 
      // $data['template'] = $request->template;           
      $result = ActivityModel::create($data);
      $last_id = $result->id;

      /************/
      $_data = ActivityModel::find($last_id);
      $_data->activitygroups()->attach($request->activitygroup);
      $_data->destinations()->attach($request->destination);
      /************/

      return redirect()->back()->with('message','Successfully added.');


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
      
      // List Activity Template
      $fileList = scandir(resource_path('views/themes/default/'));
      $filterArray = $this->filter_activity_template($fileList);

      $filename = array();
      foreach ($filterArray as $filterArr) {
        $filename[] = $this->remove_extention($filterArr);
      }
      $file1 = array('template-triplist'=>'Choose Template');
      foreach ($filename as $file) {
        $file1[$file] = $file;
      }
      $templates = $file1; 

      /*********/      

        $data = ActivityModel::find($id);
        $checked_destinations = array();
        $checked_activitygroups = array();
        foreach($data->destinations as $value){
         $checked_destinations[] = $value->pivot->destination_id;
        }
        foreach($data->activitygroups as $value){
         $checked_activitygroups[] = $value->pivot->activity_group_id;
        }
        $activities = ActivityGroupModel::all();
        $destinations = DestinationModel::all();
        return view('admin.activities.edit', compact('data','activities','checked_activitygroups','checked_destinations','destinations','templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title'=>'required'
      ]);

      $banner_width = env('BANNER_WIDTH');
      $banner_height = env('BANNER_HEIGHT');

      $data = ActivityModel::find($id);  
      $file = $request->file('banner'); 
      $banner_name = '';
      if($request->hasfile('banner')){
        $data = ActivityModel::find($id); 
        if($data->banner){
          if(file_exists(env('PUBLIC_PATH').'uploads/banners/' . $data->banner)){
            unlink(env('PUBLIC_PATH').'uploads/banners/' . $data->banner);
          }
        }
        $banner = $request->file('banner')->getClientOriginalName();
        $extension = $request->file('banner')->getClientOriginalExtension();
        $banner = explode('.', $banner);
        $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('uploads/banners');

        $banner_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();    

        $banner_picture->resize($banner_width, $banner_height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath .'/'. $banner_name ); 

        $data->banner = $banner_name;
      }    
         
      $data->title = $request->title;
      $data->sub_title = $request->sub_title;
      $data->template = $request->template;
      $data->excerpt = $request->excerpt;  
      $data->content = $request->content;
      $data->uri = Str::slug($request->uri);    
      $data->ordering = $request->ordering;            
      $data->meta_keyword = $request->meta_keyword;
      $data->meta_description = $request->meta_description;
 

      /************/
      $_data = ActivityModel::find($id);
      $_data->activitygroups()->detach();
      $_data->activitygroups()->attach($request->activitygroup);
      $_data->destinations()->detach();
      $_data->destinations()->attach($request->destination);
      /************/
     
      if($data->save()){
        return redirect()->back()->with('message','Update Sucessfully.');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = ActivityModel::find($id);
      if($data->banner  != NULL){
        if(file_exists(env('PUBLIC_PATH').'uploads/banners/' . $data->banner)){
          unlink(env('PUBLIC_PATH').'uploads/banners/' . $data->banner);
        }
      }
      $data->delete();
      return 'Are you sure to delete?';
    }

    // Filter Template Child
    private function filter_activity_template($template){
      $tmpl2 = array();
      if(!empty($template)){
        foreach($template as $tmpl){
          if(strpos($tmpl, "template-activity-") !== false){
            $tmpl2[] = $tmpl;
          }   
        }
      }
      return $tmpl2;
    }

    // Remove Extention
    private function remove_extention($filename){
      $exp = explode('.',$filename);
      $file = $exp[0];
      return $file;
    }

    
     // Delete  Thumbnail
     function delete_activity_thumb(ActivityModel $activityModel, $id){
      $data = ActivityModel::find($id);
      if($data->banner){
       if(file_exists(env('PUBLIC_PATH').'uploads/banners/' . $data->banner)){
         unlink(env('PUBLIC_PATH').'uploads/banners/' . $data->banner);
       }
     }
     $data->banner = NULL;
     $data->save();
     return response('Delete Successful.');
   }
}
