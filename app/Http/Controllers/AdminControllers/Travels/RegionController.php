<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use App\Http\Controllers\Controller;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\RegionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RegionModel::orderBy('ordering', 'asc')->get();
        return view('admin.regions.index', compact('data'));
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
        $filterArray = $this->filter_region_template($fileList);

        $filename = array();
        foreach ($filterArray as $filterArr) {
            $filename[] = $this->remove_extention($filterArr);
        }
        $file1 = array('template-triplist' => 'Choose Template');
        foreach ($filename as $file) {
            $file1[$file] = $file;
        }
        $templates = $file1;

        /*********/
        $ordering = RegionModel::max('ordering');
        $ordering += $ordering + 1;
        $activities = ActivityModel::all();
        return view('admin.regions.create', compact('ordering', 'activities', 'templates'));
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
            'title' => 'required',
        ]);

        $banner_width = env('BANNER_WIDTH');
        $banner_height = env('BANNER_HEIGHT');

        $data = $request->all();
        $file = $request->file('banner');
        $banner_name = '';
        if ($request->hasfile('banner')) {

            $banner = $request->file('banner')->getClientOriginalName();
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner = explode('.', $banner);
            $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationPath = public_path('uploads/banners');

            $banner_picture = Image::make($file->getRealPath());
            //$width = Image::make($file->getRealPath())->width();
            //$height = Image::make($file->getRealPath())->height();

            $banner_picture->resize($banner_width, $banner_height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner_name);

        }

        $data['banner'] = $banner_name;
        $result = RegionModel::create($data);
        $last_id = $result->id;

        /*Attach*/
        $_data = RegionModel::find($last_id);
        $_data->activities()->attach($request->activity);
        /*******/

        return redirect()->back()->with('message', 'Successfully added.');

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
        $filterArray = $this->filter_region_template($fileList);

        $filename = array();
        foreach ($filterArray as $filterArr) {
            $filename[] = $this->remove_extention($filterArr);
        }
        $file1 = array('template-triplist' => 'Choose Template');
        foreach ($filename as $file) {
            $file1[$file] = $file;
        }
        $templates = $file1;

        /*********/
        $data = RegionModel::find($id);
        $checked_activities = array();
        foreach ($data->activities as $value) {
            $checked_activities[] = $value->pivot->activity_id;
        }
        $activities = ActivityModel::all();
        return view('admin.regions.edit', compact('data', 'activities', 'checked_activities', 'templates'));
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
            'title' => 'required',
        ]);

        // return $request;

        $banner_width = env('BANNER_WIDTH');
        $banner_height = env('BANNER_HEIGHT');

        $data = RegionModel::find($id);
        $file = $request->file('banner');
        $banner_name = '';
        if ($request->hasfile('banner')) {
            $data = RegionModel::find($id);
            if ($data->banner) {
                if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                    unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
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

            $banner_picture->resize($banner_width, $banner_height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner_name);

            $data->banner = $banner_name;
        }

        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->template = $request->template;
        $data->excerpt = $request->excerpt;
        $data->content = $request->content;
        $data->uri = $request->uri;
        $data->ordering = $request->ordering;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->video = $request->video;
         $data->video_status = ($request->video_status)?$request->video_status:'0';

        /*Attach*/
        $_data = RegionModel::find($id);
        $_data->activities()->detach();
        $_data->activities()->attach($request->activity);
        /*******/

        if ($data->save()) {
            return redirect()->back()->with('message', 'Update Sucessfully.');
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
        $data = RegionModel::find($id);
        if ($data->banner != null) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        $data->delete();
        return 'Are you sure to delete?';
    }
    
      public function filter($id)
    {
        $treking = RegionModel::find($id)->trips()->get();
        $expedition = NULL;
       return view('admin.trips.index', compact('treking','expedition'));
    }
    
    // Delete Region Banner
    public function delete_region_banner($id)
    {
        $data = RegionModel::find($id);
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        $data->banner = null;
        $data->save();
        return response('Delete Successful.');
    }

    // Filter Template Child
    private function filter_region_template($template)
    {
        $tmpl2 = array();
        if (!empty($template)) {
            foreach ($template as $tmpl) {
                if (strpos($tmpl, "template-region-") !== false) {
                    $tmpl2[] = $tmpl;
                }
            }
        }
        return $tmpl2;
    }

    // Remove Extention
    private function remove_extention($filename)
    {
        $exp = explode('.', $filename);
        $file = $exp[0];
        return $file;
    }

}