<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripHighlights extends Model
{
    protected $table = 'trip_highlights';
    protected $fillable = ['trip_detail_id','title','ordering'];
}
