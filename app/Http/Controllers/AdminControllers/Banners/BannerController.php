<?php
namespace App\Http\Controllers\AdminControllers\Banners;

use App\Http\Controllers\Controller;
use App\Models\Banners\BannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\File;
use Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BannerModel::orderBy('id', 'desc')->get();
        return view('admin.banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //   $ord = BannerModel::max('ordering');
        // $banner_ord = $ord+1;
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'picture' => 'image|mimes:jpeg,png,jpg|max:5000',
        //     'video'  => 'mimes:mp4,mov,ogg,qt | max:10000'
        // ]);
        $width = env('BANNER_WIDTH');
        $height = env('BANNER_HEIGHT');
        $req = $request->all();
        $file = $request->file('picture');

        if ($request->hasFile('picture')) {
            $banner = $request->file('picture')->getClientOriginalName();
            $extension = $request->file('picture')->getClientOriginalExtension();
            $banner = explode('.', $banner);
            $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;
            $destinationPath = public_path('uploads/banners');
            $banner_picture = Image::make($file->getRealPath());
            //$width = Image::make($file->getRealPath())->width();
            //$height = Image::make($file->getRealPath())->height();
            $banner_picture->save($destinationPath . '/' . $banner_name);
                    $req['picture'] = $banner_name;
            }
              if($request->hasFile('video')) {
                $user_img_name = $request->file('video');
                $user_name = time().'.'.$user_img_name->getClientOriginalExtension();
                $destinationPath = public_path('uploads/videos');
                $user_img_name->move($destinationPath, $user_name);
                $req['video'] = $user_name;
        
            }
        $data = BannerModel::create($req);
        if ($data) {
            return redirect()->back()->with('success', 'Successfully added.');
        } else {
            return "Error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banners\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function show(BannerModel $bannerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banners\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerModel $bannerModel, $id)
    {
        $data = BannerModel::find($id);
        return view('admin.banner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banners\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BannerModel $bannerModel, $id)
    {
        //return $request;
        $banner_width = env('BANNER_WIDTH');
        $banner_height = env('BANNER_HEIGHT');

        $data = BannerModel::find($id);
        $file = $request->file('picture');

        if ($request->hasFile('picture')) {

            // Remove old file if exists
            $data = BannerModel::find($id);
            if (file_exists(public_path('public/uploads/banners/' . $data->picture))) {
                unlink('public/uploads/banners/' . $data->picture);
            }

            // Upload new file
            $banner = $request->file('picture')->getClientOriginalName();
            $extension = $request->file('picture')->getClientOriginalExtension();
            $banner = explode('.', $banner);
            $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;
            $destinationPath = public_path('uploads/banners');
            $banner_picture = Image::make($file->getRealPath());
            $banner_picture->save($destinationPath . '/' . $banner_name);
            $data->picture = $banner_name;
        }
        
          if($request->hasFile('video')) {
            if (file_exists(public_path('public/uploads/videos/' . $data->video))) {
                unlink('public/uploads/videos/' . $data->video);
            }
            $user_img_name = $request->file('video');
            $user_name = time().'.'.$user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('uploads/videos');
            $user_img_name->move($destinationPath, $user_name);

           
           $data->video  = $user_name;
    
        }

        $data->title = $request->title;
        $data->caption = $request->caption;
        $data->content = $request->content;
        $data->link = $request->link;
        $data->youtube_link = $request->youtube_link;
        $data->banner_ordering=$request->banner_ordering;
       if (isset($request->ordering) && $request->ordering == 'yes') {
                $special = BannerModel::where('ordering', 'yes')->get();
                if (!empty($special)) {
                    foreach ($special as $value) {
                        $find = BannerModel::where('ordering', $value->ordering)->update(['ordering' => 'no']);
                    }
                }
            }
        $data->save();
        if ($data->save()) {
            return redirect()->back()->with('success', 'Update Successful.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banners\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerModel $bannerModel, $id)
    {
        $data = BannerModel::find($id);
         if($data->picture)
        {
         if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture)) {
                    unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture);
                }
        }
        
         if($data->video){
 
            if (file_exists(public_path('public/uploads/videos/' . $data->video))) {
                unlink('public/uploads/videos/' . $data->video);
            } 
        }
               
        $data->delete();
    }
    public function isdefault(Request $request)
    {  
      $data = BannerModel::find($request->id);      
       $default = BannerModel::where('id','!=', $data->id)->get();
     if($data->ordering == '1'){
      $data->ordering = '0';   
      $data->save();  
      return back();
    }else if($data->ordering == '0'){
    //   foreach($default as $row) {       
    //     if ( $row->ordering == '1' ) {
    //          $default = BannerModel::where('id',$row->id)->update(['ordering'=> '0']);
    //     }
     $data->ordering = '1';      
      $data->save();  
      return back();
    }
     
    return back();  
  }
}
