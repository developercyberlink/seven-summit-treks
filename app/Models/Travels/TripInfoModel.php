<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripInfoModel extends Model
{
    protected $table = 'cl_trip_supporting_info';
    protected $fillable = ['trip_detail_id', 'title', 'content', 'ordering'];

}
