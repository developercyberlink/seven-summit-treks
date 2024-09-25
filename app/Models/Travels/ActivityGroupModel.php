<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class ActivityGroupModel extends Model
{
    protected $table = 'cl_trip_activity_group';
    protected $fillable = ['title','sub_title','uri','thumbnail','banner','excerpt','content','meta_keyword','meta_description','ordering','status'];

    public function activities(){
    	return $this->belongsToMany('App\Models\Travels\ActivityModel','cl_trip_activitygroup_activity_rel','activity_group_id','activity_id');
    }
}
