<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'advertisements';

    protected $fillable = ['name', 'description', 'views', 'link',
     'hide'];
    
    /**
     * Get all image for Advertisement .
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
