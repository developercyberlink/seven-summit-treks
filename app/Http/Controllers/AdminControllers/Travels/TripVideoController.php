<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use App\Http\Controllers\Controller;
use App\Models\Travels\TripVideoModel;
use Illuminate\Http\Request;

// use Validation;

class TripVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trip_id = request()->segment(2);
        $data = TripVideoModel::where('trip_id', $trip_id)->paginate(20);
        return view('admin.trip-videos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($trip)
    {
        $ordering = TripVideoModel::max('ordering');
        $ordering = $ordering + 1;
        return view('admin.trip-videos.create', compact('trip', 'ordering'));

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
            'video' => 'required',
        ]);

        $data = TripVideoModel::create($request->all());
        if ($data) {
            return redirect()->back()->with('message', 'Video Upload Successful.');
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
    public function edit($trip, $id)
    {
        $data = TripVideoModel::find($id);
        return view('admin.trip-videos.edit', compact('data', 'trip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trip, $id)
    {
        $request->validate([
            'video' => 'required',
        ]);

        $data = TripVideoModel::find($id);
        $data->video_caption = $request->video_caption;
        $data->video = $request->video;
        $data->ordering = $request->ordering;

        $data->save();
        if (!$data) {
            return redirect()->back()->with('message', 'Please, try again!');
        }
        return redirect()->back()->with('message', 'Upload Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trip, $id)
    {
        $data = TripVideoModel::find($id);
        $data->delete();
        return "Delete Successful!";
    }
}
