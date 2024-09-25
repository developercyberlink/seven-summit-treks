<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class Achievements extends Model
{
   protected $table = 'achievements';
    protected $fillable = [
        'team_id','title','ordering'
    ];
}
