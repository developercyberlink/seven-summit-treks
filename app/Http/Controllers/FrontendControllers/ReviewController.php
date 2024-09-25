<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Model\Review;
use App\Model\TripReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail;

class ReviewController extends Controller
{
      public function add_review(Request $request)
    {
       
            if ($request->ajax()) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|max: 255',
                    'email' => 'required|email|max: 255',
                    'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',

//                'g-recaptcha-response' => 'required|recaptcha,0.5'
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 'error',
                        'errors' => $validator->errors()->all()
                    ]);
                }
                // $g_recaptcha_response = $request->input('g_recaptcha_response');
                // $result = $this->getCaptcha($g_recaptcha_response);
                // // Check if success is true and Score is greater than 0.5 [ $result->score > 0.5 ]
                // if($result->success == true && $result->score > 0.5) {
                // $old_review = TripReview::where('trip_id', $request->trip_id)->where('email', $request->email)->first();
                // if ($old_review != null) {
                //     return response()->json(['status' => 'error', 'message' => 'You have already reviewed this trip']);

                // }

                    $review = new TripReview();
                    $review->name = $request->name;
                    $review->email = $request->email;
                    $review->rating = $request->star;
                    $review->review = $request->review;
                    $review->trip_id = $request->trip_id ? $request->trip_id : NULL;
                    $review->video_url = $request->video_url;
                    if ($request->hasFile('photo')) {
                        $image = $request->file('photo');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/reviews/');
                        $image->move($destinationPath, $name);
                        $review['image'] = $name;
                    }
                    $review->save();
                 Mail::send(new \App\Mail\AdminReviewMail($request->email));
                return response()->json(['status' => 'success', 'message' => 'Review added successfully']);
            }
                // else{
                //     return back()->with('status', 'You are Robot!');
                // }
        }


    private function getCaptcha($secretKey){
        $secret_key = env('SECRET_KEY');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response={$secretKey}");
        $result = json_decode($response);
        return $result;
    }
}
