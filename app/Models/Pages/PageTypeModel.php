<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

class PageTypeModel extends Model
{
      protected $table = 'cl_pagetype';
    protected $fillable = ['page_type','uri','template','ordering','is_menu','status','image','brief','external_link'];
}
