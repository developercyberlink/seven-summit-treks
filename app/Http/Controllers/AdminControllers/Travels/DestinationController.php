<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Travels\DestinationModel;
use Image;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DestinationModel::orderBy('id','desc')->get();
        return view('admin.destinations.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = DestinationModel::max('ordering');
        $ordering += $ordering + 1;
        return view('admin.destinations.create', compact('ordering'));
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

      //  $banner_width = env('BANNER_WIDTH');
       // $banner_height = env('BANNER_HEIGHT');

        $data = $request->all();
        $file =  $request->file('thumbnail');
        $thumb_name = '';
        if($request->hasfile('thumbnail')){

        $thumb = $request->file('thumbnail')->getClientOriginalName();
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        $thumb = explode('.', $thumb);
        $thumb_name = Str::slug($thumb[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('uploads/original');

        $thumb_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();      

        $thumb_picture->resize($width, $height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath .'/'. $thumb_name ); 

      }
      
      $data['thumbnail'] = $thumb_name;     
      $result = DestinationModel::create($data);

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
        $data = DestinationModel::find($id);
       // return $data;
        return view('admin.destinations.edit', compact('data'));
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
      $request->validate([
        'title'=>'required'
      ]);

      //$thumb_width = env('MEDIUM_WIDTH');
      //$thumb_height = env('MEDIUM_HEIGHT');

      $data = DestinationModel::find($id);  
      $file = $request->file('thumbnail'); 
      $thumb_name = '';
      if($request->hasfile('thumbnail')){
        $data = DestinationModel::find($id); 
        if($data->thumbnail){
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
          }
        }
        $thumb = $request->file('thumbnail')->getClientOriginalName();
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        $thumb = explode('.', $thumb);
        $thumb_name = Str::slug($thumb[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('uploads/original');

        $thumb_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();    

        $thumb_picture->resize($width, $height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath .'/'. $thumb_name ); 

        $data->thumbnail = $thumb_name;
      }    
         
      $data->title = $request->title;
      $data->sub_title = $request->sub_title;
      $data->excerpt = $request->excerpt;  
      $data->content = $request->content;
      $data->uri = $request->uri;    
      $data->ordering = $request->ordering;            
      $data->meta_keyword = $request->meta_key;
      $data->meta_description = $request->meta_description;
     
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
      $data = DestinationModel::find($id);
      if($data->banner  != NULL){
        if(file_exists(env('PUBLIC_PATH').'uploads/banners/' . $data->banner)){
          unlink(env('PUBLIC_PATH').'uploads/banners/' . $data->banner);
        }
      }
      $data->delete();
      return 'Are you sure to delete?';
    }

    // Delete Thumbnail
    function delete_destination_thumb(DestinationModel $destinationModel, $id){
      $data = DestinationModel::find($id);
      if($data->thumbnail){
       if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->thumbnail)){
         unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->thumbnail);
       }
       if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
         unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
       }
     }
     $data->thumbnail = NULL;
     $data->save();
     return response('Delete Successful.');
   }
}
