<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class SeasonModel extends Model
{
    protected $table = 'cl_trip_season';
    protected $fillable = ['season'];
}
