<?php

namespace App\Http\Controllers\AdminControllers\TravelGuide;

use App\Http\Controllers\Controller;
use App\Mail\TripBooking2;
use App\Model\GuideImage;
use App\Model\TravelGuide;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GuideController extends Controller
{

    public function index()
    {
        $guide=TravelGuide::where('category','guide')->get();
        $insurance=TravelGuide::where('category','insurance')->get();
        $payment=TravelGuide::where('category','payment')->get();
        return view('admin.travel-guide.index',compact('guide','insurance','payment'));
    }

    public function travel_guide(Request  $request)
    {
        if ($request->isMethod('get'))
        {
            $trip=TripModel::all();
            return view('admin.travel-guide.create',compact('trip'));
        }

        if ($request->ajax())
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()->all()
                ]);
            }
            $data['trip_id']=$request->trip_id;
            $data['category']=$request->category;
            $data['title']=$request->title;
            $data['description']=$request->description;
            $data['link']=$request->link;
            $result = TravelGuide::create($data);
            $last_id = $result->id;

            if($request->hasFile('gear_thumbnail')){
                $thumb_file =  $request->file('gear_thumbnail');
                $sn_gear = 1;
                foreach($request->file('gear_thumbnail') as $key=>$image)
                {
                    $tripGear = new GuideImage();
                    $tripGear->guide_id = $last_id;
                    $tripGear->ordering = $request->gear_ordering[$key];
                    // Thumbnail upload
                    $thumbnail_name = time() . '-' . Str::random(15) . $image->getClientOriginalName();
                    $destinationPath = public_path('uploads/travel-guide');
                    $image->move($destinationPath.'/', $thumbnail_name);
                    $tripGear->image = $thumbnail_name;
                    $tripGear->save();
                    $sn_gear++;
                }
            }
            return response()->json(['status' => 'success', 'message' => 'Travel Guide Added Successfully']);


        }

    }

    public function edit(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $find=TravelGuide::findorfail($request->id);
            $trip=TripModel::all();
            return view('admin.travel-guide.edit',compact('find','trip'));
        }

        if ($request->isMethod('post'))
        {
            if ($request->ajax())
            {
                $validator = Validator::make($request->all(), [
                    'title' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 'error',
                        'errors' => $validator->errors()->all()
                    ]);
                }
                $find=TravelGuide::findorfail($request->id);
                $data['trip_id']=$request->trip_id;
                $data['category']=$request->category;

                $data['title']=$request->title;
                $data['description']=$request->description;
                $data['link']=$request->link;
                $result = $find->update($data);


                if($request->hasFile('gear_thumbnail')){
                    $thumb_file =  $request->file('gear_thumbnail');
                    $sn_gear = 1;
                    foreach($request->file('gear_thumbnail') as $key=>$image)
                    {
                        $tripGear = new GuideImage();
                        $tripGear->guide_id = $find->id;
                        $tripGear->ordering = $request->gear_ordering[$key];
                        // Thumbnail upload
                        $thumbnail_name = time() . '-' . Str::random(15) . $image->getClientOriginalName();
                        $destinationPath = public_path('uploads/travel-guide');
                        $image->move($destinationPath.'/', $thumbnail_name);
                        $tripGear->image = $thumbnail_name;
                        $tripGear->save();
                        $sn_gear++;
                    }
                }
                return response()->json(['status' => 'success', 'message' => 'Travel Guide updated successfully']);


            }

        }




    }

    public function destroy($id)
    {
        $data = GuideImage::find($id);
        if($data->file_name){

            if(file_exists(public_path('uploads/travel-guide/' .  $data->file_name))){
                unlink('uploads/travel-guide/' . $data->file_name);
            }

        }
        $data->delete();
        return response()->json([
            'message' => 'Delete Successful!',
            'class_name' => 'alert-success'
        ]);
    }


    public function delete($id)
    {

        $product = TravelGuide::findorfail($id);
        foreach ($product->images as $image) {
            $filename = $image->image;
            $deletePath = public_path('uploads/travel-guide/' . $image);
            if (file_exists($deletePath) && is_file($deletePath)) {
                unlink($deletePath);
            }
            $image->delete();
        }
        $product->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

}
