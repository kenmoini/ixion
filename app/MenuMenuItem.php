<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuMenuItem extends Model 
{

    protected $table = 'menu_menu_item';
    public $timestamps = true;
    protected $fillable = array('parent_id', 'order');

}