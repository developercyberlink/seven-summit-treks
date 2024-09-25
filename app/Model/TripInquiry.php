<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TripInquiry extends Model
{
    public function trips()
    {
        return $this->belongsTo('App\Models\Travels\TripModel','trip_id');
    }
}
