<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use App\Http\Controllers\Controller;
use App\Models\Travels\TripInfoModel;
use Illuminate\Http\Request;

class TripInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = TripInfoModel::where('trip_detail_id', $id)->orderBy('ordering', 'desc')->get();
        return view('admin.tripinfo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = 0;
        $ord = TripInfoModel::max('ordering');
        $ordering += $ord + 1;
        return view('admin.tripinfo.create', compact('ordering'));
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
        $data = $request->all();
        $result = TripInfoModel::create($data);
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
    public function edit($trip_id, $id)
    {
        $data = TripInfoModel::find($id);
        return view('admin.tripinfo.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trip_id, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = TripInfoModel::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->ordering = $request->ordering;

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
    public function destroy($trip_id, $id)
    {
        $data = TripInfoModel::find($id);
        $data->delete();
        return 'Are you sure to delete?';
    }
}
