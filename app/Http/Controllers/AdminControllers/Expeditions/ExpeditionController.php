<?php

namespace App\Http\Controllers\AdminControllers\Expeditions;

use App\Http\Controllers\Controller;
use App\Model\Geography;
use Illuminate\Http\Request;
use App\Models\Expeditions\ExpeditionModel;
use Illuminate\Support\Str;
use Image;

class ExpeditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ExpeditionModel::orderBy('id','desc')->get();
        return view('admin.expeditions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = ExpeditionModel::max('ordering');
        $ordering = $ordering + 1;
        return view('admin.expeditions.create',compact('ordering'));
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
            'title'=>'required',
            // 'content'=>'required'
          ]);
           $medium_width = env('MEDIUM_WIDTH');
        $medium_height = env('MEDIUM_HEIGHT');
        $data = $request->all();

        $file = $request->file('thumbnail');
         $file2 = $request->file('banner');
        $thumbnail = '';
         $banner = '';
        if ($request->hasfile('thumbnail')) {
            $product = $request->file('thumbnail')->getClientOriginalName();
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $product = explode('.', $product);
            $thumbnail = Str::slug($product[0]) . '-' . Str::random(40) . '.' . $extension;
            $destinationOriginal = public_path('uploads/original');

            $banner_picture = Image::make($file->getRealPath());
            $width = Image::make($file->getRealPath())->width();
            $height = Image::make($file->getRealPath())->height();

            $banner_picture->save($destinationOriginal . '/' . $thumbnail);
        }
         if ($request->hasfile('banner')) {
            $product = $request->file('banner')->getClientOriginalName();
            $extension = $request->file('banner')->getClientOriginalExtension();
            $product = explode('.', $product);
            $banner = Str::slug($product[0]) . '-' . Str::random(40) . '.' . $extension;
            $destinationOriginal = public_path('uploads/original');

            $banner_picture = Image::make($file2->getRealPath());
            $width = Image::make($file2->getRealPath())->width();
            $height = Image::make($file2->getRealPath())->height();

            $banner_picture->save($destinationOriginal . '/' . $banner);
        }
        $data = $request->all();
        $data['thumbnail'] = $thumbnail;
        $data['banner'] = $banner;
        $result = ExpeditionModel::create($data);
        if($result){
            return redirect()->back()->with('message','Successfully added.');
        }
        return redirect()->back()->with('message','Try again!');
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
        $data = ExpeditionModel::find($id);
        return view('admin.expeditions.edit',compact('data'));
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
            'title'=>'required',
            // 'content'=>'required'
          ]);
          $data = ExpeditionModel::find($id);
          $file = $request->file('thumbnail');
           $file2 = $request->file('banner');
           if ($request->hasFile('thumbnail')) {           
                // Remove old file if exists
            $data = ExpeditionModel::find($id);
            if($data->thumbnail){
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
          }
        }

        // Upload new file
        $image = $request->file('thumbnail');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/original/');
        $image->move($destinationPath, $name);
        $data['thumbnail'] = $name;
        }
        
        if ($request->hasFile('banner')) {           
                // Remove old file if exists
            $data = ExpeditionModel::find($id);
            if($data->banner){
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->banner)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->banner);
          }
        }

        // Upload new file
        $image = $request->file('banner');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/original/');
        $image->move($destinationPath, $name);
        $data['banner'] = $name;
        }
        
      $data->title = $request->title;
      $data->uri = Str::slug($request->uri);
      $data->content = $request->content;
      $data->ordering = $request->ordering;
        $data->save();
      if($data->save()){
          return redirect()->back()->with('message','Update Successful.');
      }
      return redirect()->back()->with('message','Try again!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ExpeditionModel::find($id);
         if($data->thumbnail){
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
          }
        }
         if($data->banner){
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->banner)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->banner);
          }
        }
        $data->delete();
        return "Destroy Success";
    }
    
     public function filter($id)
    {
        $expedition = ExpeditionModel::find($id)->trips()->get();
        $treking = NULL;
       return view('admin.trips.index', compact('expedition','treking'));
    }

    public function facts(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $exp=ExpeditionModel::all();
            return view('admin.geography.create',compact('exp'));
        }
        if ($request->isMethod('post'))
        {
            $request->validate([
                'name'=>'required',
                'alt'=>'required',
                'countries'=>'required',
                'latitude'=>'required',
                'longitude'=>'required',
                'rp'=>'required',
                'area'=>'required'
            ]);

            $data = $request->all();
            $result = Geography::create($data);
            if($result){
                return redirect()->back()->with('success','Facts added successfully');
            }else{
                return redirect()->back()->with('error','Try Again!');
            }
        }
    }

    public function facts_index()
    {
        $all=Geography::all();
        $exp=ExpeditionModel::all();
        return view('admin.geography.index',compact('all','exp'));
    }

    public function facts_delete($id)
    {
        $find=Geography::findorfail($id);
        if ($find->delete())
        {
            return redirect()->back()->with('success','Facts deleted successfully');
        }
    }

    public function facts_edit(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name'=>'required',
            'alt'=>'required',
            'countries'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'rp'=>'required',
            'area'=>'required'
        ]);
        $id=$request->id;
        $data = $request->all();
        $edit=Geography::findorfail($id);
        if ($edit->update($data))
        {
            return redirect()->back()->with('success','Geography updated successfully');
        }
    }
}
