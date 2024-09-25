<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripItineraryCategoryModel extends Model
{
    protected $table = 'cl_trip_itinerary_category';
    protected $fillable = ['category','ordering','status','default'];
    
     public function trips()
    {
        return $this->belongsToMany('App\Models\Travels\TripModel', 'cl_trip_itinerary', 'category_id', 'trip_detail_id')->distinct();
    }

    
    public function categories()
    {
      return $this->belongsto('App\ItineraryCategory','category');
    }
}