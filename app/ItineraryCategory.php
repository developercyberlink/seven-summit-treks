<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ItineraryCategory extends Model
{
 protected $fillable = ['category','ordering','trip_id','default'];

 public function itineraries()
 {
   return $this->hasMany('App\Models\Travels\TripItineraryCategoryModel', 'category')->orderBy('ordering','asc');
 }

 public function cost_includes()
 {
   return $this->hasMany('App\Models\Testimonials\TestimonialModel', 'category')->orderBy('ordering','asc');
 }

 public function cost_excludes()
 {
   return $this->hasMany('App\Models\Travels\TripInfoModel','category')->orderBy('ordering','asc');
 }

 public function trips(){
   return $this->belongsToMany('App\Models\Travels\TripModel','cl_trip_itinerary_rel','category_id','trip_id');
 }
}
