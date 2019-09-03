<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Role extends Model 
{

    protected $table = 'roles';
    public $timestamps = true;

    use HasSlug;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('title', 'slug', 'description');

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    public function realms()
    {
        return $this->morphToMany('App\Realm', 'realmable');
    }

}