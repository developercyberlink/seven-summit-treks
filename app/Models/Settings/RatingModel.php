<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    protected $table = 'cl_trip_rating';
    protected $fillable = ['title','rating'];
}
