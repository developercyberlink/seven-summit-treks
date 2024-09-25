<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use App\Http\Controllers\Controller;
use App\Models\Travels\TripItineraryCategoryModel;
use Illuminate\Http\Request;
use App\ItineraryCategory;
use App\Models\Testimonials\TestimonialModel;
use App\Models\Travels\TripInfoModel;
use App\Models\Travels\TripModel;
use DB;

class TripItineraryCategoryController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($id)
  {
     // $data=TripItineraryCategoryModel::where('trip_id',$id)->distinct()->get(['category']);
    $data = ItineraryCategory::where('trip_id',$id)->get();
     
    return view('admin.itinerary-category.index', compact('data','id'));
  }


  public function store_category(Request $request)
  {
    if ($request->isMethod('get')) {
      $ordering =   ItineraryCategory::max('ordering');
      $ordering = $ordering + 1;
      $itineraryCategory =   ItineraryCategory::get();
      return view('admin.itinerary-category.category',compact('ordering','itineraryCategory'));
    }

    if ($request->isMethod('post')) {
      $request->validate([
        'category'=>'required'
      ]);
      $data = $request->all();
      ItineraryCategory::create($data);
      return redirect()->back()->with('message','Itinerary Category created successfully ');
    }
  }

  public function show_category()
  {
    $data = ItineraryCategory::get();
    return view('admin.itinerary-category.show_category', compact('data'));
    return $data;
  }

  public function update_category(Request $request)
  {
    if ($request->isMethod('get')) {
      $id=$request->id;
      $data = ItineraryCategory::find($id);
      return view('admin.itinerary-category.edit', compact('data'));
    }

    if ($request->isMethod('post')) {
      $request->validate([
        'category'=>'required'
      ]);
      $id=$request->id;
      $data = ItineraryCategory::find($id);
      $data->category = $request->category;
      $data->ordering = $request->ordering;


      if($data->save()){
        return redirect()->back()->with('message','Update Successful.');
      }
      return redirect()->back()->with('message','Try again!');
    }
  }

  public function delete_category(Request $request)
  {
    $id=$request->id;
    $find=ItineraryCategory::findorfail($id);
    if($find->itineraries->isEmpty())
    {
      $find->delete();
      return redirect()->back()->with('message','Delete Successful.');
    }
    else{
      return redirect()->back()->with('message','Cannot delete category');
    }
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create($id)
  {
    $id=$id;
    $trip=TripModel::where('id',$id)->first();
    $ordering = TripItineraryCategoryModel::max('ordering');
    $ordering = $ordering + 1;
    $itineraryCategory = ItineraryCategory::get();
    return view('admin.itinerary-category.create',compact('trip','id','ordering','itineraryCategory'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

  // dd($request->all());
    $request->validate([
      'category' => 'required',
    ]);
    $data['category']=$request->category;
    $data['trip_id'] = $request->trip_id;
    $result = ItineraryCategory::create($data);
    $last_id = $result->id;
    // dd($last_id);
    // $data=new ItineraryCategory()

    if (isset($request->itinerary_ordering)) {
      $keys = array_keys($request->itinerary_ordering);
      $sn_itinerary = 1;
      $sn_itinerary_count = count($request->itinerary_meals);
      foreach ($keys as $key) {
        if ($key + 1 >= $sn_itinerary_count) {
          continue;
        }
        $tripItinerary = new TripItineraryCategoryModel();
        $tripItinerary->trip_id=$request->trip_id;
        $tripItinerary->ordering = $request->itinerary_ordering[$key];
        $tripItinerary->days=$request->itinerary_days[$key];
        $tripItinerary->meals = $request->itinerary_meals[$key];
        $tripItinerary->accomodation = $request->accommodation[$key];
        $tripItinerary->title = $request->itinerary_title[$key];
        $tripItinerary->content = $request->itinerary_content[$key];
        $tripItinerary->category=$last_id;
        $tripItinerary->save();
        $sn_itinerary++;
      }
    }
    // Insert cost includes
    if (isset($request->testimonial_ordering)) {
      $testimonial_keys = array_keys($request->testimonial_ordering);
      $sn_testimonial = 1;
      $sn_testimonial_count = count($request->testimonial_ordering);
      foreach ($testimonial_keys as $key) {
        if ($key + 1 >= $sn_testimonial_count) {
          continue;
        }
        $tripTestimonial = new TestimonialModel();
        $tripTestimonial->trip_id = $request->trip_id;
        $tripTestimonial->category = $last_id;
        $tripTestimonial->ordering = $request->testimonial_ordering[$key];
        $tripTestimonial->title = $request->testimonial_title[$key];
        $tripTestimonial->content = $request->testimonial_content[$key];
        $tripTestimonial->save();
        $sn_testimonial++;
      }
    }
    // Insert cost excludes
    if (isset($request->info_ordering)) {
      $info_keys = array_keys($request->info_ordering);
      $sn_info = 1;
      $sn_info_count = count($request->info_ordering);
      foreach ($info_keys as $key) {
        if ($key + 1 >= $sn_info_count) {
          continue;
        }
        $tripInfo = new TripInfoModel();
        $tripInfo->trip_id=$request->trip_id;
        $tripInfo->category = $last_id;
        $tripInfo->ordering = $request->info_ordering[$key];
        $tripInfo->title = $request->info_title[$key];
        $tripInfo->content = $request->info_content[$key];
        $tripInfo->save();
        $sn_info++;
      }
    }

    return response()->json(['status' => 'success', 'message' => 'Itinerary Added Successfully']);
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
  public function edit($id,$id2)
  {
    $trip_id=$id2;
    $trip=TripModel::find($trip_id);
    $data = ItineraryCategory::find($id);
    $itineraries=$data->itineraries()->get();
    $cost_includes=$data->cost_includes()->orderBy('ordering')->get();
    $cost_excludes=$data->cost_excludes()->get();
    $itineraryCategory = ItineraryCategory::get();
    return view('admin.itinerary-category.update', compact('trip','data','itineraryCategory','itineraries','cost_includes','cost_excludes','trip_id'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update_itinerary(Request $request)
  {
    //   dd($request->all());
    $request->validate([
      'category'=>'required'
      // "name.*" => 'required|distinct|min:3',
    ]);
    $id=$request->id;
    $data = ItineraryCategory::find($id);
    $data->ordering = $request->ordering;
    $data->category=$request->category;
    // Update itinerary
    if (isset($request->itinerary_ordering)) {
      $keys = array_keys($request->itinerary_ordering);
      $sn_itinerary = 1;
      $sn_itinerary_count = count($request->itinerary_ordering);
      foreach ($keys as $key => $value) {
        if ($key + 1 >= $sn_itinerary_count) {
          continue;
        }
        if ($request->itinerary_id[$value] == "") {
          $itineraryData = new TripItineraryCategoryModel();
          $itineraryData->category = $request->id;
          $itineraryData->days=$request->itinerary_days[$key];
          $itineraryData->trip_id = $request->trip_id;
          $itineraryData->ordering = $request->itinerary_ordering[$key];
          $itineraryData->meals = $request->itinerary_meals[$key];
          $itineraryData->accomodation = $request->accomodation[$key];
          $itineraryData->title = $request->itinerary_title[$key];
          $itineraryData->content = $request->itinerary_content[$key];
          $itineraryData->save();
        } else if ($request->itinerary_id[$value] !== null && $request->itinerary_id[$value] !== "") {
          $itinerary_id = $request->itinerary_id[$value];
          $itineraryData = TripItineraryCategoryModel::find($itinerary_id);
          $itineraryData->category = $request->id;
          $itineraryData->days=$request->itinerary_days[$key];
          $itineraryData->trip_id = $request->trip_id;
          $itineraryData->ordering = $request->itinerary_ordering[$key];
          $itineraryData->meals = $request->itinerary_meals[$key];
          $itineraryData->accomodation = $request->accomodation[$key];
          $itineraryData->title = $request->itinerary_title[$key];
          $itineraryData->content = $request->itinerary_content[$key];
          $itineraryData->save();
        }
        $sn_itinerary++;
      }

    }

    if (isset($request->testimonial_ordering)) {
      $testimonials_keys = array_keys($request->testimonial_ordering);
      $sn_testimonial = 1;
      $sn_testimonial_count = count($request->testimonial_ordering);
      foreach ($testimonials_keys as $key => $value) {
        if ($key + 1 >= $sn_testimonial_count) {
          continue;
        }
        if ($request->testimonial_id[$value] == "") {
          $testimonialData = new TestimonialModel();
          $testimonialData->category = $request->id;
          $testimonialData->trip_id=$request->trip_id;
          $testimonialData->ordering = $request->testimonial_ordering[$key];
          $testimonialData->title = $request->testimonial_title[$key];
          $testimonialData->content = $request->testimonial_content[$key];
          $testimonialData->save();
        } else if ($request->testimonial_id[$value] !== null && $request->testimonial_id[$value] !== "") {
          $testimonial_id = $request->testimonial_id[$value];
          $testimonialData = TestimonialModel::find($testimonial_id);
          $testimonialData->category = $request->id;
          $testimonialData->trip_id=$request->trip_id;
          $testimonialData->ordering = $request->testimonial_ordering[$key];
          $testimonialData->title = $request->testimonial_title[$key];
          $testimonialData->content = $request->testimonial_content[$key];
          $testimonialData->save();
        }
        $sn_testimonial++;
      }
    }

    if (isset($request->info_id)) {
      $info_keys = array_keys($request->info_id);
      $sn_info = 1;
      $sn_info_count = count($request->info_id);
      foreach ($info_keys as $key => $value) {
        if ($key + 1 >= $sn_info_count) {
          continue;
        }
        if ($request->info_id[$value] == "") {
          $infoData = new TripInfoModel();
          $infoData->category = $request->id;
          $infoData->trip_id=$request->trip_id;
          $infoData->ordering = $request->info_ordering[$key];
          $infoData->title = $request->info_title[$key];
          $infoData->content = $request->info_content[$key];
          $infoData->save();
        } else if ($request->info_id[$value] !== null && $request->info_id[$value] !== "") {
          $info_id = $request->info_id[$value];
          $infoData = TripInfoModel::find($info_id);
          $infoData->category = $request->id;
           $infoData->trip_id=$request->trip_id;
          $infoData->ordering = $request->info_ordering[$key];
          $infoData->title = $request->info_title[$key];
          $infoData->content = $request->info_content[$key];
          $infoData->save();
        }
        $sn_info++;
      }
    }
    $data->save();

    return response()->json(['status' => 'success', 'message' => 'Itinerary Category update Successful!']);
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
   $find=ItineraryCategory::find($id);

    if($find)
    {
      DB::table('cl_trip_itinerary_rel')->where('category_id',$id)->delete();
    }
    if($find->cost_includes != NULL){
      TestimonialModel::where('category',$id)->delete();
    }
    if($find->cost_excludes != NULL){
      TripInfoModel::where('category',$id)->delete();
    }
    if($find->itineraries != Null)
    {
      TripItineraryCategoryModel::where('category',$id)->delete();
    }
    $find->delete();

    return redirect()->back();
  }

 public function delete_itinerary($trip_id,$id)
  {
    $data = TripItineraryCategoryModel::find($id);
    $data->delete();

  }

  public function delete_cost_include($trip_id,$id)
  {
    $data = TestimonialModel::find($id);
    $data->delete();
  }

  public function delete_cost_exclude($trip_id,$id)
  {
    $data=TripInfoModel::find($id);
    $data->delete();
  }
  
  public function isdefault(Request $request){  
   
      $data = ItineraryCategory::find($request->id);      
      $trips = ItineraryCategory::where('trip_id',$data->trip_id)->get(); 
       $default_trip = ItineraryCategory::where('trip_id',$data->trip_id)->where('default','1')->get();      
   

    if($data->default == '1'){
      $data->default = '0';   
      $data->save();  
      return back();
    }else if($data->default == '0'){
       foreach($default_trip as $row) {       
        if ( $row->default == 1 ) {
             $trips = ItineraryCategory::where('trip_id',$data->trip_id)->update(['default'=> 0]);
        }
    }
      $data->default = '1';      
      $data->save();  
      return back();
    }
    return back();  
  }

}

 