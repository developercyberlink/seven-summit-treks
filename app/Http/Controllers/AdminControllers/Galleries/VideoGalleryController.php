<?php

namespace App\Http\Controllers\AdminControllers\Galleries;

use App\Models\Galleries\VideoGalleryModel;
use App\Models\Galleries\VideoGalleryCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Travels\TripTypeModel;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = VideoGalleryModel::all();
        return view('admin.video-gallery.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = VideoGalleryCategoryModel::all();
        $trip_type = TripTypeModel::get();
        return view('admin.video-gallery.create', compact('data','trip_type'));
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
            'video'=>'required'
        ]);
        $data = VideoGalleryModel::create($request->all());
        if($data){
            return redirect()->back()->with('message', 'Successfully added.');
        }else{
            return 'Error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galleries\VideoGalleryModel  $videoGalleryModel
     * @return \Illuminate\Http\Response
     */
    public function show(VideoGalleryModel $videoGalleryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galleries\VideoGalleryModel  $videoGalleryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoGalleryModel $videoGalleryModel, $id)
    {
        $data = VideoGalleryModel::find($id);
        $trip_type = TripTypeModel::get();
        return view('admin.video-gallery.edit', compact('data','trip_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galleries\VideoGalleryModel  $videoGalleryModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoGalleryModel $videoGalleryModel, $id)
    {
        $data = VideoGalleryModel::find($id);
        $data->trip_type = $request->trip_type;
        $data->video = $request->video;
        $data->caption = $request->caption;
        $data->save();
        return redirect()->back()->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galleries\VideoGalleryModel  $videoGalleryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoGalleryModel $videoGalleryModel, $id)
    {
        $data = VideoGalleryModel::find($id);
        $data->delete();
    }
}
