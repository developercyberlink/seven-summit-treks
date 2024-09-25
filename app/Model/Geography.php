<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Geography extends Model
{
    protected $fillable=['name','alt','countries','latitude','lat_sym','longitude','long_sym','rp','area','expedition'];
}
