<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Model\TravelGuide;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;

class GuideController extends Controller
{
   public function travel_guide(Request $request)
   {
       $find=TripModel::where('uri',$request->uri)->first();
      
       $guide=TravelGuide::where('trip_id',$find->id)->where('category','guide')->get();

       return view('themes.default.travel_guide',compact('guide','find'));
   }

    public function trip_insurance(Request $request)
    {
        $find=TripModel::where('uri',$request->uri)->first();
        $guide=TravelGuide::where('trip_id',$find->id)->where('category','=','insurance')->get();

        return view('themes.default.trip_insurance',compact('guide','find'));
    }

    public function payments(Request $request)
    {
        $find=TripModel::where('uri',$request->uri)->first();
        $guide=TravelGuide::where('trip_id',$find->id)->where('category','=','payment')->get();
        return view('themes.default.application_process',compact('guide','find'));
    }



}
