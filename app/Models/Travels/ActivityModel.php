<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class ActivityModel extends Model
{
    protected $table = 'cl_trip_activities';
    protected $fillable = ['title','sub_title','template','uri','thumbnail','banner','excerpt','content','meta_keyword','meta_description','ordering','status'];

     public function trips(){
    	return $this->belongsToMany('App\Models\Travels\TripModel','cl_trip_activity_rel','activity_id','trip_id');
    }

    public function activitygroups(){
    	return $this->belongsToMany('App\Models\Travels\ActivityGroupModel','cl_trip_activitygroup_activity_rel','activity_id','activity_group_id');
    }

    public function destinations(){
    	return $this->belongsToMany('App\Models\Travels\DestinationModel','cl_trip_activity_destination_rel','activity_id','destination_id');
    }

    public function regions(){
        return $this->belongsToMany('App\Models\Travels\RegionModel','cl_trip_activity_region_rel','activity_id','region_id');
    }
}
