<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    protected $table = 'cl_settings';
    protected $fillable = ['site_name','phone','email_primary','email_secondary','address','facebook_link',
    'linkedin_link','youtube_link','twitter_link','instagram_link','google_plus','meta_key','meta_description',
    'google_map','welcome_text','copyright_text','text1','text2','testimonial_img_sm','testimonial_img','animation1','animation2'];
}
