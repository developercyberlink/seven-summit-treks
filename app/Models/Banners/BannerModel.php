<?php

namespace App\Models\Banners;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $table = 'cl_banner';
    protected $fillable = ['title','banner_ordering','caption','content','link','youtube_link','video','ordering','picture','status'];
}
