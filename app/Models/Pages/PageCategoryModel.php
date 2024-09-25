<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

class PageCategoryModel extends Model
{
    protected $table = 'Cl_PageCategory';
    protected $fillable = [
    	'page_type','category','category_caption','category_content','uri','ordering','thumbnail','parent_id','status'
    ];
}
