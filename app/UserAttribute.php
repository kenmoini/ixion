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
    protected $fillable = array('user_id', 'key', 'display_name', 'value', 'description', 'created_at', 'updated_at');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}