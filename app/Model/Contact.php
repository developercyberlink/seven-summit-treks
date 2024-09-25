<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['first_name','surname','email','number','interest','country','experience','message','subscribed','verified'];
}
