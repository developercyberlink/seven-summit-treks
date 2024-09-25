<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

class PageDetails extends Model
{
    protected $table = 'page_details';
    protected $fillable = [
    	'page_id','title','content','ordering'];
}
