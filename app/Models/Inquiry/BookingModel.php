<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    protected $table = 'payment_booking';
    protected $fillable = ['input_amount','paid_status','trip_id','full_name','country','email','phone','comments','terms_conditions','status'];
    

}





