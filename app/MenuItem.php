<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model 
{

    protected $table = 'menu_items';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('title', 'url', 'target', 'icon_class', 'extra_class', 'route', 'parameters', 'created_at', 'updated_at');

    public function menus()
    {
        return $this->belongsToMany('App\Menu');
    }

}