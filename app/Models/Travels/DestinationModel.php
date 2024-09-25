<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class DestinationModel extends Model
{
    protected $table = 'cl_trip_destinations';
    protected $fillable = ['title','sub_title','uri','thumbnail','banner','excerpt','content','meta_keyword','meta_description','ordering','status'];

    /* The trips that belongs to the destination */
    public function trips(){
    	return $this->belongsToMany('App\Models\Travels\TripModel','cl_trip_destination_rel','destination_id','trip_id');
    }
    public function activities(){
    	return $this->belongsToMany('App\Models\Travels\ActivityModel','cl_trip_activity_destination_rel','destination_id','activity_id');
    }
}
