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
     * Get all room for cinema .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    /**
     * Get all image for cinema .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * Get all image for schedule .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
