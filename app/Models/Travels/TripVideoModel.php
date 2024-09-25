<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripVideoModel extends Model
{
    protected $table = 'cl_trip_videos';
    protected $fillable = ['trip_id', 'video', 'video_caption', 'ordering', 'status'];
}
