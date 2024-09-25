<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripGroupModel extends Model
{
    protected $table = 'cl_trip_groups';
    protected $fillable = ['group_title', 'description', 'expedition', 'ordering', 'status'];

    public function trips(){
    	return $this->belongsToMany('App\Models\Travels\TripModel','cl_trip_group_rel','group_id','trip_id');
    }
}
