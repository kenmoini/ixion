<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model 
{

    protected $table = 'permissions';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('slug', 'created_at', 'updated_at');

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

}