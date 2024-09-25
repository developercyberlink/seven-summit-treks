<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

class PageDocModel extends Model
{
    protected $table = 'cl_page_docs';
    protected $fillable = ['page_id', 'key_string', 'title', 'document', 'ordering','thumbnail'];
}
