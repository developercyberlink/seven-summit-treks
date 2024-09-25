<?php

namespace App\Http\Controllers\AdminControllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uri)
    {
        $posttype = PostTypeModel::where('uri', $uri)->first();
        if ($posttype) {
            $posttypeId = $posttype->id;
            $data = PostModel::where(['post_type' => $posttypeId, 'post_parent' => 0])->orderBy('post_order', 'desc')->get();
            return view('admin.posts.index', compact('data'));
        }
        return redirect('/dashboard');
    }

    function list($uri) {

        $posttype = PostTypeModel::where('uri', $uri)->first();
        if ($posttype) {
            $posttypeId = $posttype->id;
            $data = PostModel::where(['post_type' => $posttypeId, 'post_parent' => 0])->orderBy('post_order', 'asc')->get();
            return view('admin.posts.index', compact('data'));
        }
        return redirect('/dashboard');

    }

    public function childlist($uri, $id)
    {
        // return $id;
        $posttype = PostTypeModel::where('uri', $uri)->first();
        if ($posttype) {
            $posttype_id = $posttype->id;
            $data = PostModel::where(['post_type' => $posttype_id, 'post_parent' => $id])->orderBy('post_order', 'asc')->get();
            return view('admin.posts.index', compact('data'));
        }
        return redirect('/dashboard');
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
        $file1 = array('single' => 'Choose Template');
        foreach ($filename as $file) {
            $file1[$file] = $file;
        }
        $templates = $file1;

        // List Template Child
        $fileListChild = scandir(resource_path('views/themes/default/'));
        $filterArrayChild = $this->filter_template_child($fileListChild);
        $filenameChild = array();
        foreach ($filterArrayChild as $filterArrChild) {
            $filenameChild[] = $this->remove_extention($filterArrChild);
        }
        $file1Child = array('single' => 'Choose Child Template');
        foreach ($filenameChild as $fileChild) {
            $file1Child[$fileChild] = $fileChild;
        }
        $templates_child = $file1Child;

        // Get parent list by post type ID
        $posttype_uri = request()->segment(2);
        $posttype = $this->getPostTypeId($posttype_uri);
        // return $posttype_uri;
        $posttype_id = $posttype->id;

        $parent_post = PostModel::where(['post_type' => $posttype_id, 'post_parent' => 0])->get();
        $ord = PostModel::max('post_order');
        $post_order = $ord + 1;
        $category = PostCategoryModel::where('post_type', $posttype_id)->get();
        return view('admin.posts.create', compact('category', 'parent_post', 'templates', 'templates_child', 'post_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('post_type')) {
            $post_type = $request->input('post_type');
        } else {
            return "Invalid Post Type";
        }

        $request->validate([
            'post_title' => 'required',
            'uri' => 'required|unique:cl_posts',
        ]);

        $banner_width = env('BANNER_WIDTH');
        $banner_height = env('BANNER_HEIGHT');

        $medium_width = env('MEDIUM_WIDTH');
        $medium_height = env('MEDIUM_HEIGHT');

        $data = $request->all();
        $file = $request->file('page_thumbnail');
        $banner_file = $request->file('page_banner');
        $page_thumbnail = "";
        $page_banner = "";

        if ($request->hasfile('page_banner')) {
            $banner_name = $request->file('page_banner')->getClientOriginalName();
            $extension = $request->file('page_banner')->getClientOriginalExtension();
            $banner_name = explode('.', $banner_name);
            $page_banner = Str::slug($banner_name[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationPath_banner = public_path('uploads/banners');

            $product_picture = Image::make($banner_file->getRealPath());
            $width = Image::make($banner_file->getRealPath())->width();
            $height = Image::make($banner_file->getRealPath())->height();

            $product_picture->resize($banner_width, $banner_height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_banner . '/' . $page_banner);

        }

        if ($request->hasfile('page_thumbnail')) {
            $thumbnail_name = $request->file('page_thumbnail')->getClientOriginalName();
            $extension = $request->file('page_thumbnail')->getClientOriginalExtension();
            $thumbnail_name = explode('.', $thumbnail_name);
            $page_thumbnail = Str::slug($thumbnail_name[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationPath_medium = public_path('uploads/medium');
            $destinationOriginal = public_path('uploads/original');

            $product_picture = Image::make($file->getRealPath());
            $width = Image::make($file->getRealPath())->width();
            $height = Image::make($file->getRealPath())->height();

            $product_picture->resize($medium_width, $medium_height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_medium . '/' . $page_thumbnail);

            /*Upload Original Image*/
            $product_picture->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationOriginal . '/' . $page_thumbnail);
        }

        $data['page_key'] = time() . rand(500000, 999999999);
        $posttypeId = $this->getPostTypeId($request->post_type);
        $data['post_type'] = $posttypeId->id;
        $data['uri'] = Str::slug($request->uri);
        $data['page_thumbnail'] = $page_thumbnail;
        $data['page_banner'] = $page_banner;
        $isChecked = $request->has('show_in_home');
        $data['show_in_home'] = ($isChecked) ? '1' : '0';
        $result = PostModel::create($data);
        $last_id = $result->id;
        if ($result) {
            return redirect('admin/' . $post_type . '/' . $last_id . '/edit')->with('message', 'Successfully added.');
        } else {
            return 'Error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function show(PostModel $postModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PostModel $postModel, $posttype, $id)
    {
        $fileList = scandir(resource_path('views/themes/default/'));
        $filterArray = $this->filter_template($fileList);

        $filename = array();
        foreach ($filterArray as $filterArr) {
            $filename[] = $this->remove_extention($filterArr);
        }
        $file1 = array('single' => 'Choose Template');
        foreach ($filename as $key => $file) {
            $file1[$file] = $file;
        }
        $templates = $file1;

        // List Template Child
        $fileListChild = scandir(resource_path('views/themes/default/'));
        $filterArrayChild = $this->filter_template_child($fileListChild);

        $filenameChild = array();
        foreach ($filterArrayChild as $filterArrChild) {
            $filenameChild[] = $this->remove_extention($filterArrChild);
        }
        $file1Child = array('single' => 'Choose Child Template');
        foreach ($filenameChild as $fileChild) {
            $file1Child[$fileChild] = $fileChild;
        }
        $templates_child = $file1Child;

        // Get parent list by post type ID
        $posttype_uri = request()->segment(2);
        $posttype = $this->getPostTypeId($posttype_uri);
        $posttype_id = $posttype->id;
        $parent_post = PostModel::where(['post_type' => $posttype_id, 'post_parent' => 0])->get();
        $category = PostCategoryModel::where('post_type', $posttype_id)->get();
        $data = PostModel::find($id);
        return view('admin.posts.edit', compact('data', 'parent_post', 'templates', 'templates_child', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostModel $postModel, $posttype, $id)
    {
        $request->validate([
            'post_title' => 'required',
        ]);

        $banner_width = env('BANNER_WIDTH');
        $banner_height = env('BANNER_HEIGHT');

        $medium_width = env('MEDIUM_WIDTH');
        $medium_height = env('MEDIUM_HEIGHT');

        $data = PostModel::find($id);
        $file = $request->file('page_thumbnail');
        $banner_file = $request->file('page_banner');
        $page_thumbnail = '';
        $page_banner = '';

        if ($request->hasfile('page_banner')) {
            $data = PostModel::find($id);
            if ($data->page_banner) {
                if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->page_banner)) {
                    unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->page_banner);
                }
            }
            $banner_name = $request->file('page_banner')->getClientOriginalName();
            $extension = $request->file('page_banner')->getClientOriginalExtension();
            $banner_name = explode('.', $banner_name);
            $page_banner = Str::slug($banner_name[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationPath_banner = public_path('uploads/banners');

            $banner_picture = Image::make($banner_file->getRealPath());
            $width = Image::make($banner_file->getRealPath())->width();
            $height = Image::make($banner_file->getRealPath())->height();

            $banner_picture->resize($banner_width, $banner_height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_banner . '/' . $page_banner);

            $data->page_banner = $page_banner;
        }

        if ($request->hasfile('page_thumbnail')) {
            $data = PostModel::find($id);
            if ($data->page_thumbnail) {
                if (file_exists(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail)) {
                    unlink(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail);
                }
                if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->page_thumbnail)) {
                    unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->page_thumbnail);
                }
            }
            $product = $request->file('page_thumbnail')->getClientOriginalName();
            $extension = $request->file('page_thumbnail')->getClientOriginalExtension();
            $product = explode('.', $product);
            $product_name = Str::slug($product[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationPath_medium = public_path('uploads/medium');
            $destinationOriginal = public_path('uploads/original');

            $product_picture = Image::make($file->getRealPath());
            $width = Image::make($file->getRealPath())->width();
            $height = Image::make($file->getRealPath())->height();

            $product_picture->resize($medium_width, $medium_height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_medium . '/' . $product_name);

            /*Upload Original Image*/
            $product_picture->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationOriginal . '/' . $product_name);
            $data->page_thumbnail = $product_name;
        }

        $posttypeId = $this->getPostTypeId($request->post_type);
        $data->post_date = $request->post_date;
        $data->template = $request->template;
        $data->template_child = $request->template_child;
        $data->post_title = $request->post_title;
        $data->sub_title = $request->sub_title;
        $data->post_content = $request->post_content;
        $data->post_excerpt = $request->post_excerpt;
        $data->post_type = $posttypeId->id;
        $data->post_category = $request->category;
        $data->post_parent = $request->post_parent;
        $data->post_order = $request->post_order;
        $data->page_video = $request->page_video;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->associated_title = $request->associated_title;
        $data->external_link = $request->external_link;
        $data->post_tags = $request->post_tags;
        $isChecked = $request->has('show_in_home');
        $data->show_in_home = ($isChecked) ? '1' : '0';
        $data['uri'] = Str::slug($request->uri);
        if ($data->save()) {
            return redirect()->back()->with('message', 'Update Sucessfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostModel $postModel, $posttype, $id)
    {
        $data = PostModel::find($id);
        if ($data->page_thumbnail != null) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail);
            }
            if (file_exists(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->page_thumbnail);
            }
        }
        $data->delete();
        return 'Are you sure to delete?';
    }

    // Return Post Type uri
    private function getPostTypeId($uri)
    {
        $posttype = PostTypeModel::where('uri', $uri)->first();
        return $posttype;
    }

    // Filter Template
    private function filter_template($template)
    {
        $tmpl = array();
        if (!empty($template)) {
            foreach ($template as $tmp) {
                if (strpos($tmp, "template-") !== false) {
                    $tmpl[] = $tmp;
                }
            }
        }
        return $tmpl;
    }

    // Filter Template Child
    private function filter_template_child($template)
    {
        $tmpl2 = array();
        if (!empty($template)) {
            foreach ($template as $tmpl) {
                if (strpos($tmpl, "templatechild-") !== false) {
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

    // Delete Post Thumbnail
    public function delete_post_thumb(PostModel $postModel, $id)
    {
        $data = PostModel::find($id);
        if ($data->page_thumbnail) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail);
            }
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->page_thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->page_thumbnail);
            }
        }
        $data->page_thumbnail = null;
        $data->save();
        return response('Delete Successful.');
    }

    public function delete_banner_thumb(PostModel $postModel, $id)
    {
        $data = PostModel::find($id);
        if ($data->page_banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/bannners/' . $data->page_banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/bannners/' . $data->page_banner);
            }
        }
        $data->page_banner = null;
        $data->save();
        return response('Delete Successful.');
    }
    
     public function poststatus($id){
    $data = PostModel::find($id);
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
