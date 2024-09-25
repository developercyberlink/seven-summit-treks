<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TripBooking extends Model
{
    protected $fillable=['title','full_name','email','contact','country','trip_id','expedition_id','arrival_date','departure_date','reference','comments','terms','status','type'];

    public function trips()
    {
        return $this->belongsTo('App\Models\Travels\TripModel','trip_id');
    }

    public function expeditions()
    {
        return $this->belongsTo('App\Models\Travels\TripModel','expedition_id');
    }
}
