<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
   protected $table = 'cl_team';
    protected $fillable = [
        'name','position','category','subcategory','fb_url','instagram_url','twitter_url','linkedin_url','phone','email','content','brief','status','ordering','banner','thumbnail','published','is_active','is_draft','is_trashed','is_password_protected','is_commentable','lang','uri','team_key'
    ];

     /* The mountains that belongs to the team */
    public function mountains(){
    	return $this->hasMany('App\Models\Team\MountainSubmitted','team_id');
    }

    /* The achievements that belongs to the team */
    public function achievements(){
    	return $this->hasMany('App\Models\Team\Achievements','team_id');
    }

    /* The certificates that belongs to the team */
    public function certificates(){
        return $this->hasMany('App\Models\Team\Certificates','team_id');
          
    }

}
