<?php

namespace App\Http\Controllers\AdminControllers\Expeditions;

use App\Http\Controllers\Controller;
use App\Models\Expeditions\ExpeditionGroupModel;
use App\Models\Expeditions\ExpeditionModel;
use Illuminate\Http\Request;
use App\Models\Travels\TripGroupModel;


class ExpeditionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data = TripGroupModel::orderBy('id', 'desc')->get();
        return view('admin.expeditions-group.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = TripGroupModel::max('ordering');
        $ordering = $ordering + 1;
        $expeditions = ExpeditionModel::get();
        return view('admin.expeditions-group.create', compact('ordering', 'expeditions'));
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
            'group_title' => 'required',
            'expedition' => 'required',
        ]);
        $data = $request->all();
        $result = TripGroupModel::create($data);
        if ($result) {
            return redirect()->back()->with('message', 'Successfully added.');
        }
        return redirect()->back()->with('message', 'Try again!');
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
        $data = TripGroupModel::find($id);
        $expeditions = ExpeditionModel::get();
        return view('admin.expeditions-group.edit', compact('data', 'expeditions'));
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
            'group_title' => 'required',
            'expedition' => 'required',
        ]);

        $data = TripGroupModel::find($id);
        $data->group_title = $request->group_title;
        $data->description = $request->description;
        $data->ordering = $request->ordering;
        $data->expedition = $request->expedition;

        if ($data->save()) {
            return redirect()->back()->with('message', 'Update Successful.');
        }
        return redirect()->back()->with('message', 'Try again!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TripGroupModel::find($id);
        if ($data) {
            $data->delete();
        }
    }
    
     public function expgroupstatus($id){
    $data = TripGroupModel::find($id);
    if($data->status == '1'){
      $data->status = '0';
      $data->save();
      return 'Success';
    }else if($data->status == '0'){
      $data->status = '1';
      $data->save();
      return 'Success';
    }
    return 'Not success';
  }
}
