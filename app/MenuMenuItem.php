<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuMenuItem extends Model 
{

    protected $table = 'menu_menu_item';
    public $timestamps = true;
    protected $fillable = array('menu_id', 'menu_item_id', 'parent_id', 'order', 'created_at', 'updated_at');

}