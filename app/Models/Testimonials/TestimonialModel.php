<?php

namespace App\Models\Testimonials;

use Illuminate\Database\Eloquent\Model;

class TestimonialModel extends Model
{
    protected $table = 'cl_trip_testimonials';
    protected $fillable = ['trip_detail_id','title','content','thumbnail','country','video','ordering','status'];
}
