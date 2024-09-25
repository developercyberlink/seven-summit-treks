<?php

namespace App\Models\Expeditions;

use Illuminate\Database\Eloquent\Model;

class ExpeditionGroupModel extends Model
{
    protected $table = 'cl_trip_expedition_group';
    protected $fillable = ['group_title', 'description', 'expedition', 'ordering', 'status'];

    

}
