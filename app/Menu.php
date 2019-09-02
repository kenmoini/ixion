<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model 
{

    protected $table = 'menus';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'slug');

    public function items()
    {
        return $this->belongsToMany('App\MenuItem');
    }

    public function realms()
    {
        return $this->morphToMany('App\Realm', 'realmable');
    }

}