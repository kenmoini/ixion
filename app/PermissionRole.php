<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model 
{

    protected $table = 'permission_role';
    public $timestamps = true;
    protected $fillable = array('permission_id', 'role_id', 'created_at', 'updated_at');

}