<?php

namespace App\Http\Controllers;

use App\Model\Subscriber;
use App\Model\TripBooking;
use App\Model\TripReview;
use App\Model\VerifyUser;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Travels\BookingModel;
use App\Models\Travels\InquiryModel;
use Spatie\Analytics\Period;
use Analytics;
use Carbon\Carbon;
use App\Models\Inquiry\BookingModel as Booking;



class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
      public function index(Request $request)
    {
         return view('admin.dashboard');
    }

        
    public function _index(Request $request)
    {
//        dd( $request->userAgent());
        $top_inquery = InquiryModel::orderBy('id', 'desc')->limit(10)->get();
        $booking = TripBooking::orderby('updated_at', 'desc')->get();
        $review = TripReview::orderby('updated_at', 'desc')->get();
        $analytics = Analytics::fetchMostVisitedPages(Period::days(30));
//          dd($analytics);
        $users = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions',
                'dimensions' => 'ga:userType',
            ]
        );

        $country=Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions',
                'dimensions' => 'ga:country',
                'sort'=>'-ga:sessions',
            ]
        );

// Circle trough all 12 months
        $data = [];
        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::create(date('Y'), $month);

            $date_end = $date->copy()->endOfMonth();

            $report = TripBooking::orderBy('created_at', 'asc')
                ->where('created_at', '>=', $date)
                ->where('created_at', '<=', $date_end)
                ->count();

            $data[$month] = $report;
        }
//        dd($data);
        return view('admin.dashboard', compact('analytics','users','country','top_inquery', 'booking', 'review', 'data'));
    }


    public function subscribers(Request  $request)
    {
        $all=Subscriber::orderby('id','desc')->get();
//        $join=Subscriber::join('contacts','contacts.subscribed','=','1')->select('subscribers.*');
//        dd($join->get());
        return view('admin.subscriber.index',compact('all'));
    }

    public function subscriber_delete(Request $request)
    {
        $user_id=VerifyUser::where('user_id',$request->id)->delete();
        $del=Subscriber::findorfail($request->id);
        if($del->delete())
        {
            return redirect()->back()->with('success','Subscriber deleted  successfully');
        }
    }
    
    public function payment_index(Request $request)
    {
        $data=Booking::all();
        return view('admin.payment-index',compact('data'));
    }
    
    public function payment_delete(Request $request)
   {
       $del=Booking::findorfail($request->id);
        if($del->delete())
        {
            return redirect()->back()->with('success','Payment  deleted  successfully');
        }
     }

}
