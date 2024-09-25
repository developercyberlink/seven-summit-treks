<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    protected $table = 'cl_trip_booking';
    protected $fillable = ['trip_id','title','full_name','country','email','phone','arrival_date','departure_date','reference','comments','terms_conditions','status'];
    
    
   

}


