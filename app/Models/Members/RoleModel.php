<?php

namespace App\Models\Members;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'cl_roles';
    protected $fillable = ['role'];
}
