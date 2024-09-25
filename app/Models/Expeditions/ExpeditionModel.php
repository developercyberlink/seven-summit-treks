<?php

namespace App\Models\Expeditions;

use Illuminate\Database\Eloquent\Model;

class ExpeditionModel extends Model
{
    protected $table = 'cl_trip_expeditions';
    protected $fillable = ['title', 'uri', 'content', 'thumbnail', 'ordering', 'status','banner'];

    public function trips()
    {
        return $this->belongsToMany('App\Models\Travels\TripModel', 'cl_trip_expedition_rel', 'expedition_id', 'trip_id')->orderBy('ordering','asc');
    }

    public function expeditionGroup()
    {
        return $this->hasOne('\App\Models\Expeditions\ExpeditionGroupModel', 'expedition');
    }

}
