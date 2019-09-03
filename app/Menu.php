<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Menu extends Model 
{

    protected $table = 'menus';
    public $timestamps = true;

    use HasSlug;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'slug');

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function items()
    {
        return $this->belongsToMany('App\MenuItem');
    }

    public function realms()
    {
        return $this->morphToMany('App\Realm', 'realmable');
    }

}