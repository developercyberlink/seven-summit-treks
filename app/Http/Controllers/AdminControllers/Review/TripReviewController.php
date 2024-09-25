<?php

namespace App\Http\Controllers\AdminControllers\Review;

use App\Http\Controllers\Controller;
use App\Model\TripReview;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TripReviewController extends Controller
{
   public function trip_review(Request  $request)
   {
       $review=TripReview::orderby('id','desc')->get();
       $trip=TripModel::all();
       return view('admin.trip-reviews.index',compact('review','trip'));
   }

   public function post_trip_review(Request $request)
   {
       if ($request->isMethod('get'))
       {
           $trip=TripModel::all();
           return view('admin.trip-reviews.create',compact('trip'));
       }
       if ($request->isMethod('post'))
       {
           $request->validate([
               'name'=>'required',
               'email'=>'required',
            //   'video_url'=>'required',
               'review'=>'required',
           ]);
           if ($request->hasFile('photo')) {
               $image = $request->file('photo');
               $name = time() . '.' . $image->getClientOriginalExtension();
               $destinationPath = public_path('/images/reviews/');
               $image->move($destinationPath, $name);
               $data['image'] = $name;
           }
           $data['name'] = $request->name;
           $data['trip_id'] = $request->trip_id;
           $data['email'] = $request->email;
           $data['video_url'] = $request->video_url;
           $data['rating'] = $request->rating;
           $data['country'] = $request->country;
           $data['review']=$request->review;
           $create=TripReview::create($data);

           return redirect()->back()->with('success','Review posted successfully');
       }
   }

    public function delete_file($id)
    {
        $findData = TripReview::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/reviews/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function edit_trip_review(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $id=$request->id;
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                // 'video_url'=>'required',
                'review'=>'required',
            ]);
            $data['name'] = $request->name;
            $data['trip_id'] = $request->trip_id;
            $data['email'] = $request->email;
            $data['video_url'] = $request->video_url;
            $data['rating'] = $request->rating;
            $data['country'] = $request->country;
            $data['review']=$request->review;

            if ($request->hasFile('photo')) {
                $this->delete_file($id);
                $image = $request->file('photo');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/reviews/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $edit=TripReview::findorfail($id);
            if ($edit->update($data))
            {
                return redirect()->back()->with('success','Trip review updated successfully');
            }
        }
    }

    public function delete_trip_review(Request $request)
    {
        $id=$request->id;
        $del=TripReview::findorfail($id);
        if($this->delete_file($id)&&$del->delete())
        {
            return redirect()->back()->with('success','Review deleted  successfully');
        }
    }

    public function review_status(Request $request)
    {
        $id = $request->status;

        $deal = TripReview::findorfail($id);

        if (isset($_POST['active'])) {
            $deal->status = 0;
        }
        if (isset($_POST['inactive'])) {
            $deal->status = 1;
        }
        $save = $deal->update();
        if ($save) {
            Session::flash('success', 'Status updated');
            return redirect()->back();
        }
    }

}
