<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingMail;
use App\Mail\AdminContactMail;
use App\Mail\AdminInquiryMail;
use App\Mail\VerifyContactMail;
use App\Mail\VerifyMail;
use App\Model\Subscriber;
use App\Model\VerifyContact;
use App\Model\VerifyUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\BookingComplete;
use App\Mail\CareerApply;
use App\Mail\SendMailContact;
use App\Mail\TripBooking1;
use App\Mail\TripBooking2;
use App\Models\Banners\BannerModel;
use App\Models\Expeditions\ExpeditionGroupModel;
use App\Models\Expeditions\ExpeditionModel;
use App\Models\Faqs\FaqModel;
use App\Models\Galleries\ImageGalleryModel;
use App\Models\Posts\AssociatedPostModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostDocModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Settings\CountryModel;
use App\Models\Settings\RatingModel;
use App\Models\Settings\SettingModel;
use App\Models\Testimonials\TestimonialModel;
use App\Models\Travels\ActivityGroupModel;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\DestinationModel;
use App\Models\Travels\RegionModel;
use App\Models\Travels\RouteCampModel;
use App\Models\Travels\TripDocModel;
use App\Models\Travels\TripGearModel;
use App\Models\Travels\TripInfoModel;
use App\Models\Travels\TripItineraryCategoryModel;
use App\Models\Travels\TripItineraryModel;
use App\Models\Travels\TripModel;
use App\Models\Travels\TripScheduleModel;
use App\Models\Travels\TripVideoModel;
use App\Models\Travels\WeatherReportModel;
use App\Model\TripBooking;
use App\Model\TripInquiry;
use App\Model\TripReview;
use App\Models\Team\TeamCategory;
use App\Models\Team\TeamModel;
use App\Models\Team\Achievements;
use App\Models\Team\Certificates;
use App\Models\Team\MountainSubmitted;
use App\Models\Pages\PageModel;
use App\Models\Pages\PageTypeModel;
use App\Models\Pages\PageDetails;
use App\Models\Galleries\VideoGalleryModel;
use App\Models\Galleries\VideoGalleryCategoryModel;
use Mail;
use App\Model\Geography;
use App\Mail\BookTrip;
use App\Model\Contact;
use DB;
use App\ItineraryCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\Pages\PageDocModel;
use App\Models\Posts\PostImageModel;
use App\Models\Travels\TripGroupModel;



class FrontpageController extends Controller
{
    public function index()
    {
        $banners = BannerModel::where('ordering','1')->orderBy('banner_ordering','asc')->get();
        $blogs = PostModel::where(['post_type'=>'5','status'=>'1'])->orderBy('id', 'desc')->take(2)->get();
        $blog_thumbs = PostModel::where(['post_type'=>'5','status'=>'1'])->orderBy('id', 'desc')->skip(2)->take(6)->get();
        $expeditions = ExpeditionModel::orderBy('ordering', 'asc')->get();
        $regions = RegionModel::orderBy('ordering', 'asc')->take(12)->get();
        $reviews = TripReview::where('status','1')->orderBy('id', 'desc')->limit(5)->get();
        $settings = SettingModel::all();
        return view('themes.default.frontpage', compact('banners', 'reviews', 'regions', 'blogs', 'blog_thumbs', 'expeditions', 'settings'));
    }

    public function pagedetail($uri)
    {
        if (!check_uri($uri)) {
            abort(404);
        }

        $data['template'] = 'single';

        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();

        if ($data['template']) {
            $data['template'] = $data['template'];
        }

        $post = PostModel::where('uri', $uri)->first();

        $post_type_id = intval($post->post_type);
        $post_type = PostTypeModel::where('id', $post_type_id)->first();

        if ($post_type->id == 5) {
            $data['template'] = 'blog-single';
        }

        $latest_posts = PostModel::where(['post_type'=>'5','status'=>'1'])->orderBy('id', 'desc')->take(10)->get();
        $data_child = PostModel::where('post_parent', $data['id'])->where('status','1')->paginate(20);
        $latest_blog_post = PostModel::where(['post_type'=>'5','status'=>'1'])->orderBy('id', 'desc')->first();
        $blogs = PostModel::where(['post_type'=>'5','status'=>'1'])->orderBy('id', 'desc')->paginate(12);

        $post_id = $data->id;
        $downloads = PostDocModel::where('post_id', $post_id)->get();
        $faq = PostModel::where(['post_parent'=>'71','status'=>'1'])->paginate(20);

        $country = CountryModel::all();
        $activities = ActivityModel::all();
        $trips = TripModel::where('status','1')->get();

        $trip_review = TripReview::where('status', 1)->orderBy('id', 'desc')->paginate(12);
        $team = TeamCategory::first();
        $team_cat = TeamCategory::where('team_parent','0')->get();
        $message = TeamModel::where('id', '1')->first();
        $mountains = $message->mountains()->orderBy('ordering', 'asc')->get();
        $achievements = $message->achievements()->orderBy('ordering', 'asc')->get();
        $certificates = $message->certificates()->orderBy('ordering', 'asc')->get();

        $first_team = TeamModel::where(['category' => $team->id, 'status' => '1'])->orderBy('ordering', 'asc')->get();
        $postimage = PostImageModel::where('post_id',$data->id)->get();
         $trek = TripModel::where(['trip_type'=>'1','status'=>'1'])->get();
        $exp = ExpeditionModel::all();

        return view('themes.default.' . $data['template'] . '', compact('data', 'blogs', 'latest_blog_post', 'trip_review', 'data_child', 'latest_posts', 
        'downloads', 'faq', 'activities', 'trips', 'country', 'team', 'team_cat', 'first_team', 'message', 'mountains', 'achievements', 'certificates','postimage','trek','exp'));
    }

    public function posttype_detail($uri)
    {

        $data['template'] = 'single';

        $data = PostTypeModel::where('uri', $uri)->first();

        if ($data['template']) {
            $data['template'] = $data['template'];
        }
        $team = TeamCategory::first();

        $first_team = TeamModel::where(['category' => 1, 'status' => '1'])->orderBy('ordering', 'asc')->get();
         $country = CountryModel::all();
        return view('themes.default.' . $data['template'] . '', compact('data', 'first_team', 'team','country'));
    }

    public function pagedetail_child($parenturi, $uri)
    {
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        $tmpl['template'] = 'single';
        if ($tmpl['template']) {
            $data['template'] = $data['template'];
        }
        $data_child = PostModel::where('id', $data['post_parent'])->first();
        if ($data_child) {

            $data['template'] = $data_child['template_child'];
        }
        $associated_posts = array();
        if ($data) {
            $associated_posts = AssociatedPostModel::where('post_id', $data['id'])->get();
        }
        $post_id = $data->id;
        $downloads = PostDocModel::where('post_id', $post_id)->get();

        return view('themes.default.' . $data['template'] . '', compact('data', 'data_child', 'associated_posts', 'downloads'));
    }

    public function apply($parenturi, $uri)
    {
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        if ($data) {
            return view('themes.default.apply', compact('data'));
        }
    }

    public function navigation($uri)
    {
        $getId = PostModel::where(['uri' => $uri])->first();
        $childCount = PostModel::where(['post_parent' => $getId->id])->count();
        if ($childCount > 0) {
            $parent_post = PostModel::where('uri', $uri)->first();
            $post = PostModel::where(['post_parent' => intval($getId->id)])->orderBy('post_order', 'asc')->paginate(15);
            $template = $parent_post->template;
        } else {
            $parent_post = PostModel::where('uri', $uri)->first();
            $post = PostModel::where('uri', $uri)->first();
            $template = $post->template;
            $news_updates = PostModel::where(['post_type' => 9])->orderBy('post_order', 'asc')->paginate(15);
        }
        $bod = PostModel::where(['post_type' => 12])->get();
        return view('themes.default.' . $template . '', compact('post', 'bod', 'parent_post', 'news_updates'));
    }

    public function category_navigation($uri)
    {
        $post_category = PostCategoryModel::where('uri', trim($uri))->first();
        if ($post_category) {
            $data = PostModel::where(['post_category' => $post_category->id])->orderBy('post_order', 'asc')->paginate(15);
        }
        return view('themes.default.postbycategory', compact('data', 'post_category'));
    }

    /***********************************
     ******** Root Navigation ***********
     ************************************/

    public function photo_gallery($cat_id)
    {
        $data = ImageGalleryModel::where(['category_id' => $cat_id])->get();
        return view('themes.default.photo_gallery_thumbnail', compact('data'));
    }

    public function sendmail()
    {
        $data = SettingModel::where('id', 1)->first();
        Mail::to($data->email_secondary)->send(new SendMail());
        return redirect()->back()->with('message', 'Contact message successfully sent.');
    }

    public function sendmail_contact(Request $request)
    {
        $method = $request->method();
        if ($request->isMethod('post')) {
            $data = SettingModel::where('id', 1)->first();
            Mail::to($data['email_secondary'])->send(new SendMailContact());
        }
        return redirect()->back()->with('message', 'Contact message successfully sent.');
    }

    public function career_navigation(Request $request)
    {
        $data['career_title'] = $request->input('post_title');
        return view('themes.default.apply', $data);
    }

    public function career_apply()
    {
        $data['career_title'] = request()->segment(3);
        return view('themes.default.apply', $data);
    }

    public function career_apply_action()
    {
        $data = SettingModel::where('id', 1)->first();
        Mail::to($data->email_secondary)->send(new CareerApply());
        return redirect()->back()->with('message', 'Successfully Applied.');
    }

    public function postby_category($id)
    {
        $post_category = PostCategoryModel::where(['id' => $id])->first();
        $data = PostModel::where(['post_category' => $id])->paginate(20);
        if ($data) {
            return view('themes.default.postbycategory', compact('data', 'post_category'));
        }
        return false;
    }

    public function postby_parent($id)
    {
        $childCount = PostModel::where(['post_parent' => $id])->count();
        if ($childCount > 0) {
            $parent_post = PostModel::where('post_parent', $id)->first();
            $post = PostModel::where(['post_parent' => intval($id)])->orderBy('post_order', 'asc')->paginate(15);
            return view('themes.default.template-project-list', compact('post', 'parent_post'));
        }
        return false;
    }

    public function tripdetail($uri)
    {
        $data = TripModel::where('uri', $uri)->where('status','1')->orWhere('trip_code', $uri)->first();
        if ($data->id) {
            $itinerary_cat = $data->categories;
            $default_iti=TripItineraryCategoryModel::where('trip_id',$data->id)->first();
            $cat_id=$itinerary_cat->pluck('id')->toArray();
            $itinerary_cat_latest = TripItineraryCategoryModel::orderBy('ordering', 'desc')->first();         
            $default_trip = ItineraryCategory::where('trip_id',$data->id)->where('default','1')->first();
            $notdefault_trip = ItineraryCategory::where('trip_id',$data->id)->where('default','0')->first(); 
            if($data->categories->isNotEmpty() &&  $default_iti != NULL){
            $itinerary =  $default_trip ? $default_trip->itineraries : $notdefault_trip->itineraries; 
            $cost_includes = $default_trip ? $default_trip->cost_includes : $notdefault_trip->cost_includes;
            $cost_excludes = $default_trip ? $default_trip->cost_excludes : $notdefault_trip->cost_excludes;   
            }else{
            $itinerary =  NULL; 
            $cost_includes = NULL;
            $cost_excludes = NULL; 
            }
                   
            $fixed_dates = TripScheduleModel::where('trip_detail_id', $data->id)->get();     
           
            $photo_videos = TripGearModel::where('trip_detail_id', $data->id)->orderBy('ordering', 'asc')->get();
            $photos = TripGearModel::where('trip_detail_id', $data->id)->where('thumbnail','!=','NULL')->orderBy('ordering', 'asc')->get();
            $videos = TripGearModel::where('trip_detail_id', $data->id)->where('video','!=','NULL')->orderBy('ordering', 'asc')->get();
            $rating = RatingModel::get();
            $routecamps = RouteCampModel::where('trip_detail_id', $data->id)->get();
            $trip_review = TripReview::where('trip_id', $data->id)->where('status', 1)->where('rating', '>=', 4)->take(2)->get();
            $trip_docs = TripDocModel::where('trip_id', $data->id)->take(6)->get();
            $faqs = FaqModel::where('trip_detail_id', $data->id)->get();
            $highlights = $data->highlights()->orderBy('ordering', 'asc')->get();

            $visiter = $data->visiter + 1;
            $data->visiter = $visiter;
            $data->save();
        }
        $activity = TripModel::find($data->id)->activities()->get();
        $first_team = TeamModel::where(['category' => 1, 'status' => '1'])->orderBy('ordering', 'asc')->get();
        $country = CountryModel::all();
        $video_cat1 = VideoGalleryCategoryModel::where('id','1')->first();
        $video_cat2 = VideoGalleryCategoryModel::where('id','2')->first();
        $travelguide1 = VideoGalleryCategoryModel::where('id','6')->first();
        $travelguide2 = VideoGalleryCategoryModel::where('id','7')->first();
        $tripinsurance1 = VideoGalleryCategoryModel::where('id','8')->first();
        $tripinsurance2 = VideoGalleryCategoryModel::where('id','9')->first();
        $application1 = VideoGalleryCategoryModel::where('id','10')->first();
        $application2 = VideoGalleryCategoryModel::where('id','11')->first();
        return view('themes.default.tripdetail', compact('data', 'rating', 'trip_docs', 'routecamps', 'trip_review',
            'cost_includes', 'cost_excludes', 'itinerary', 'itinerary_cat', 'fixed_dates',
            'photo_videos', 'activity', 'faqs', 'highlights','first_team','default_trip','country','video_cat1','video_cat2','travelguide1','travelguide2','tripinsurance1',
            'tripinsurance2','application1','application2','photos','videos'));
    }

    public function travellist($uri)
    {
        $data = ActivityModel::where('uri', $uri)->first();
        $template = $data->template;
        $trips = ActivityModel::find($data->id)->trips()->get();
        return view('themes.default.' . $template, compact('data', 'trips'));
    }

    public function regionlist($uri)
    {
        $data = RegionModel::where('uri', $uri)->first();
        $template = $data->template;
        $trips = RegionModel::find($data->id)->trips()->get();
        $blogLength = Str::length($data->content);
        // return view('themes.default.' . $template, compact('data', 'trips'));
        return view('themes.default.template-triplist', compact('data', 'trips','blogLength'));
    }

    public function expeditionlist($uri)
    {
        $data = ExpeditionModel::where('uri', $uri)->first();
        $facts = Geography::where('expedition', $data->title)->get();
        $expeditions = ExpeditionModel::where('id', '<>', $data->id)->get();
        $template = 'expeditionList';
        $trips = ExpeditionModel::find($data->id)->trips()->where('status','1')->orderBy('ordering','asc')->get();
        $expeditionGroup = TripGroupModel::where(['expedition'=> $data->id,'status'=>'1'])->orderBy('ordering', 'asc')->get();
        return view('themes.default.' . $template, compact('data', 'trips', 'facts', 'expeditionGroup', 'expeditions'));
    }

    public function newsdetail($uri)
    {
        $data = PostModel::where('uri', $uri)->first();
        $template = 'newsdetail';
        return view('themes.default.' . $template, compact('data'));
    }

    public function categorydetail($uri)
    {
        $category = PostCategoryModel::where('uri', $uri)->first();
        $data = PostModel::where(['post_category' => $category->id])->paginate(20);
        return view('themes.default.postcategory', compact('data'));
    }

    public function book_step2(Request $request)
    {
        $country = CountryModel::all();
        return view('themes.default.bookonline_step2', compact('request', 'country'));
    }

    public function booking_complete(Request $request)
    {
        $trip = $request->trip;
        $data = SettingModel::where('id', 1)->first();
        Mail::to($data->email_secondary)->send(new BookingComplete());
        return view('themes.default.application-success', compact('trip'));
    }

    public function newslist(Request $request)
    {
        $data = PostModel::where('post_type', 19)->paginate(20);
        return view('themes.default.newslist', compact('data'));
    }

    public function tripbooking(Request $request, $uri, $value1, $value2)
    {
        if ($request->isMethod('get')) {
            $arrival = $value1;
            $departure = $value2;
            $country = CountryModel::all();
            $data = TripModel::where('uri', $uri)->where('status','1')->first();
            return view('themes.default.booking', compact('arrival', 'departure', 'data', 'country'));
        }
    }

    public function random_tripbooking(Request $request, $uri)
    {
        if ($request->isMethod('get')) {
            $country = CountryModel::all();
            $data = TripModel::where('uri', $uri)->where('status','1')->first();
            return view('themes.default.booking_page2', compact('data', 'country'));
        }
    }

    public function all_tripbooking(Request $request)
    {
       
        $trip = TripModel::where('status','1')->get();
        $exp = ExpeditionModel::all();
         $country = CountryModel::all();
        return view('themes.default.template-booking', compact('trip', 'exp','country'));
    }
//testing pass//

    public function post_tripbooking(Request $request)
    {
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $result = $this->getCaptcha($g_recaptcha_response);
        if($result->success == true && $result->score > 0.5){
        if ($request->isMethod('post')) {
            $request->validate([
                'full_name' => 'required|string',
                'email' => 'required|email',
                'country' => 'required|string',
                // 'captcha' => 'required|captcha'
            ]);
            $form = \Illuminate\Support\Facades\Request::input();
          
            $create = TripBooking::create($form);
            if ($create) {
                Mail::send(new AdminBookingMail($request->email));
                Mail::send(new BookTrip($request->email));
                $name = $request->full_name;

                return view('themes.default.booking-success', compact('name'));
            }
        }
        return true;
      
        } 
        else{
             return redirect()->back()->with('error', 'You are a Robot!');
        }
    }
//test pass//
    public function post_allbooking(Request $request)
    {
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $result = $this->getCaptcha($g_recaptcha_response);
        if($result->success == true && $result->score > 0.5){
        if ($request->isMethod('post')) {
            $request->validate([
                'full_name' => 'required|string',
                'email' => 'required|email',
                'country' => 'required|string',
                // 'captcha' => 'required|captcha'
            ]);
            $form = \Illuminate\Support\Facades\Request::input();
            $create = TripBooking::create($form);
            if ($create) {
                Mail::send(new AdminBookingMail($request->email));
                Mail::send(new BookTrip($request->email));
                $name = $request->full_name;

                return view('themes.default.booking-success', compact('name'));


            }
        }
        return true;
        }
        else{
             return redirect()->back()->with('error', 'You are a Robot!');
        }
    }

    public function post_inquiry(Request $request)
    {
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $result = $this->getCaptcha($g_recaptcha_response);
        if($result->success == true && $result->score > 0.5){
        if ($request->isMethod('post')) {
            
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'country' => 'required|string',
            ]);
            $post = new TripInquiry();
            $post->name = $request->name;
            $post->email = $request->email;
            $post->country = $request->country;
            $post->number = $request->number;
            $post->review = $request->message;
            $post->trip_id = $request->trip_id;
            $post->type = $request->type;
            if ($post->save()) {
                Mail::send(new \App\Mail\TripInquiry($request->email));
                Mail::send(new \App\Mail\AdminInquiryMail($request->email));
                 $name = $request->name;
                return view('themes.default.inquiry-success', compact('name'));
            }

        }
        }
        else{
             return redirect()->back()->with('error', 'You are a Robot!');
        }

    }

 
    public function tripbooking_action(Request $request, $uri)
    {
        $trip = $request->trip;
        $data = SettingModel::where('id', 1)->first();
        Mail::to($data->email_secondary)->send(new TripBooking());
        return view('themes.default.application-success', compact('data', 'trip'));
    }

    public function client_reviews()
    {
        $data = PostModel::where('post_type', 20)->orderBy('id', 'desc')->paginate(20);
        return view('themes.default.client_reviews', compact('data'));
    }

    public function customize_trip(Request $request)
    {

        $country = CountryModel::all();
        $method = $request->method();
        if ($request->isMethod('post')) {
            $data = SettingModel::where('id', 1)->first();
            Mail::to($data['email_secondary'])->send(new TripBooking1());
        }
        return redirect()->back()->with('message', 'Booking Successful.');
    }

    public function customizetrip(Request $request)
    {
        $country = CountryModel::all();
        $data = SettingModel::where('id', 1)->first();
        $trips = ActivityModel::find($request->activity)->trips()->first();
        return view('themes.default.customizetrip-individually', compact('data', 'country', 'trips'));
    }

    public function customizetrip_action(Request $request)
    {
        $country = CountryModel::all();
        $data = SettingModel::where('id', 1)->first();
        $trips = ActivityModel::find($request->activity)->trips()->first();
        $trip = $trips->trip_title;
        $method = $request->method();
        if ($request->isMethod('post')) {
            $data = SettingModel::where('id', 1)->first();
            Mail::to($data->email_secondary)->send(new TripBooking1());
        }
        return view('themes.default.application-success', compact('data', 'country', 'trip'));
    }

    public function customize_trip2(Request $request)
    {
        $country = CountryModel::all();
        $method = $request->method();
        if ($request->isMethod('post')) {
            $data = SettingModel::where('id', 1)->first();
            Mail::to($data->email_secondary)->send(new TripBooking2());
            return redirect()->back()->with('message', 'Booking Successful.');
        }
        return redirect()->back()->with('message', 'Booking Successful.');
    }

    public function content_search(Request $request)
    {
        if ($request->has('content_search')) {
            $content_search = $request->content_search;
            $data = TripModel::where('status','1')->where('trip_title', 'like', '%' . trim($content_search) . '%')->orWhere('trip_content', 'like', '%' . trim($content_search) . '%')->paginate(20);
            return view('themes.default.search', compact('data'));
        }
    }

    public function posttype_page($posttype_uri)
    {
        $posttype = PostTypeModel::where('uri', $posttype_uri)->first();
        $data = PostModel::where(['post_type' => intval($posttype->id), 'post_parent' => 0])->get();
        return view('themes.default.' . $posttype->template . '', compact('data'));
    }

    public function destinations($id = 0)
    {
        $data = DestinationModel::all();
        if ($id) {
            $trips = DestinationModel::find($id)->trips()->paginate(20);
            $data = DestinationModel::where('id', $id)->first();
            return view('themes.default.destination-triplist', compact('data', 'trips'));
        } else {
            return view('themes.default.destinations', compact('data'));
        }

    }

    public function trekkings()
    {
        $data = RegionModel::all();
        return view('themes.default.trekkings', compact('data'));
    }

    public function activities($uri)
    {
        $data = ActivityGroupModel::where('uri', Str::slug($uri))->first();
        $activities = ActivityGroupModel::find(intval($data->id))->activities()->get();
        return view('themes.default.activities', compact('data', 'activities'));
    }

    public function submitinquiry()
    {
        return view('themes.default.inquiry');
    }

    public function weather_report($uri)
    {
        $data = WeatherReportModel::where(['weather_report_uri' => $uri])->first();
        $trip = TripModel::where('id',$data->trip_detail_id)->first();
        if ($data) {
            return view('themes.default.weather-report', compact('data','trip'));
        }
        return false;
    }

    public function faq($uri)
    {
        $trip = TripModel::where(['uri' => $uri])->first();
        $alltrips = TripModel::where('status','1')->get();
        $data = FaqModel::where('trip_detail_id', $trip->id)->get();
        if ($data) {
            return view('themes.default.faq', compact('data', 'trip', 'alltrips'));
        }
        return false;

    }

    public function trip_itinerary(Request $request)
    {
        // dd($request->all());
        $data = TripItineraryCategoryModel::where('category',$request->trip_category)->get();
          $cost_inc=TestimonialModel::where(["category" => $request->trip_category, 'trip_id' => $request->trip_id])->get();
        $cost_exc=TripInfoModel::where(["category" => $request->trip_category, 'trip_id' => $request->trip_id])->get();
        if ($data) {
            return response()->json($data);
        }
        return false;
    }

    public function trip_videos($uri)
    {
        $trip = TripModel::where('uri', $uri)->where('status','1')->first();
        $trip_videos = VideoGalleryModel::where('trip_type', $trip->trip_type)->paginate(30);
        $video_cat1 = VideoGalleryCategoryModel::where('id','1')->first();
        $video_cat2 = VideoGalleryCategoryModel::where('id','2')->first();
        // return $trip;
        if ($trip_videos) {
            return view('themes.default.trip-videos', compact('trip_videos', 'trip','video_cat1','video_cat2'));
        }
        return false;
    }

    public function faq_search(Request $request)
    {
        $data = FaqModel::where(['trip_detail_id' => $request->trip_id])->get();
        if ($data) {
            return response()->json($data);
        }
        return false;
    }

    public function trip_itinerary_default(Request $request)
    {
        $itinerary_cat = ItineraryCategory::orderBy('id', 'asc')->first();
        $trip_detail_id = $request->trip_id;
        // $data = DB::table('cl_trip_itinerary_rel')->where(['trip_id' => $trip_detail_id, 'category_id' => $itinerary_cat->id])->get();
        $data=$itinerary_cat->itineraries;
        if ($data) {
            return response()->json($data);
        }
        return false;
    }

    public function trip_search(Request $request)
    {

        if ($request->isMethod('post')) {

            $trip = $request->input('search');
            $data = TripModel::where('trip_title', 'Like', '%' . trim($trip) . '%')->orWhere('trip_content', 'Like', '%' . trim($trip) . '%')->paginate(10);

            return view('themes.default.search-result', compact('data'));

        } else {

            $trip = $request->input('search');
            $data = TripModel::where('trip_title', 'Like', '%' . trim($trip) . '%')->orWhere('trip_content', 'Like', '%' . trim($trip) . '%')->paginate(10);
            return view('themes.default.search-result', compact('data'));

        }
    }

    public function teamlist($uri)
    {
        $team = TeamCategory::where(['uri' => $uri])->first(); 
        $team_cat = TeamCategory::where('team_parent','0')->get();
        $category2 = TeamCategory::where('team_parent','4')->orderBy('ordering', 'asc')->get();
        $first_team = TeamModel::where(['category' => $team->id, 'status' => '1'])->orderBy('ordering', 'asc')->get();

        if ($team->id == '1') {
            return view('themes.default.template-team', compact('team', 'team_cat', 'first_team'));
        } elseif ($team->id == '2') {
            return view('themes.default.team-international', compact('team', 'team_cat', 'first_team'));
        } else {
            return view('themes.default.team-staffs', compact('team', 'team_cat', 'first_team','category2'));
        }
    }

    public function teamdetail($parenturi, $uri)
    {
        $parent = TeamCategory::where('uri',$parenturi)->first();
        $data = TeamModel::where(['uri'=> $uri,'category'=>$parent->id])->orWhere('team_key', $uri)->first();
        $mountains = $data->mountains()->orderBy('ordering', 'asc')->get();
        $achievements = $data->achievements()->orderBy('ordering', 'asc')->get();
        $certificates = $data->certificates()->orderBy('ordering','asc')->get();

        return view('themes.default.team-single', compact('data', 'mountains', 'achievements', 'certificates'));
    }

    public function usefulInfo($uri)
    {

        $pages = PageTypeModel::where(['uri' => $uri])->first();
        $data = PageModel::where(['page_type' => $pages->id, 'status' => '1'])->orderBy('page_order', 'asc')->get();
        
        return view('themes.default.usefulinfo', compact('data', 'pages'));
    }

    public function usefulInfoDetails($parenturi, $uri)
    {
        $data = PageModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
         $doc = PageDocModel::where('page_id',$data->id)->get();
        $detail=PageDetails::where('page_id',$data->id)->orderBy('id','asc')->get();
        $sorted=$detail->collect();
        $details = $sorted->sortBy('ordering');
        $links = PageTypeModel::where(['is_menu' => '1'])->orderBy('ordering', 'asc')->get();

        return view('themes.default.usefulinfo-detail', compact('data', 'details', 'links','doc'));
    }


    public function subscribe(Request $request)
    {
        // dd($request->all());
         if ($request->ajax()) {
             
              $validator = Validator::make($request->all(), [
                    'email' => 'required|email|unique:subscribers,email',
                    'name'=>'required'
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 'error',
                        'errors' => $validator->errors()->all()
                    ]);
                }
            
        $check=Subscriber::where('email',$request->email)->first();
              
        $user = Subscriber::create([
            'email' => $request->email,
            'name'=>$request->name,
            'verified' => 0,
            ]);
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => Str::random(20)
        ]);
     if ($user && $verifyUser) {
            // return new VerifyMail($verifyUser->token, $user->id, $user->name);
        $view = view("themes.default.subscriber_success")->render();
        Mail::send(new VerifyMail($verifyUser->token, $user->id, $user->name));
        return response()->json(['status' => 'success', 'message' => 'You are subscribed. Please check your mail to verify subscription.','html'=>$view]);
        }
     }

        // $request->validate([
        //     'email' => 'required|email|unique:subscribers,email'
        // ]);
        // $check=Subscriber::where('email',$request->email)->first();
        // dd($check);
        // if ($check->verified==1)
        // {
        //     return back()->with('error', 'You have already subscribed');

        // }

        // $user = Subscriber::create([
        //     'email' => $request->email,
        //     'verified' => 0,
        // ]);
        // $verifyUser = VerifyUser::create([
        //     'user_id' => $user->id,
        //     'token' => Str::random(20)
        // ]);

        // if ($user && $verifyUser) {
        //     // return new VerifyMail($verifyUser->token, $user->id, $user->name);
        //     Mail::send(new VerifyMail($verifyUser->token, $user->id, $user->name));

        // }

        // Session::flash('success', 'Please verify your email to complete registration process');
        // return redirect()->back();
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->users;
            if (!$user->verified) {
                $verifyUser->users->verified = 1;
                $verifyUser->users->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect()->intended(url('/'))->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect()->intended(url('/'))->with('success', $status);
    }

    public function contact_us(Request $request)
    {
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $result = $this->getCaptcha($g_recaptcha_response);
        if($result->success == true && $result->score > 0.5){
        $request->validate([
            'first_name' => 'required|string',
            'email' => 'required|email',
             'country' => 'required|string',
        ]);
        if ($request->isMethod('post')) {
            if ($request->subscribe == null) {
                $create = Contact::create([
                   'first_name' => $request->first_name,
                    'email' => $request->email,
                    'surname' => $request->surname,
                    'number' => $request->number,
                    'interest' => $request->interest,
                    'country' => $request->country,
                    'experience' => $request->experience,
                    'message' => $request->message,
                    'subscribed' => $request->subscribe
                    
                ]);
                    Mail::send(new \App\Mail\AdminContactMail($request->email));
                    Mail::send(new \App\Mail\Contact($request->email));
  
                  $name = $request->first_name;

                return view('themes.default.inquiry-success', compact('name'));
            } elseif ($request->subscribe) {
                $check = Subscriber::where('email', $request->email)->first();
                if ($check != null) {
                     $create = Contact::create([
                    'first_name' => $request->first_name,
                    'email' => $request->email,
                    'surname' => $request->surname,
                    'number' => $request->number,
                    'interest' => $request->interest,
                    'country' => $request->country,
                    'experience' => $request->experience,
                    'message' => $request->message,
                    'subscribed' => $request->subscribe
                ]);
                    return back()->with('message', 'Form Submitted. But You have already subscribed');
                }
                $user = Contact::create([
                    'first_name' => $request->first_name,
                    'email' => $request->email,
                    'surname' => $request->surname,
                    'number' => $request->number,
                    'interest' => $request->interest,
                    'country' => $request->country,
                    'experience' => $request->experience,
                    'message' => $request->message,
                    'subscribed' => $request->subscribe
                ]);
                $subcribe = Subscriber::create([
                    'email' => $request->email,
                ]);
                $verifysub = VerifyUser::create([
                    'user_id' => $subcribe->id,
                    'token' => Str::random(20)
                ]);
                $verifyUser = VerifyContact::create([
                    'user_id' => $user->id,
                    'token' => Str::random(20)
                ]);
                if ($user && $verifyUser) {
                    Mail::send(new VerifyMail($verifysub->token, $verifysub->id, $verifysub->name));
                }
                    Mail::send(new \App\Mail\AdminContactMail($request->email));
               
                $name = $request->first_name;

                return view('themes.default.inquiry-success', compact('name'));

            } else {
                return back()->with('error', 'Please Try Again');
            }
        }
//        }
        return true;
        }
         else{
             return redirect()->back()->with('error', 'You are a Robot!');
        }

    }

    private function getCaptcha($secretKey)
    {
        $secret_key = env('SECRET_KEY');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response={$secretKey}");
        $result = json_decode($response);
        return $result;
    }

    public function verifyContact($token)
    {
        $verifyUser = VerifyContact::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->users;
            if (!$user->verified) {
                $verifyUser->users->verified = 1;
                $verifyUser->users->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect()->intended(url('/'))->with('error', "Sorry your email cannot be identified.");
        }

        return redirect()->intended(url('/'))->with('message', $status);
    }

  public function trip_cost_inc(Request $request)
    {       
      $cost_includes=TestimonialModel::where(["category" => $request->trip_category, 'trip_id' => $request->trip_id])->get();
      $cost_excludes=TripInfoModel::where(["category" => $request->trip_category, 'trip_id' => $request->trip_id])->get();
      $data['cost_inc']=$cost_includes;
      $data['cost_exc']=$cost_excludes;
      $data['itinerary_cat'] = TripModel::where('id',$request->trip_id)->first()->categories;
      $data['itinerary'] =  TripItineraryCategoryModel::where(["category" => $request->trip_category, 'trip_id' => $request->trip_id])->get();
      $data['trip'] = TripModel::where('id',$request->trip_id)->first();
       return view('themes.default.Itinerary_filter',compact('data'));
    }
    
     public function unsubscribe(Request $request)
    {
       if($request->isMethod('get'))
       {
        return view('themes.default.unsubscribe');
       }
       if($request->isMethod('post'))
       {
        // dd($request->email);
          $request->validate([
               'email' => 'required|exists:subscribers,email',
          ]);
            $mail=$request->email;
            $check=Subscriber::where('email',$mail)->first();
            // dd($check);
            $data=VerifyUser::where('user_id',$check->id)->first();
            if($check)
            {
                $data->delete();
                $check->delete();
                return back()->with('success','You have unsubscribed successfully');
            }
       }
    }
    
        // payment functions
     public function paymentBooking(Request $request){
        Session::put('back_url', $request->fullUrl());
        $trips = TripModel::all();
        $terms = PostModel::where('id','34')->first();
         $country = CountryModel::all();
        return view('themes.default.paynow-booking', ['trips'=>$trips,'terms'=>$terms,'country'=>$country]);
    }
     
    public function savePaynowBook(Request $request){
        if ($request->isMethod('post')) {
            $request->validate([
                // 'title' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',    
            ]);
            
            $form = \Illuminate\Support\Facades\Request::input();
            if($request->terms_conditions){
                $create = BookingModel::create($form);
                if ($create) {
                    return redirect()->route('page.bookingsuccess')->with('success', 'Booking completed successfully');
            }
            }else{
                return back()->with('message', 'Please agree to the terms and conditions.');
            }    
        }
    }
}
