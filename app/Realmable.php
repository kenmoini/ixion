<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realmable extends Model 
{

    protected $table = 'realmables';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('realm_id', 'realmable_id', 'realmable_type', 'created_at', 'updated_at');

    public function realms()
    {
        return $this->belongsTo('App\Realm');
    }

}