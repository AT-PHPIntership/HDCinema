<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeFilm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'type_films';
    
    protected $fillable= ['name', 'price'];

    /**
     * Get all film of typefilm.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function films()
    {
        return $this->hasMany('App\Film');
    }
}
