<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripGalleryModel extends Model
{
    protected $table = 'cl_trip_galleries';
    protected $fillable = ['trip_id','title','file_name','ordering'];
}
