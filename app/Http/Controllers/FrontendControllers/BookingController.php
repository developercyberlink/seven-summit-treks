<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\SettingModel;
use App\Models\Travels\BookingModel;
use App\Mail\SendInquiry;
use App\Models\Travels\TripModel;
use App\Models\Travels\ActivityModel;
use App\Models\Settings\CountryModel;
use Mail;

class BookingController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uri = request()->segment(2);
        $data = TripModel::where('uri',$uri)->first();
        $activity_id = $request->activity;
        $trip_id = $request->trip;
        $activities = ActivityModel::all();
        $trips = TripModel::all();
        $country = CountryModel::all();
        return view('themes.default.bookonline',compact('data','uri','country','activities','trips','activity_id','trip_id','activity_id'));
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
                'title'=>'required',
                'full_name'=>'required',
                'country'=>'required',
                'email'=>'required',
                'phone'=>'required'
            ]);

            $data = $request->all();
            $result = BookingModel::create($data);
            if($result){
                return redirect()->back()->with('message','Booking Successful.');
            }else{
                return redirect()->back()->with('message','Try Again!');
            }
                     
    }

        
}
