<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realm extends Model 
{

    protected $table = 'realms';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'slug', 'description', 'domain', 'authentication_method');

    public function users()
    {
        return $this->morphedByMany('App\User', 'realmable');
    }

    public function roles()
    {
        return $this->morphedByMany('App\Role', 'realmable');
    }

    public function menus()
    {
        return $this->morphedByMany('App\Menu', 'realmable');
    }

    public function realmables()
    {
        return $this->hasMany('App\Realmable');
    }

}