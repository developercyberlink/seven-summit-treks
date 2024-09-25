<?php

namespace App\Http\Controllers\AdminControllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class SettingController extends Controller
{
    public function index()
    {
        $data = SettingModel::where('id', 1)->first();
        return view('admin.settings.setting', compact('data'));
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function edit(Request $request)
    {
        $data = SettingModel::where('id', 1)->first();
        return view('admin.settings.setting');
    }

     public function update(Request $request, $id){

      $medium_width = 168;
      $medium_height = 57;
      
      $original_width=1366;
      $original_height=216;
      
      $mobile_width=515;
      $mobile_height=297;

      $data = SettingModel::where('id',$id)->first();

      $file =  $request->file('logo');
      $logo_name = '';
      if($request->hasfile('logo')){
        $data = SettingModel::find($id);
        if($data->logo){
          if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->logo)){
            unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->logo);
          }
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->logo)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->logo);
          }
        }
        $logo = $request->file('logo')->getClientOriginalName();
        $extension = $request->file('logo')->getClientOriginalExtension();
        $logo = explode('.', $logo);
        $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

        $destinationPath_medium = public_path('uploads/medium');
        $destinationOriginal = public_path('uploads/original');

        $logo_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();

        $logo_picture->resize($medium_width, $medium_height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath_medium .'/'. $logo_name );

        /*Upload Original Image*/
        $logo_picture->save($destinationOriginal .'/'. $logo_name );

        $data->logo = $logo_name;
      }

         $file =  $request->file('banner_logo');
         $logo_name = '';
         if($request->hasfile('banner_logo')){
             $data = SettingModel::find($id);
             if($data->banner_logo){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->banner_logo)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->banner_logo);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->banner_logo)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->banner_logo);
                 }
             }
             $logo = $request->file('banner_logo')->getClientOriginalName();
             $extension = $request->file('banner_logo')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

            //  $logo_picture->resize($medium_width, $medium_height, function($constraint){
            //      $constraint->aspectRatio();
            //  })->save($destinationPath_medium .'/'. $logo_name );

             /*Upload Original Image*/
             $logo_picture->save($destinationOriginal .'/'. $logo_name );

             $data->banner_logo = $logo_name;
         }

         $file =  $request->file('mobile_logo');
         $logo_name = '';
         
         if($request->hasfile('mobile_logo')){
             $data = SettingModel::find($id);
             if($data->mobile_logo){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->mobile_logo)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->mobile_logo);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->mobile_logo)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->mobile_logo);
                 }
             }
             $logo = $request->file('mobile_logo')->getClientOriginalName();
             $extension = $request->file('mobile_logo')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

            //  $logo_picture->resize($medium_width, $medium_height, function($constraint){
            //      $constraint->aspectRatio();
            //  })->save($destinationPath_medium .'/'. $logo_name );

             /*Upload Original Image*/
             $logo_picture->save($destinationOriginal .'/'. $logo_name );

             $data->mobile_banner_logo = $logo_name;
         }
         
          $file =  $request->file('testimonial_img');
         $logo_name = '';
         
          if($request->hasfile('testimonial_img')){
             $data = SettingModel::find($id);
             if($data->testimonial_img){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->testimonial_img)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->testimonial_img);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->testimonial_img)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->testimonial_img);
                 }
             }
             $logo = $request->file('testimonial_img')->getClientOriginalName();
            
             $extension = $request->file('testimonial_img')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

            //  $logo_picture->resize($medium_width, $medium_height, function($constraint){
            //      $constraint->aspectRatio();
            //  })->save($destinationPath_medium .'/'. $logo_name );

             /*Upload Original Image*/
             $logo_picture->save($destinationOriginal .'/'. $logo_name );

             $data->testimonial_img = $logo_name;
         }
         
          $file =  $request->file('testimonial_img_sm');
         $logo_name = '';
         if($request->hasfile('testimonial_img_sm')){
             $data = SettingModel::find($id);
             if($data->testimonial_img_sm){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->testimonial_img_sm)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->testimonial_img_sm);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->testimonial_img_sm)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->testimonial_img_sm);
                 }
             }
             $logo = $request->file('testimonial_img_sm')->getClientOriginalName();
             $extension = $request->file('testimonial_img_sm')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

            //  $logo_picture->resize($medium_width, $medium_height, function($constraint){
            //      $constraint->aspectRatio();
            //  })->save($destinationPath_medium .'/'. $logo_name );

             /*Upload Original Image*/
             $logo_picture->save($destinationOriginal .'/'. $logo_name );

             $data->testimonial_img_sm = $logo_name;
         }
         
         $file =  $request->file('animation1');
         $logo_name = '';
         if($request->hasfile('animation1')){
             $data = SettingModel::find($id);
             if($data->animation1){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->animation1)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->animation1);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->animation1)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->animation1);
                 }
             }
             $logo = $request->file('animation1')->getClientOriginalName();
             $extension = $request->file('animation1')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

            //  $logo_picture->resize($medium_width, $medium_height, function($constraint){
            //      $constraint->aspectRatio();
            //  })->save($destinationPath_medium .'/'. $logo_name );

             /*Upload Original Image*/
             $logo_picture->save($destinationOriginal .'/'. $logo_name );

             $data->animation1 = $logo_name;
         }
         
         $file =  $request->file('animation2');
         $logo_name = '';
         if($request->hasfile('animation2')){
             $data = SettingModel::find($id);
             if($data->animation2){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->animation2)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->animation2);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->animation2)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->animation2);
                 }
             }
             $logo = $request->file('animation2')->getClientOriginalName();
             $extension = $request->file('animation2')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

            //  $logo_picture->resize($medium_width, $medium_height, function($constraint){
            //      $constraint->aspectRatio();
            //  })->save($destinationPath_medium .'/'. $logo_name );

             /*Upload Original Image*/
             $logo_picture->save($destinationOriginal .'/'. $logo_name );

             $data->animation2 = $logo_name;
         }

         $data->site_name = $request->site_name;
        $data->phone = $request->phone;
        $data->email_primary = $request->email_primary;
        $data->email_secondary = $request->email_secondary;
        $data->address = $request->address;
        $data->facebook_link = $request->facebook_link;
        $data->linkedin_link = $request->linkedin_link;
        $data->youtube_link = $request->youtube_link;
        $data->twitter_link = $request->twitter_link;
        $data->instagram_link = $request->instagram_link;
        $data->google_plus = $request->google_plus;
        $data->meta_key = $request->meta_key;
        $data->meta_description = $request->meta_description;
        $data->google_map = $request->google_map;
        $data->google_map2 = $request->google_map2;
        $data->welcome_text = $request->welcome_text;
        $data->copyright_text = $request->copyright_text;
         $data->text1 = $request->text1;
          $data->text2 = $request->text2;
        
        if($data->save()){
            return redirect()->back()->with('message','Update Sucessfully.');
        }

    }

      // Delete Logo
      function destroy($id){
        $data = SettingModel::find($id);
        if($data->logo){
         if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->logo)){
           unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->logo);
         }
         if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->logo)){
           unlink(env('PUBLIC_PATH').'uploads/original/' . $data->logo);
         }
       }
       $data->logo = NULL;
       $data->save();
       return response('Delete Successful.');
     }

    public function banner_destroy($id){
        $data = SettingModel::find($id);
        if($data->banner_logo){
            if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->banner_logo)){
                unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->banner_logo);
            }
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->banner_logo)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->banner_logo);
            }
        }
        $data->banner_logo = NULL;
        $data->save();
        return response('Delete Successful.');
    }
    
        public function mobile_banner_destroy($id){
        $data = SettingModel::find($id);
        if($data->mobile_banner_logo){
            if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->mobile_banner_logo)){
                unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->mobile_banner_logo);
            }
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->mobile_banner_logo)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->mobile_banner_logo);
            }
        }
        $data->mobile_banner_logo = NULL;
        $data->save();
        return response('Delete Successful.');
    }

    public function testimonial_img_destroy($id){
        $data = SettingModel::find($id);
        if($data->testimonial_img){
            if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->testimonial_img)){
                unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->testimonial_img);
            }
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->testimonial_img)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->testimonial_img);
            }
        }
        $data->testimonial_img = NULL;
        $data->save();
        return response('Delete Successful.');
    }
    

    
    public function testimonial_img_sm_destroy($id){
        $data = SettingModel::find($id);
        if($data->testimonial_img_sm){
            if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->testimonial_img_sm)){
                unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->testimonial_img_sm);
            }
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->testimonial_img_sm)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->testimonial_img_sm);
            }
        }
        $data->testimonial_img_sm = NULL;
        $data->save();
        return response('Delete Successful.');
    }
    
      public function animation1_destroy($id){
        $data = SettingModel::find($id);
        if($data->animation1){
            if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->animation1)){
                unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->animation1);
            }
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->animation1)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->animation1);
            }
        }
        $data->animation1 = NULL;
        $data->save();
        return response('Delete Successful.');
    }
    
      public function animation2_destroy($id){
        $data = SettingModel::find($id);
        if($data->animation2){
            if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->animation2)){
                unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->animation2);
            }
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->animation2)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->animation2);
            }
        }
        $data->animation2 = NULL;
        $data->save();
        return response('Delete Successful.');
    }
}
