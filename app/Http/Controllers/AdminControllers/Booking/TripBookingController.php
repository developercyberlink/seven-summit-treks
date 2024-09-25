<?php

namespace App\Http\Controllers\AdminControllers\Booking;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use App\Model\TripBooking;
use App\Model\TripInquiry;
use App\Model\VerifyContact;
use Illuminate\Http\Request;

class TripBookingController extends Controller
{
 public function trip_booking(Request $request)
 {
     if ($request->isMethod('get'))
     {
         $book=TripBooking::orderby('id','desc')->get();
         return view('admin.trip-booking.index',compact('book'));

     }
 }

    public function trip_inquiry(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $book=TripInquiry::orderby('id','desc')->get();
            return view('admin.trip-inquiry.index',compact('book'));

        }
    }

    public function contact_us(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $book=Contact::orderby('id','desc')->get();
            return view('admin.contact.index',compact('book'));

        }
    }

    public function contact_delete(Request $request)
    {
        $del=Contact::findorfail($request->id);
        $verify_id=VerifyContact::where('user_id',$request->id)->first();
        // dd($verify_id);
        if($verify_id){
            $verify_id->delete();
           $del->delete();
             return redirect()->back()->with('success','Contact deleted  successfully');
        
        }
        else
        {
            $del->delete();
            return redirect()->back()->with('success','Contact deleted  successfully');
        }
    }

    public function trip_inquiry_delete(Request $request)
    {
        $del=TripInquiry::findorfail($request->id);
        if($del->delete())
        {
            return redirect()->back()->with('success','Inquiry deleted  successfully');
        }
    }

    public function trip_booking_delete(Request $request)
    {
        $del=TripBooking::findorfail($request->id);
        if($del->delete())
        {
            return redirect()->back()->with('success','Booking deleted  successfully');
        }
    }
}
