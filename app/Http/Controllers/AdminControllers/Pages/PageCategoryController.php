<?php

namespace App\Http\Controllers\AdminControllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Pages\PageCategoryModel;
use App\Models\Pages\PageTypeModel;
use Image;

class PageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = PageCategoryModel::orderBy('id','desc')->get();
        return view('admin.page-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = PageCategoryModel::max('ordering');
        $ordering = $ordering + 1;
        return view('admin.page-category.create', compact('ordering'));
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
            'category'=> 'required',
            'uri'=>'required|unique:cl_pagecategory'
        ]);
        $medium_width = env('MEDIUM_WIDTH');
      $medium_height = env('MEDIUM_HEIGHT');

      $data = $request->all();
      $file =  $request->file('thumbnail');
      
      $product_name = '';
      if($request->hasfile('thumbnail')){
        $product = $request->file('thumbnail')->getClientOriginalName();
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
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

        /*Upload Original thumbnail*/
        $product_picture->save($destinationOriginal .'/'. $product_name ); 
      }

        $data['thumbnail'] = $product_name;
        $data['uri'] = Str::slug($request->uri);
        $result = PageCategoryModel::create($data);
        if($result){
            return redirect()->back()->with('message','Stored Successfully.');
        }
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
       $data = PageCategoryModel::find( $id );
        return view('admin.page-category.edit', compact('data'));
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
            'category'=>'required',
            'uri'=>'required'
        ]);
        
        $data = PageCategoryModel::find($id);
        $file =  $request->file('thumbnail');
        $file_name = '';
        if($request->hasfile('thumbnail')){
            $data = PageCategoryModel::find($id);  
            if($data->thumbnail){               
                if(file_exists(public_path('uploads/original/' .  $data->thumbnail))){
                    unlink('uploads/original/' . $data->thumbnail);
                }                  
            }
            $category_file = $request->file('thumbnail')->getClientOriginalName();
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
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

        $data->thumbnail = $file_name;
        }   

        $data->category = $request->category;
        $data->uri = Str::slug($request->uri);  
        $data->ordering = $request->ordering;  
        $data->category_caption = $request->category_caption;
        $data->category_content = $request->category_content;        
        $data->save();
        return redirect()->back()->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = PageCategoryModel::find($id);
        if($data->thumbnail){
      if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->thumbnail)){
        unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->thumbnail);
      }
      if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
        unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
      }
    }
        $data->delete();
        return 'Are you sure to delete?';
    }

    public function delete_pagecategory_thumb($id)
    {
      $data = PageCategoryModel::find($id);
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
