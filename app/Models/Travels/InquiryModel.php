<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class InquiryModel extends Model
{
        protected $table = 'cl_trip_inquiry';
        protected $fillable = ['full_name','email','phone','nationality','message','status'];
}
