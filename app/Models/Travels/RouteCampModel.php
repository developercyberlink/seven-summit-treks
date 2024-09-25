<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class RouteCampModel extends Model
{
    protected $table = 'cl_trip_routecamp';
    protected $fillable = ['trip_detail_id', 'title', 'content', 'ordering'];
}
