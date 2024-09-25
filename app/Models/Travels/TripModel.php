<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripModel extends Model
{
    protected $table = 'cl_trip_details';
    protected $fillable = ['trip_title', 'sub_title', 'duration', 'max_altitude', 'best_season',
        'walking_per_day', 'group_size', 'accommodation', 'route', 'rank', 'coordinate', 'weather_report',
        'trip_range', 'starting_price', 'trip_currency', 'trip_map', 'trip_video', 'trip_phone', 'trip_email', 'trip_excerpt',
        'trip_content', 'trip_grade', 'uri', 'trip_code', 'trip_type', 'rating', 'ordering', 'meta_key', 'meta_description', 'banner',
        'expedition_group_id', 'thumbnail', 'status_text', 'country', 'peak_name', 'trip_grade_msg','video_status'];

    /* The destinations that belongs to the trip */
    public function destinations()
    {
        return $this->belongsToMany('App\Models\Travels\DestinationModel', 'cl_trip_destination_rel', 'trip_id', 'destination_id');
    }

    // Related Trips
    public function relatedtrips()
    {
        return $this->belongsToMany('App\Models\Travels\TripModel', 'cl_related_trip_rel', 'trip_id', 'related_trip_id');
    }

    /* The regions that belongs to the trip */
    public function regions()
    {
        return $this->belongsToMany('App\Models\Travels\RegionModel', 'cl_trip_region_rel', 'trip_id', 'region_id');
    }

    /* The activities that belongs to the trip */
    public function activities()
    {
        return $this->belongsToMany('App\Models\Travels\ActivityModel', 'cl_trip_activity_rel', 'trip_id', 'activity_id');
    }

    /* The trip groups that belongs to the trip */
    public function tripgroups()
    {
        return $this->belongsToMany('App\Models\Travels\TripGroupModel', 'cl_trip_group_rel', 'trip_id', 'group_id');
    }

    /* The trip groups that belongs to the trip */
    public function expeditions()
    {
        return $this->belongsToMany('App\Models\Expeditions\ExpeditionModel', 'cl_trip_expedition_rel', 'trip_id', 'expedition_id');
    }

   
    public function schedules()
    {
        return $this->hasMany('App\Models\Travels\TripScheduleModel', 'trip_detail_id')->orderby('ordering','asc');
    }

    public function gears()
    {
        return $this->hasMany('App\Models\Travels\TripGearModel', 'trip_detail_id');
    }

    public function faqs()
    {
        return $this->hasMany('App\Models\Faqs\FaqModel', 'trip_detail_id');
    }

    public function testimonials()
    {
        return $this->hasMany('App\Models\Testimonials\TestimonialModel', 'trip_detail_id');
    }

    public function infos()
    {
        return $this->hasMany('App\Models\Travels\TripInfoModel', 'trip_detail_id');
    }

    public function routecamp()
    {
        return $this->hasMany('App\Models\Travels\RouteCampModel', 'trip_detail_id');
    }

    public function weather_report()
    {
        return $this->hasMany('App\Models\Travels\WeatherReportModel', 'trip_detail_id');
    }
    
      public function highlights(){
        return $this->hasMany('App\Models\Travels\TripHighlights','trip_detail_id');
    }

//itinerary categories
      public function itineraries()
    {
        return $this->belongsToMany('App\Models\Travels\TripItineraryCategoryModel', 'cl_trip_itinerary', 'trip_detail_id', 'category_id')->distinct();
    }

    public function categories()
    {
        return $this->belongsToMany('App\ItineraryCategory', 'cl_trip_itinerary_rel','trip_id','category_id');
    }
    
    public function exp_bookings()
    {
        return $this->hasMany('App\Model\TripBooking','expedition_id');
    }
    
    public function trek_bookings()
    {
        return $this->hasMany('App\Model\TripBooking','trip_id');
    }
    
    
}
