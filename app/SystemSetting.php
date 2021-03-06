<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemSetting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('key', 'display_name', 'default_value', 'value', 'details', 'type', 'order', 'parameters', 'visibility', 'created_at', 'updated_at');

}