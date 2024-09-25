<?php

namespace App\Http\Controllers\AdminControllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\PageDocModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Image;

class PageDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $page_id = request()->segment(3);
        $data = PageDocModel::where('page_id', $page_id)->paginate(20);
        return view('admin.page-doc.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($page)
    {
        $ordering = PageDocModel::max('ordering');
        $ordering = $ordering + 1;
        return view('admin.page-doc.create', compact('page', 'ordering'));
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
             'document' => 'required',
            'document.*' => 'mimes:doc,pdf,docx',
        ]);
      
        $data = $request->all();
        
        
        if ($request->hasfile('thumbnail')) {
                $doc = $request->file('thumbnail')->getClientOriginalName();
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $doc = explode('.', $doc);
            $document = Str::slug($doc[0]) . '-' . uniqid() . '.' . $extension;

            $request->file('thumbnail')->move(public_path('uploads/original/'), $document);
            $data['thumbnail'] = $document;

        }

        if ($request->hasfile('document')) {
            $doc = $request->file('document')->getClientOriginalName();
            $extension = $request->file('document')->getClientOriginalExtension();
            $doc = explode('.', $doc);
            $document = Str::slug($doc[0]) . '-' . uniqid() . '.' . $extension;

            $request->file('document')->move(public_path('uploads/doc/'), $document);
            $data['document'] = $document;
        }
         $data['key_string'] = Str::random(40);
        $result = PageDocModel::create($data);
        $last_id = $result->id;
        if ($result) {
            return redirect()-> back()->with('success', 'Successfully added.');
        } else {
            return 'Error';
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
    public function edit($page_id, $id)
    {
        $data = PageDocModel::find($id);
        return view('admin.page-doc.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id, $id)
    {
        
        $data = PageDocModel::find($id);
        $document = "";
        if ($request->hasfile('thumbnail')) {
             if ($data->thumbnail) {
                if (file_exists(public_path('uploads/original/' . $data->thumbnail))) {
                    unlink('uploads/original/' . $data->thumbnail);
                }
            }
                $doc = $request->file('thumbnail')->getClientOriginalName();
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $doc = explode('.', $doc);
            $document = Str::slug($doc[0]) . '-' . uniqid() . '.' . $extension;

            $request->file('thumbnail')->move(public_path('uploads/original/'), $document);
            $data['thumbnail'] = $document;

        }

        if ($request->hasfile('document')) {
            
             if ($data->document) {
                if (file_exists(public_path('uploads/doc/' . $data->document))) {
                    unlink('uploads/doc/' . $data->document);
                }
            }
            $doc = $request->file('document')->getClientOriginalName();
            $extension = $request->file('document')->getClientOriginalExtension();
            $doc = explode('.', $doc);
            $document = Str::slug($doc[0]) . '-' . uniqid() . '.' . $extension;

            $request->file('document')->move(public_path('uploads/doc/'), $document);
            $data['document'] = $document;
        }

        $data['title'] = $request->title;
        $data['ordering'] = $request->ordering;

        if ($data->save()) {
            return redirect()->back()->with('message', 'Update Sucessful.');
        } else {
            return "Error";
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
        $data = PageDocModel::find($id);
        if ($data->thumbnail) {
                if (file_exists(public_path('uploads/original/' . $data->thumbnail))) {
                    unlink('uploads/original/' . $data->thumbnail);
                }
            }
             if ($data->document) {
                if (file_exists(public_path('uploads/doc/' . $data->document))) {
                    unlink('uploads/doc/' . $data->document);
                }
            }
        $data->delete();
         return response()->json(['status' => 'success', 'message' => 'Successfully Deleted']);
      
    }

    // Delete doc file
    public function delete_doc_file(PageDocModel $PageDocModel, $id)
    {
        $data = PageDocModel::find($id);
        if ($data->document) {
            if (file_exists(public_path('uploads/doc/' . $data->document))) {
                unlink('uploads/doc/' . $data->document);
            }
        }
        $data->document = null;
        $data->save();
        return response()->json(['status' => 'success', 'message' => 'Successfully Deleted']);
    }
    
    // Delete doc thumb file
    public function delete_pagedoc_thumb(PageDocModel $PageDocModel, $id)
    {
        $data = PageDocModel::find($id);
        if ($data->thumbnail) {
            if (file_exists(public_path('uploads/original/' . $data->thumbnail))) {
                unlink('uploads/original/' . $data->thumbnail);
            }
        }
        $data->thumbnail = null;
        $data->save();
         return response()->json(['status' => 'success', 'message' => 'Successfully Deleted']);
    }

    function list($id) {
        $data = PageDocModel::where('page_id', $id)->get();
        if ($data) {
            return view('admin.page-doc.index', compact('data'));
        }
        return false;
    }

}
