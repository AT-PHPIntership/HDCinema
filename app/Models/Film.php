<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Film extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'films';

    protected $fillable= ['name', 'genre', 'actor', 'director',
     'duration', 'starttime', 'image', 'trailer', 'views', 'hide',
     'category_id', 'admins_id', 'type_films_id'];

    /**
     * Get all image for Film .
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    /**
     * Get all booking of film .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    /**
     * Get all comment of film .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get all schedule of film .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    /**
     * Get type of film .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeFilms()
    {
        return $this->belongsTo('App\TypeFilm', 'type_films_id');
    }

    /**
     * Get admin create the film .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admins()
    {
        return $this->belongsTo('App\Admin', 'admins_id');
    }

    /**
     * Get category of film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
