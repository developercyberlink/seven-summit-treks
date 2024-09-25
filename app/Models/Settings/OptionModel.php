<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class OptionModel extends Model
{
    protected $table = 'cl_options';
    protected $fillable = ['key_name', 'title', 'content', 'status','sign'];
}
