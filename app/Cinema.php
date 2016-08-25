<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'cinemas';

    protected $fillable = ['name', 'address', 'tel', 'description'];
    
    /**
     * Get all image for cinema .
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    /**
     * Get all room for cinema .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    /**
     * Get all schedule of cinema .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
