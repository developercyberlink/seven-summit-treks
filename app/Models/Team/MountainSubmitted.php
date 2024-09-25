<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class MountainSubmitted extends Model
{
   protected $table = 'mountains_climbed';
    protected $fillable = [
        'team_id','mountain','total','year','ordering','link'
    ];
}