<?php

namespace App\Http\Controllers\AdminControllers\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Posts\PostTypeModel;
use Image;

class PostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PostTypeModel::orderBy('ordering','asc')->get();
        return view('admin.post-type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // List Template
      $fileList = scandir(resource_path('views/themes/default/'));
      $filterArray = $this->filter_template($fileList);

      $filename = array();
      foreach ($filterArray as $filterArr) {
        $filename[] = $this->remove_extention($filterArr);
    }
    $file1 = array('single'=>'Choose Template');
    foreach ($filename as $file) {
        $file1[$file] = $file;
    }
    $templates = $file1; 
      // return $templates;

    $ordering = PostTypeModel::max('ordering');
    $ordering = $ordering + 1;
    return view('admin.post-type.create',compact('ordering','templates'));
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
            'post_type'=> 'required',
            'uri'=>'required|unique:cl_post_type'
        ]);
          $medium_width = env('MEDIUM_WIDTH');
      $medium_height = env('MEDIUM_HEIGHT');

      $data = $request->all();
      $file =  $request->file('banner');
      
      $product_name = '';
      if($request->hasfile('banner')){
        $product = $request->file('banner')->getClientOriginalName();
        $extension = $request->file('banner')->getClientOriginalExtension();
        $product = explode('.', $product);
        $product_name = Str::slug($product[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath_medium = public_path('uploads/medium');
        $destinationOriginal = public_path('uploads/original');

        $product_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();      

        $product_picture->resize($medium_width, $medium_height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath_medium .'/'. $product_name ); 

        /*Upload Original banner*/
        $product_picture->save($destinationOriginal .'/'. $product_name ); 
      }

        $data['banner'] = $product_name;
        $data['uri'] = Str::slug($request->uri);
        $result = PostTypeModel::create($data);
        if($result){
            return redirect()->back()->with('message','Stored Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts\PostTypeModel  $postTypeModel
     * @return \Illuminate\Http\Response
     */
    public function show(PostTypeModel $postTypeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts\PostTypeModel  $postTypeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PostTypeModel $postTypeModel, $posttype, $id)
    {

      $fileList = scandir(resource_path('views/themes/default/'));
      $filterArray = $this->filter_template($fileList);

      $filename = array();
      foreach ($filterArray as $filterArr) {
        $filename[] = $this->remove_extention($filterArr);
      }
      $file1 = array('single'=>'Choose Template');
      foreach ($filename as $key=>$file) {
       $file1[$file] = $file;
     }
     $templates = $file1;

        $data = PostTypeModel::find( $id );
        return view('admin.post-type.edit', compact('data','templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts\PostTypeModel  $postTypeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostTypeModel $postTypeModel, $posttype, $id)
    {
        $request->validate([
            'post_type'=> 'required',
            'uri'=>'required'
        ]);
        $data = PostTypeModel::find($id);
           $file =  $request->file('banner');
        $file_name = '';
        if($request->hasfile('banner')){
            $data = PostTypeModel::find($id);  
            if($data->banner){               
                if(file_exists(public_path('uploads/original/' .  $data->banner))){
                    unlink('uploads/original/' . $data->banner);
                }                  
            }
            $category_file = $request->file('banner')->getClientOriginalName();
            $extension = $request->file('banner')->getClientOriginalExtension();
            $category_file = explode('.', $category_file);
            $file_name = Str::slug($category_file[0]) . '-' . Str::random(40) . '.' . $extension;
            
            $destinationOriginal = public_path('uploads/original');
            

        $product_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();        
      
        /****Upload Original Image****/
        $product_picture->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $file_name ); 

        $data->banner = $file_name;
        } 
        $data->post_type = $request->post_type;
        $data->template = $request->template;
        $data->uri = Str::slug($request->uri);
        $data->ordering = $request->ordering;
        $data->is_menu = $request->is_menu;  
         $data->content = $request->content; 
        $data->save();
        return redirect()->back()->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts\PostTypeModel  $postTypeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostTypeModel $postTypeModel, $posttype, $id)
    {
        $data = PostTypeModel::find($id);
          if($data->banner){
      if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->banner)){
        unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->banner);
      }
      if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->banner)){
        unlink(env('PUBLIC_PATH').'uploads/original/' . $data->banner);
      }
    }
        $data->delete();
    }

    // Filter Template
    private function filter_template($template){
      $tmpl = array();
      if(!empty($template)){
        foreach($template as $tmp){
          if(strpos($tmp, "templateposttype-") !== false){
            $tmpl[] = $tmp;
        }   
    }
}
return $tmpl;
}

    // Remove Extention
private function remove_extention($filename){
  $exp = explode('.',$filename);
  $file = $exp[0];
  return $file;
}

}
