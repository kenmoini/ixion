<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginAttempt extends Model 
{

    protected $table = 'login_attempts';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}