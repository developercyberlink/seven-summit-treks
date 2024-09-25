<?php

namespace App\Http\Controllers\AdminControllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\OptionModel;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OptionModel::get();
        return view('admin.options.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.options.create');
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
        $result = OptionModel::create($data);
        if ($result) {
            return redirect()->back()->with('message', 'Create Sucessful!');
        }
        return false;

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
        $data = OptionModel::find($id);
        return view('admin.options.edit', compact('data'));
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

        $data = OptionModel::find($id);
        $data->title = $request->title;
        $data->key_name = $request->key_name;
        $data->content = $request->content;
        $data->sign = $request->sign;
        if ($data->save()) {
            return redirect()->back()->with('message', 'Update Sucessfully.');

        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = OptionModel::find($id);
        $data->delete();
    }
}
