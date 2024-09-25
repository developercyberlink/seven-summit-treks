<?php
use App\Models\Circulars\CircularModel;
use App\Models\Expeditions\ExpeditionModel;
use App\Models\Galleries\ImageGalleryCategoryModel;
use App\Models\Galleries\VideoGalleryModel;
use App\Models\Members\MemberModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostImageModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Settings\CountryModel;
use App\Models\Settings\OptionModel;
use App\Models\Settings\RatingModel;
use App\Models\Settings\SettingModel;
use App\Models\Travels\ActivityGroupModel;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\DestinationModel;
use App\Models\Travels\RegionModel;
use App\Models\Travels\SeasonModel;
use App\Models\Travels\TripModel;
use App\Models\Travels\WeatherReportModel;
use App\Models\Pages\PageCategoryModel;
use App\Models\Pages\PageModel;
use App\Models\Pages\PageTypeModel;
use App\Models\Travels\TripTypeModel;
use App\Models\Team\TeamModel;
use App\Models\Team\TeamCategory;
use Carbon\Carbon;
use App\Models\Travels\TripGradeModel;
use App\Models\Travels\TripGroupModel;
use App\Model\TravelGuide;

function get_trip_guide($tripid)
{
    $data = TravelGuide::where('trip_id',$tripid)->where('category', 'guide')->first();

    if ($data) {
        return $data;
    }
    return false;
}

function get_trip_insurance($tripid)
{
    $data = TravelGuide::where('trip_id',$tripid)->where('category', 'insurance')->first();

    if ($data) {
        return $data;
    }
    return false;
}

function get_trip_payment($tripid)
{
    $data = TravelGuide::where('trip_id',$tripid)->where('category', 'payment')->first();
   
    if ($data) {
        return $data;
    }
    return false;
}

// Check whether this post type has post or not.
function is_empty_posttype($id)
{
    $data = PostModel::where(['post_type' => $id])->count();
    if ($data > 0) {
        return true;
    }
    return false;
}

function is_empty_circular_type($id)
{
    $data = CircularModel::where(['circular_type' => $id])->count();
    if ($data > 0) {
        return true;
    }
    return false;
}

// Check whether this category has post or not.
function is_empty_category($id)
{
    $data = PostModel::where(['post_category' => $id])->count();
    if ($data > 0) {
        return true;
    }
    return false;
}

function show_category($category_id)
{
    $post = PostCategoryModel::where('id', $category_id)->first();
    return $post['category'];
}

function loop_category($id)
{
    $category = PostCategoryModel::where('pid', $id)->first();
    return $category;
}

function has_posts($post_type)
{
    $data = PostModel::where(['post_type' => $post_type, 'post_parent' => '0', 'status' => 1])->orderBy('post_order', 'asc')->get();
    if ($data->count() > 1) {
        return $data;
    }
    return false;
}

function has_single_post($post_type)
{
    $data = PostModel::where(['post_type' => $post_type, 'post_parent' => '0', 'status' => 1])->orderBy('post_order', 'asc')->first();
    if ($data) {
        return $data;
    }
    return false;
}

function check_uri($uri)
{
    $data = PostModel::where(['uri' => $uri])->first();
    if ($data) {
        return true;
    }
    return false;
}

function geturl($uri)
{
    $count = PostModel::where(['uri' => $uri])->count();
    $data = PostModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return $data->page_key . '.html';
    }
    if (!$data['uri']) {
        return 'error.html';
    }
    return $data['uri'] . '.html';
}

function posttype_geturl($uri)
{
    $data = PostTypeModel::where('uri', $uri)->first();
    if ($data) {
        return $data['uri'] . '.html';
    }
    return false;
}

// Check and List Child Post
function has_child_post($id)
{
    $check_child = PostModel::where('post_parent', $id)->count();
    if ($check_child) {
        $data = PostModel::where(['post_parent' => $id])->orderBy('post_order', 'asc')->get();
        return $data;
    }
    return false;    
}

function check_child_post($id)
{
    $data = PostModel::where('post_parent', $id)->count();
    if ($data) {
        return $data;
    }
    return false;
}

function check_child($id)
{
    $data = PostModel::where('post_parent', $id)->count();
    if ($data > 0) {
        return true;
    }
    return false;
}


function photo_category()
{
    $data = ImageGalleryCategoryModel::all();
    return $data;
}

function video_gallery()
{
    $data = VideoGalleryModel::paginate(15);
    return $data;
}

// Get parent post
function post_parent($uri)
{
    $post = PostModel::where(['uri' => $uri])->first();
    if ($post->post_parent) {
        $parent = PostModel::where(['id' => $post->post_parent, 'status' => 1])->first();
        return $parent;
    }
    return false;
}

// Get parent post
function post_parent_byId($id)
{
    $parent = PostModel::where(['id' => intval($id)])->first();
    if ($parent) {
        return $parent;
    }
    return false;
}

// for sidebar inner left
function child_list($uri)
{
    $post_parent = PostModel::where(['uri' => $uri, 'status' => 1])->first();
    if ($post_parent->post_parent) {
        $_list = PostModel::where(['post_parent' => $post_parent->post_parent, 'status' => 1])->get();
        return $_list;
    }
    return false;
}

function multiple_image($postid)
{
    $data = PostImageModel::where(['post_id' => $postid])->get();
    if ($data->count() > 0) {
        return $data;
    }
    return false;
}

function find_employee($customer_id)
{
    $data = MemberModel::where(['id' => $customer_id])->first();
    if ($data) {
        return $data;
    }
    return false;
}

function settings()
{
    $data = SettingModel::where(['id' => '1'])->first();
    if ($data) {
        return $data;
    }
    return false;
}

function countries()
{
    $data = CountryModel::all();
    if ($data) {
        return $data;
    }
    return false;
}

function country($id)
{
    $data = CountryModel::where('id', $id)->first();
    if ($data) {
        return $data->country;
    }
    return false;
}

/**********Trip List by regions************/
function tripbyregions($region_id)
{
    $data = RegionModel::find($region_id)->trips()->where('status','1')->orderBy('ordering','asc')->get();
    return $data;
}

// Expedition
function trip_byexpeditions($expedition_id)
{
    $data = ExpeditionModel::find($expedition_id)->trips()->where('status','1')->orderBy('ordering','asc')->get();
    return $data;
}


function activity_byregions($region_id)
{
    $data = RegionModel::find($region_id)->activities()->get();
    return $data;
}

function tripurl($uri)
{
    $count = TripModel::where(['uri' => $uri])->count();
    $data = TripModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return $data->uri . '.html';
    }
    return $data->uri . '.html';
}

function activity_bygroup($group_id)
{
    $data = ActivityGroupModel::find($group_id);
    $activities = $data->activities()->get();
    return $activities;
}

function trip_byactivities($activity_id)
{
    $data = ActivityModel::find($activity_id);
    $trips = $data->trips()->where('status','1')->get();
    return $trips;
}

function activity_bydestination($destination_id)
{
    $data = DestinationModel::find($destination_id);
    $activities = $data->activities()->get();
    return $activities;
}

function trip_bydestination($destination_id)
{
    $data = DestinationModel::find($destination_id);
    $trips = $data->trips()->where('status','1')->get();
    return $trips;
}

function activityurl($uri)
{
    $count = ActivityModel::where(['uri' => $uri])->count();
    $data = ActivityModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return false;
    }
    return 'activity/' . $data->uri . '.html';
}

function regionurl($uri)
{
    $count = RegionModel::where(['uri' => $uri])->count();
    $data = RegionModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return false;
    }
    return 'region/' . $data->uri . '.html' ;
}

function expeditionurl($uri)
{
    $count = ExpeditionModel::where(['uri' => $uri])->count();
    $data = ExpeditionModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return false;
    }
    return 'expedition/' . $data->uri . '.html';
}

function newsurl($uri)
{
    $count = PostModel::where(['uri' => $uri])->count();
    $data = PostModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return 'news/' . $data->page_key . '.html';
    }
    return 'news/' . $data->uri . '.html';
}

function categoryurl($uri)
{
    $data = PostCategoryModel::where(['uri' => $uri])->first();
    if ($data) {
        return 'category/' . $data->uri . '.html';
    }
    return false;
}

function tripcount($activity_id)
{
    $data = ActivityModel::find($activity_id)->trips()->where('status','1')->count();
    return $data;
}

function fixed_dates($start_date, $end_date)
{
    $start = Carbon::parse($start_date);
    $end = Carbon::parse($end_date);
    $diff = $start->diffInDays($end);
    if ($diff > 0) {
        return '<span class="text-green">Booking Open</span>';
    } else if ($diff <= 0) {
        return '<span class="text-red">Closed</span>';
    }
    return false;
}

function rating($id)
{
    $data = RatingModel::where('id', $id)->first();
    if ($data) {
        return $data;
    }
    return false;
}

function season($id)
{
    $data = SeasonModel::where('id', $id)->first();
    if ($data) {
        return $data->season;
    }
    return false;
}

function weather_report($id)
{
    $data = WeatherReportModel::where('trip_detail_id', $id)->first();
    if ($data) {
        return $data->weather_report_uri;
    }
    return false;

}

function tripfilter_expeditiongroup($id)
{
    $data = TripModel::where('expedition_group_id', $id)->where('status','1')->orderBy('ordering','asc')->get();
    if ($data) {
        return $data;
    }
    return false;
}

function tripfilter_tripgroup($id)
{
    $data = TripGroupModel::find($id)->trips()->where('status','1')->orderBy('ordering','asc')->get();

    if ($data) { 
        return $data;
    }
    return false;
}

function dateformat($date)
{
    $data = Carbon::parse($date)->format('F j, Y');
    return $data;
}

function options($keyname)
{
    $data = OptionModel::where('key_name', $keyname)->first();
    if ($data) {
        return $data;
    }
    return false;

}
//added later

function is_empty_pagetype($id){
  $data = PageModel::where(['page_type'=>$id])->count();
  if( $data > 0){
    return true;
  }
  return false;
}

function teamurl($uri){  
  $count = PageModel::where(['uri'=>$uri])->count();
  $data = PageModel::where(['uri'=>$uri])->first();  
  if($count > 1){
    return $data->page_key;
  }
 return $data['uri'];
}

function trip_type($id){
    $data = TripTypeModel::where('id',$id)->first();
    if ($data) {
        return $data->trip_type;
    }
    return false;
}
function is_empty_teamcategory($id){
  $data = TeamModel::where(['category'=>$id])->count();
  if( $data > 0){
    return true;
  }
  return false;
}

function teamcategory_byId($id){
  $data = TeamCategory::where(['id'=>intval($id)])->first();
  if($data){
   return $data['category'];
 }
 return false;
}

function grade_message_trek($id)
{
  $data=TripGradeModel::where('id',$id)->first();
  if($data){
    return $data['grade_message'];
  }
  return false;
}



function grade_message_exp($id)
{
  $data=DB::table('trip_grading')->where('id',$id)->first();
  if($data){
    return $data->grade_message;
  }
  return false;
}

function tripname($id){
    $data = TripModel::where('id',$id)->first();
    return $data;
}

function team_url($uri=NULL,$team_key=NULL){
     $count = TeamModel::where(['uri'=>$uri])->count();
     $data = TeamModel::where(['uri'=>$uri])->firstOrFail();
      if($count > 1 || $uri === NULL || $uri === ""){
            $count = TeamModel::where(['team_key'=>$team_key])->count();
            $data = TeamModel::where(['team_key'=>$team_key])->firstOrFail();
            return $data->team_key;
      }
    return $data->uri;
}

function teamparent($id){
    $parent = TeamCategory::where(['id' => intval($id)])->first();
    if ($parent) {
        return $parent->category;
    }
    return false;
}
