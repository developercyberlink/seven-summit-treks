<?php

namespace App\Http\Controllers\AdminControllers\Travels;
use App\Http\Controllers\Controller;
use App\Models\Expeditions\ExpeditionGroupModel;
use App\Models\Expeditions\ExpeditionModel;
use App\Models\Faqs\FaqModel;
use App\Models\Settings\CountryModel;
use App\Models\Settings\RatingModel;
use App\Models\Testimonials\TestimonialModel;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\DestinationModel;
use App\Models\Travels\RegionModel;
use App\Models\Travels\RouteCampModel;
use App\Models\Travels\SeasonModel;
use App\Models\Travels\TripGearModel;
use App\Models\Travels\TripGradeModel;
use App\Models\Travels\TripGroupModel;
use App\Models\Travels\TripInfoModel;
use App\Models\Travels\TripItineraryModel;
use App\Models\Travels\TripModel;
use App\Models\Travels\TripScheduleModel;
use App\Models\Travels\WeatherReportModel;
use App\Models\Travels\TripHighlights;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\Travels\TripItineraryCategoryModel;
use App\Models\Travels\TripTypeModel;
use DB;
use App\ItineraryCategory;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{

    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treking = TripModel::where('trip_type','1')->orderBy('ordering', 'asc')->get();
        $expedition = TripModel::where('trip_type','2')->orderBy('ordering', 'asc')->get();
        return view('admin.trips.index', compact('treking','expedition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = DestinationModel::all();
        $regions = RegionModel::all();
        $activities = ActivityModel::all();
        $trip_groups = TripGroupModel::all();
        $expeditions = ExpeditionModel::all();
        $expeditionGroups = ExpeditionGroupModel::all();
        $ordering = TripModel::max('ordering');
        $availability = array( 'AVAILABLE' => 'AVAILABLE',  'CLOSED' => 'CLOSED');
        $ordering += 1;
        $all_trips = TripModel::get();
        $grades = TripGradeModel::all();
        $ratings = RatingModel::all();
        $seasons = SeasonModel::all();
        $countries = CountryModel::all();
        $itineraryCategory = TripItineraryCategoryModel::get();
        $trip_type = TripTypeModel::get();
        $exp=DB::table('trip_grading')->where('type','expedition')->get();
        $trek=TripGradeModel::get();
        $category=ItineraryCategory::get();
        return view('admin.trips.create', compact('category','exp','trek','all_trips', 'trip_type', 'grades', 'itineraryCategory', 'ratings', 'seasons', 'countries', 'ordering', 'expeditions', 'destinations', 'regions', 'activities', 'trip_groups', 'expeditionGroups', 'availability'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
              'trip_title' => 'required',
                'trip_type' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()->all()
                ]);
            }

            $banner_width = env('BANNER_WIDTH');
            $banner_height = env('BANNER_HEIGHT');

            $data = $request->all();

            /*************Banner Upload************/
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

            /******Upload Thumbnail******/
            $thumb_file = $request->file('thumbnail');
            $thumbnail_name = '';
            if ($request->hasfile('thumbnail')) {
                $thumbnail = $request->file('thumbnail')->getClientOriginalName();
                $extension = $request->file('thumbnail')->getClientOriginalExtension();
                $thumbnail = explode('.', $thumbnail);
                $thumbnail_name = Str::slug($thumbnail[0]) . '-' . Str::random(40) . '.' . $extension;

                $destinationPath = public_path('uploads/original');

                $thumbnail_picture = Image::make($thumb_file->getRealPath());
                $width = Image::make($thumb_file->getRealPath())->width();
                $height = Image::make($thumb_file->getRealPath())->height();
                $thumbnail_picture->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $thumbnail_name);
            }
            /*****************************/

            /******Upload Trip Map******/
            $map_file = $request->file('trip_map');
            $map_file_name = '';
            if ($request->hasfile('trip_map')) {
                $map_thumbnail = $request->file('trip_map')->getClientOriginalName();
                $map_extension = $request->file('trip_map')->getClientOriginalExtension();
                $map_thumbnail = explode('.', $map_thumbnail);
                $map_file_name = time() . '_' . Str::slug($map_thumbnail[0]) . '-' . Str::random(40) . '.' . $map_extension;

                $map_destinationPath = public_path('uploads/original');

                $map_thumbnail_picture = Image::make($map_file->getRealPath());
                $map_width = Image::make($map_file->getRealPath())->width();
                $map_height = Image::make($map_file->getRealPath())->height();
                $map_thumbnail_picture->resize($map_width, $map_height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($map_destinationPath . '/' . $map_file_name);
            }
            /*****************************/

            if ($request->trip_code == null) {
                $data['trip_code'] = rand() . '-' . time();
            }

            $data['uri'] = Str::slug($request->uri);
            $data['banner'] = $banner_name;
            $data['thumbnail'] = $thumbnail_name;
            $data['trip_map'] = $map_file_name;

            $is_draft = '0';
            if ($request->submit == 'publish') {
                $is_draft = '0';
            } else if ($request->submit == 'draft') {
                $is_draft = '1';
            }
            $data['is_draft'] = $is_draft;
            $result = TripModel::create($data);
            $last_id = $result->id;

           
            // Insert into schedule
            if (isset($request->schedule_ordering)) {
                $schedule_keys = array_keys($request->schedule_ordering);
                $sn_schedule = 1;
                $sn_schedule_count = count($request->schedule_ordering);
                foreach ($schedule_keys as $key) {
                    if ($key + 1 >= $sn_schedule_count) {
                        continue;
                    }
                    $tripSchedule = new TripScheduleModel();
                    $tripSchedule->trip_detail_id = $last_id;
                    $tripSchedule->start_date = $request->schedule_start_date[$key];
                    $tripSchedule->end_date = $request->schedule_end_date[$key];
                    $tripSchedule->group_size = $request->schedule_group_size[$key];
                    $tripSchedule->availability = $request->schedule_availability[$key];
                    $tripSchedule->price = $request->schedule_price[$key];
                    $tripSchedule->remarks = $request->schedule_remarks[$key];
                    $tripSchedule->ordering = $request->schedule_ordering[$key];
                    $tripSchedule->save();
                    $sn_schedule++;
                }
            }

            // Insert Photo Videos
            if (isset($request->gear_ordering)) {
                $gear_keys = array_keys($request->gear_ordering);
                $sn_gear = 1;
                $sn_gear_count = count($request->gear_ordering);
                foreach ($gear_keys as $key => $value) {
                    if ($key + 1 >= $sn_gear_count) {
                        continue;
                    }
                    $gearData = new TripGearModel();
                    $gearData->trip_detail_id = $last_id;
                    $thumb_file = $request->file('gear_thumbnail');
                    if (isset($thumb_file[$value])) {
                        $thumb = time() . '-' . Str::random(15) . $thumb_file[$value]->getClientOriginalName();
                        $destinationPath = public_path('uploads/original');
                        $thumb_file[$value]->move($destinationPath, $thumb);
                        $gearData->thumbnail = $thumb;
                    }
                    $gearData->ordering = $request->gear_ordering[$key];
                    $gearData->title = $request->gear_title[$key];
                    $gearData->content = $request->gear_content[$key];
                    $gearData->video = $request->gear_video[$key];
                    $gearData->save();
                    $sn_gear++;
                }
            }
            
            // Insert into faqs
            if (isset($request->faq_ordering)) {
                $faqs_keys = array_keys($request->faq_ordering);
                $sn_faqs = 1;
                $sn_faqs_count = count($request->faq_ordering);
                foreach ($faqs_keys as $key) {
                    if ($key + 1 >= $sn_faqs_count) {
                        continue;
                    }
                    $tripFaqs = new FaqModel();
                    $tripFaqs->trip_detail_id = $last_id;
                    $tripFaqs->ordering = $request->faq_ordering[$key];
                    $tripFaqs->title = $request->faq_title[$key];
                    $tripFaqs->content = $request->faq_content[$key];
                    $tripFaqs->save();
                    $sn_faqs++;
                }
            }
            

            // Insert Route Camp Info
            if (isset($request->routecamp_ordering)) {
                $routecamp_keys = array_keys($request->routecamp_ordering);
                $sn_routecamp = 1;
                $sn_routecamp_count = count($request->routecamp_ordering);
                foreach ($routecamp_keys as $key) {
                    if ($key + 1 >= $sn_routecamp_count) {
                        continue;
                    }
                    $tripRoutecamp = new RouteCampModel();
                    $tripRoutecamp->trip_detail_id = $last_id;
                    $tripRoutecamp->ordering = $request->routecamp_ordering[$key];
                    $tripRoutecamp->title = $request->routecamp_title[$key];
                    $tripRoutecamp->content = $request->routecamp_content[$key];
                    $tripRoutecamp->save();
                    $sn_routecamp++;
                }
            }

            // Insert into Weather Report
                WeatherReportModel::updateOrCreate(
                    ['trip_detail_id' => $last_id],
                    ['title' => $request->title, 'weather_report_uri' => $request->weather_report_uri, 'content' => $request->content, 'trip_detail_id' => $last_id]
                );
            
            
            // Insert into Highlights
      if(isset($request->highlights_ordering)){
        $highlight_keys = array_keys($request->highlights_ordering);   
        $sn_highlights = 1;
        $sn_highlights_count = count($request->highlights_ordering);
        foreach($highlight_keys as $key){
          if( $key + 1 >= $sn_highlights_count ){
            continue;
          }
          $tripHighlights = new TripHighlights();
          $tripHighlights->trip_detail_id = $last_id;       
          $tripHighlights->ordering = $request->highlights_ordering[$key];   
          $tripHighlights->title = $request->highlights_title[$key]; 
         
          $tripHighlights->save(); 
          $sn_highlights++;     
        }
      }
      

            /************Attach******************/
            $_data = TripModel::find($last_id);
            $_data->destinations()->attach($request->destination);
            $_data->regions()->attach($request->region);
            $_data->activities()->attach($request->activity);
            $_data->tripgroups()->attach($request->tripgroup);
            $_data->expeditions()->attach($request->expedition);
            $_data->categories()->attach($request->category);

            /************************************/
            return response()->json(['status' => 'success', 'message' => 'Trip Added Successfully']);
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
         $data = TripModel::find($id);
        $checked_destinations = array();
        $checked_regions = array();
        $checked_activities = array();
        $checked_tripgroups = array();
        $checked_expeditions = array();
        $checked_categories=array();

        foreach ($data->expeditions as $value) {
            $checked_expeditions[] = $value->pivot->expedition_id;
        }
        foreach ($data->destinations as $value) {
            $checked_destinations[] = $value->pivot->destination_id;
        }
        foreach ($data->regions as $value) {
            $checked_regions[] = $value->pivot->region_id;
        }
        foreach ($data->activities as $value) {
            $checked_activities[] = $value->pivot->activity_id;
        }
        foreach ($data->tripgroups as $value) {
            $checked_tripgroups[] = $value->pivot->group_id;
        }
        foreach ($data->categories as $value) {
            $checked_categories[] = $value->pivot->category_id;
        }

        $destinations = DestinationModel::all();
        $regions = RegionModel::all();
        $activities = ActivityModel::all();
        $trip_groups = TripGroupModel::all();
        $category=ItineraryCategory::where('trip_id',$data->id)->get();
        $expeditions = ExpeditionModel::all();
        $expeditionGroups = ExpeditionGroupModel::all();
        $availability = array(
            'AVAILABLE' => 'AVAILABLE',
            'CLOSED' => 'CLOSED');
        // $itineraries = $data->itineraries()->get();
        $schedules = $data->schedules()->orderBy('ordering','asc')->get();
        $gears = $data->gears()->orderBy('ordering','asc')->get();
        $faqs = $data->faqs()->orderBy('ordering','asc')->get();
        // $testimonials = $data->testimonials()->get();
        // $infos = $data->infos()->get();
        $routecamp = $data->routecamp()->orderBy('ordering','asc')->get();
        $all_trips = TripModel::get();
        $grades = TripGradeModel::all();
        $ratings = RatingModel::all();
        $seasons = SeasonModel::all();
        $countries = CountryModel::all();
        $weather_report = WeatherReportModel::where('trip_detail_id', $id)->first();
        $itineraryCategory = TripItineraryCategoryModel::get();
        $highlights = $data->highlights()->orderBy('ordering','asc')->get();
        $trip_type = TripTypeModel::get();
        $exp=DB::table('trip_grading')->where('type','expedition')->get();
        $trek=TripGradeModel::get();
        return view('admin.trips.edit', compact(
          'exp',
          'trek',
            'all_trips',
            'data',
            'trip_type',
            'seasons',
            'itineraryCategory',
            'weather_report',
            'countries',
            'availability',
            'destinations',
            'regions',
            'activities',
            'trip_groups',
            'expeditions',
            'category',
            'checked_categories',
            'checked_destinations',
            'checked_regions',
            'checked_activities',
            'checked_tripgroups',
            'checked_expeditions',
            // 'itineraries',
            'schedules',
            'gears',
            'faqs',
            // 'testimonials',
            // 'infos',
            'routecamp',
            'expeditionGroups',
            'grades',
            'ratings',
            'highlights'
        ));
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
        $wid = WeatherReportModel::where('trip_detail_id',$id)->first();
        if ($request->ajax()) {
             $validator = Validator::make($request->all(), [
              'trip_title' => 'required',
            'weather_report_uri'=>'nullable|sometimes|unique:cl_trip_weather_reports,weather_report_uri,' . $wid->id,
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()->all()
                ]);
            }
            $is_draft = 0;
            if ($request->submit == 'publish') {
                $is_draft = 0;
            } else if ($request->submit == 'draft') {
                $is_draft = 1;
            }

            $banner_width = env('BANNER_WIDTH');
            $banner_height = env('BANNER_HEIGHT');

            $data = TripModel::find($id);

            $file = $request->file('banner');
            $thumbnail_file = $request->file('thumbnail');
            $tripmap_file = $request->file('trip_map');
            $banner_name = '';
            $thumbnail_name = '';
            $trip_map_name = '';
            if ($request->hasfile('banner')) {
                $data = TripModel::find($id);
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

            /*****Thumbnail*****/
            if ($request->hasfile('thumbnail')) {
                $data = TripModel::find($id);
                if ($data->thumbnail) {
                    if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)) {
                        unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail);
                    }
                }
                $thumbnail = $request->file('thumbnail')->getClientOriginalName();
                $extension = $request->file('thumbnail')->getClientOriginalExtension();
                $thumbnail = explode('.', $thumbnail);
                $thumbnail_name = time() . '_' . Str::slug($thumbnail[0]) . '-' . Str::random(40) . '.' . $extension;
                $destinationPath = public_path('uploads/original');
                $thumbnail_picture = Image::make($thumbnail_file->getRealPath());
                $width = Image::make($thumbnail_file->getRealPath())->width();
                $height = Image::make($thumbnail_file->getRealPath())->height();

                $thumbnail_picture->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $thumbnail_name);
                $data->thumbnail = $thumbnail_name;
            }

            /************Trip Map*************/
            if ($request->hasfile('trip_map')) {
                $data = TripModel::find($id);
                if ($data->trip_map) {
                    if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map)) {
                        unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map);
                    }
                }
                $trip_map = $request->file('trip_map')->getClientOriginalName();
                $extension = $request->file('trip_map')->getClientOriginalExtension();
                $trip_map = explode('.', $trip_map);
                $trip_map_name = Str::slug($trip_map[0]) . '-' . Str::random(40) . '.' . $extension;
                $destinationPath = public_path('uploads/original');
                $trip_map_picture = Image::make($tripmap_file->getRealPath());
                $width = Image::make($tripmap_file->getRealPath())->width();
                $height = Image::make($tripmap_file->getRealPath())->height();

                $trip_map_picture->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $trip_map_name);
                $data->trip_map = $trip_map_name;
            }
            $data->video_status=$request->video_status;
            $data->trip_title = $request->trip_title;
            $data->sub_title = $request->sub_title;
            $data->duration = $request->duration;
            $data->max_altitude = $request->max_altitude;
            $data->best_season = $request->best_season;
            $data->starting_price = $request->starting_price;
            $data->trip_currency = $request->trip_currency;
            $data->trip_video = $request->trip_video;
            $data->trip_phone = $request->trip_phone;
            $data->trip_tag = $request->trip_tag;
            $data->trip_email = $request->trip_email;
            $data->trip_excerpt = $request->trip_excerpt;
            $data->trip_content = $request->trip_content;
            $data->uri = Str::slug($request->uri);
            $data->trip_code = $request->trip_code;
            $data->ordering = $request->ordering;
            $data->meta_key = $request->meta_key;
            $data->meta_description = $request->meta_description;
            $data->trip_grade = $request->trip_grade ? $request->trip_grade : '';
            $data->exp_grade = $request->exp_grade ? $request->exp_grade : '';
            $data->trip_grade_msg = $request->trip_grade_msg;
            $data->country = $request->country;
            $data->peak_name = $request->peak_name;
            $data->rating = $request->rating;
            $data->status_text = $request->status_text;
            $data->is_draft = $is_draft;

            $data->walking_per_day = $request->walking_per_day;
            $data->group_size = $request->group_size;
            $data->accommodation = $request->accommodation;
            $data->route = $request->route;
            $data->rank = $request->rank;
            $data->coordinate = $request->coordinate;
            $data->weather_report = $request->weather_report;
            $data->trip_range = $request->trip_range;
            $data->expedition_group_id = $request->expedition_group_id;
            $data->trip_type = $request->trip_type;
            
            $_data = TripModel::find($id);
            $_data->destinations()->detach();
            $_data->destinations()->attach($request->destination);
            $_data->regions()->detach();
            $_data->regions()->attach($request->region);
            $_data->activities()->detach();
            $_data->activities()->attach($request->activity);
            $_data->tripgroups()->detach();
            $_data->tripgroups()->attach($request->tripgroup);
            $_data->expeditions()->detach();
            $_data->expeditions()->attach($request->expedition);
            $_data->relatedtrips()->detach();
            $_data->relatedtrips()->attach($request->related_trips);
              $_data->categories()->detach();
            $_data->categories()->attach($request->category);


            // Update itinerary
            // if (isset($request->itinerary_ordering)) {
            //     $keys = array_keys($request->itinerary_ordering);
            //     $sn_itinerary = 1;
            //     $sn_itinerary_count = count($request->itinerary_days);
            //     foreach ($keys as $key => $value) {
            //         if ($key + 1 >= $sn_itinerary_count) {
            //             continue;
            //         }
            //         if ($request->itinerary_id[$value] == "") {
            //             $itineraryData = new TripItineraryModel();
            //             $itineraryData->trip_detail_id = $data->id;
            //             $itineraryData->ordering = $request->itinerary_ordering[$key];
            //             $itineraryData->days = $request->itinerary_days[$key];
            //             $itineraryData->category_id = $request->category_id[$key];                       
            //             $itineraryData->title = $request->itinerary_title[$key];
            //             $itineraryData->content = $request->itinerary_content[$key];
            //             $itineraryData->save();
            //         } else if ($request->itinerary_id[$value] !== null && $request->itinerary_id[$value] !== "") {
            //             $itinerary_id = $request->itinerary_id[$value];
            //             $itineraryData = TripItineraryModel::find($itinerary_id);
            //             $itineraryData->trip_detail_id = $data->id;
            //             $itineraryData->ordering = $request->itinerary_ordering[$key];
            //             $itineraryData->days = $request->itinerary_days[$key];
            //             $itineraryData->category_id = $request->category_id[$key];
            //             $itineraryData->title = $request->itinerary_title[$key];
            //             $itineraryData->content = $request->itinerary_content[$key];
            //             $itineraryData->save();
            //         }
            //         $sn_itinerary++;
            //     }
            // }

            // Update Schedule
            if (isset($request->schedule_ordering)) {
                $schedule_keys = array_keys($request->schedule_ordering);
                $sn_schedule = 1;
                $sn_schedule_count = count($request->schedule_ordering);
                foreach ($schedule_keys as $key => $value) {
                    if ($key + 1 >= $sn_schedule_count) {
                        continue;
                    }
                    if ($request->schedule_id[$value] == "") {
                        $scheduleData = new TripScheduleModel();
                        $scheduleData->trip_detail_id = $data->id;
                        $scheduleData->ordering = $request->schedule_ordering[$key];
                        $scheduleData->start_date = $request->schedule_start_date[$key];
                        $scheduleData->end_date = $request->schedule_end_date[$key];
                        $scheduleData->group_size = $request->schedule_group_size[$key];
                        $scheduleData->availability = $request->schedule_availability[$key];
                        $scheduleData->price = $request->schedule_price[$key];
                        $scheduleData->remarks = $request->schedule_remarks[$key];
                        $scheduleData->save();
                    } else if ($request->schedule_id[$value] !== null && $request->schedule_id[$value] !== "") {
                        $schedule_id = $request->schedule_id[$value];
                        $scheduleData = TripScheduleModel::find($schedule_id);
                        $scheduleData->trip_detail_id = $data->id;
                        $scheduleData->ordering = $request->schedule_ordering[$key];
                        $scheduleData->start_date = $request->schedule_start_date[$key];
                        $scheduleData->end_date = $request->schedule_end_date[$key];
                        $scheduleData->group_size = $request->schedule_group_size[$key];
                        $scheduleData->availability = $request->schedule_availability[$key];
                        $scheduleData->price = $request->schedule_price[$key];
                        $scheduleData->remarks = $request->schedule_remarks[$key];
                        $scheduleData->save();
                    }
                    $sn_schedule++;
                }
            }

            // Update Photos Videos
            
            if (isset($request->gear_id)) {
                $gear_keys = array_keys($request->gear_id);
                $sn_gear = 1;
                $sn_gear_count = count($request->gear_id);

                foreach ($gear_keys as $key => $value) {
                    if ($key + 1 >= $sn_gear_count) {
                        continue;
                    }
                    if ($request->gear_id[$value] == "") {
                        $gearData = new TripGearModel();
                        $gearData->trip_detail_id = $data->id;
                        $thumb_file = $request->file('gear_thumbnail');
                        if (isset($thumb_file[$value])) {
                            $thumb = time() . '-' . Str::random(15) . $thumb_file[$value]->getClientOriginalName();
                            $destinationPath = public_path('uploads/original');
                            $thumb_file[$value]->move($destinationPath, $thumb);
                            $gearData->thumbnail = $thumb;
                        }
                        $gearData->ordering = $request->gear_ordering[$key];
                        $gearData->title = $request->gear_title[$key];
                        $gearData->content = $request->gear_content[$key];
                        $gearData->video = $request->gear_video[$key];
                        $gearData->save();
                    } else if ($request->gear_id[$value] !== null && $request->gear_id[$value] !== "") {
                        $gear_id = $request->gear_id[$value];
                        $gearData = TripGearModel::find($gear_id);

                        $thumb_file = $request->file('gear_thumbnail');
                        if (isset($thumb_file[$key])) {

                            if ($gearData->thumbnail) {
                                if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $gearData->thumbnail)) {
                                    unlink(env('PUBLIC_PATH') . 'uploads/original/' . $gearData->thumbnail);
                                }
                            }
                            $thumb = time() . '-' . Str::random(15) . $thumb_file[$key]->getClientOriginalName();
                            $destinationPath = public_path('uploads/original');
                            $thumb_file[$key]->move($destinationPath, $thumb);
                            $gearData->thumbnail = $thumb;
                        }
                        $gearData->trip_detail_id = $data->id;
                        $gearData->ordering = $request->gear_ordering[$key];
                        $gearData->title = $request->gear_title[$key];
                        $gearData->content = $request->gear_content[$key];
                        $gearData->video = $request->gear_video[$key];
                        $gearData->save();
                    }

                    $sn_gear++;
                }
            }

            // Update FAQs
            if (isset($request->faq_ordering)) {
                $faqs_keys = array_keys($request->faq_ordering);
                $sn_faq = 1;
                $sn_faq_count = count($request->faq_ordering);
                foreach ($faqs_keys as $key => $value) {
                    if ($key + 1 >= $sn_faq_count) {
                        continue;
                    }
                    if ($request->faq_id[$value] == "") {
                        $faqData = new FaqModel();
                        $faqData->trip_detail_id = $data->id;
                        $faqData->ordering = $request->faq_ordering[$key];
                        $faqData->title = $request->faq_title[$key];
                        $faqData->content = $request->faq_content[$key];
                        $faqData->save();
                    } else if ($request->faq_id[$value] !== null && $request->faq_id[$value] !== "") {
                        $faq_id = $request->faq_id[$value];
                        $faqData = FaqModel::find($faq_id);
                        $faqData->trip_detail_id = $data->id;
                        $faqData->ordering = $request->faq_ordering[$key];
                        $faqData->title = $request->faq_title[$key];
                        $faqData->content = $request->faq_content[$key];
                        $faqData->save();
                    }
                    $sn_faq++;
                }
            }

            // Update Testimonials
            // if (isset($request->testimonial_ordering)) {
            //     $testimonials_keys = array_keys($request->testimonial_ordering);
            //     $sn_testimonial = 1;
            //     $sn_testimonial_count = count($request->testimonial_ordering);
            //     foreach ($testimonials_keys as $key => $value) {
            //         if ($key + 1 >= $sn_testimonial_count) {
            //             continue;
            //         }
            //         if ($request->testimonial_id[$value] == "") {
            //             $testimonialData = new TestimonialModel();
            //             $testimonialData->trip_detail_id = $data->id;
            //             $testimonialData->ordering = $request->testimonial_ordering[$key];
            //             $testimonialData->title = $request->testimonial_title[$key];
            //             $testimonialData->content = $request->testimonial_content[$key];
            //             $testimonialData->save();
            //         } else if ($request->testimonial_id[$value] !== null && $request->testimonial_id[$value] !== "") {
            //             $testimonial_id = $request->testimonial_id[$value];
            //             $testimonialData = TestimonialModel::find($testimonial_id);
            //             $testimonialData->trip_detail_id = $data->id;
            //             $testimonialData->ordering = $request->testimonial_ordering[$key];
            //             $testimonialData->title = $request->testimonial_title[$key];
            //             $testimonialData->content = $request->testimonial_content[$key];
            //             $testimonialData->save();
            //         }
            //         $sn_testimonial++;
            //     }
            // }
            // // Update supporting info
            // if (isset($request->info_id)) {
            //     $info_keys = array_keys($request->info_id);
            //     $sn_info = 1;
            //     $sn_info_count = count($request->info_id);
            //     foreach ($info_keys as $key => $value) {
            //         if ($key + 1 >= $sn_info_count) {
            //             continue;
            //         }
            //         if ($request->info_id[$value] == "") {
            //             $infoData = new TripInfoModel();
            //             $infoData->trip_detail_id = $data->id;
            //             $infoData->ordering = $request->info_ordering[$key];
            //             $infoData->title = $request->info_title[$key];
            //             $infoData->content = $request->info_content[$key];
            //             $infoData->save();
            //         } else if ($request->info_id[$value] !== null && $request->info_id[$value] !== "") {
            //             $info_id = $request->info_id[$value];
            //             $infoData = TripInfoModel::find($info_id);
            //             $infoData->trip_detail_id = $data->id;
            //             $infoData->ordering = $request->info_ordering[$key];
            //             $infoData->title = $request->info_title[$key];
            //             $infoData->content = $request->info_content[$key];
            //             $infoData->save();
            //         }
            //         $sn_info++;
            //     }
            // }

            // Update route camp
            if (isset($request->routecamp_id)) {
                $routecamp_keys = array_keys($request->routecamp_id);
                $sn_routecamp = 1;
                $sn_routecamp_count = count($request->routecamp_id);
                foreach ($routecamp_keys as $key => $value) {
                    if ($key + 1 >= $sn_routecamp_count) {
                        continue;
                    }
                    if ($request->routecamp_id[$value] == "") {
                        $routecampData = new RouteCampModel();
                        $routecampData->trip_detail_id = $data->id;
                        $routecampData->ordering = $request->routecamp_ordering[$key];
                        $routecampData->title = $request->routecamp_title[$key];
                        $routecampData->content = $request->routecamp_content[$key];
                        $routecampData->save();
                    } else if ($request->routecamp_id[$value] !== null && $request->routecamp_id[$value] !== "") {
                        $routecamp_id = $request->routecamp_id[$value];
                        $routecampData = RouteCampModel::find($routecamp_id);
                        $routecampData->trip_detail_id = $data->id;
                        $routecampData->ordering = $request->routecamp_ordering[$key];
                        $routecampData->title = $request->routecamp_title[$key];
                        $routecampData->content = $request->routecamp_content[$key];
                        $routecampData->save();
                    }
                    $sn_routecamp++;
                }
            }

            // Update weather report
            
            WeatherReportModel::updateOrCreate(
                ['trip_detail_id' => $data->id],
                ['title' => $request->title, 'weather_report_uri' => $request->weather_report_uri, 'content' => $request->content]
            );
                    
              
            
             // Insert into Highlights
      if(isset($request->highlights_id)){
        $highlights_keys = array_keys($request->highlights_id); 
        $sn_highlights = 1;
        $sn_highlights_count = count($request->highlights_id);  
        foreach($highlights_keys as $key=>$value){          
            if($key + 1 >= $sn_highlights_count){
              continue;
            }          
          if($request->highlights_id[$value] == ""){
              $highlightsData = new TripHighlights();
              $highlightsData->trip_detail_id = $data->id;
              $highlightsData->ordering = $request->highlights_ordering[$key];
              $highlightsData->title = $request->highlights_title[$key]; 
              $highlightsData->save();  
          } else if($request->highlights_id[$value] !== NULL && $request->highlights_id[$value] !== ""){
            $highlights_id = $request->highlights_id[$value];
              $highlightsData = TripHighlights::find($highlights_id);
              $highlightsData->trip_detail_id = $data->id;
              $highlightsData->ordering = $request->highlights_ordering[$key];
              $highlightsData->title = $request->highlights_title[$key]; 
              $highlightsData->save(); 
          }         
          $sn_highlights++;
        }
      }

            $data->save();
            return response()->json(['status' => 'success', 'message' => 'Trip Update Successful!']);
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
        $data = TripModel::find($id);
        if ($data->banner != null) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        $data->destinations()->detach();
        $data->expeditions()->detach();
        $data->regions()->detach();
        $data->activities()->detach();
        $data->tripgroups()->detach();
        $data->itineraries()->delete();
        $data->schedules()->delete();
        $data->gears()->delete();
        $data->faqs()->delete();
        $data->routecamp()->delete();
        $data->weather_report()->delete();
        $data->highlights()->delete();
        if($data->trek_bookings != Null)
        {
            DB::table('trip_bookings')->where('trip_id',$id)->delete();
        }
         if($data->exp_bookings != Null )
        {
             DB::table('trip_bookings')->where('expedition_id',$id)->delete();
        }
          if($data->categories != Null)
        {
          DB::table('cl_trip_itinerary_rel')->where('trip_id',$id)->delete();
        }
        $data->delete();
        return 'Deleted Successfully';
    }

    // Delete Trip Thumbnail
    public function delete_trip_thumb(TripModel $tripModel, $id)
    {
        $data = TripModel::find($id);
        if ($data->thumbnail) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail);
            }
        }
        $data->thumbnail = null;
        $data->save();
        return response('Delete Successful.');
    }

    // Delete Trip Banner
    public function delete_trip_banner_thumb(TripModel $tripModel, $id)
    {
        $data = TripModel::find($id);
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        $data->banner = null;
        $data->save();
        return response('Delete Successful.');
    }

    // Delete Map Thimb
    public function delete_map_thumb(TripModel $tripModel, $id)
    {
        $data = TripModel::find($id);
        if ($data->trip_map) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map);
            }
        }
        $data->trip_map = null;
        $data->save();
        return response('Delete Successful.');
    }
    
    function destroyhighlights($trip_id,$id)
    {
      $data = TripHighlights::find($id);      
      $data->delete();
      return 'Are you sure to delete?';
    }
    
      public function tripstatus($id){
    $data = TripModel::find($id);
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
