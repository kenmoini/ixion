<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model 
{

    protected $table = 'role_user';
    public $timestamps = true;
    protected $fillable = array('role_id', 'user_id', 'created_at', 'updated_at');

}