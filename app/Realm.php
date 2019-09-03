<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Realm extends Model 
{

    protected $table = 'realms';
    public $timestamps = true;

    use HasSlug;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'slug', 'description', 'domain', 'authentication_method');

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

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