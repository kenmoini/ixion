<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAttribute extends Model 
{

    protected $table = 'user_attributes';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('key', 'display_name', 'value', 'description');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}