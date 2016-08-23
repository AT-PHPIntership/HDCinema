<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'categories';

    protected $fillable = ['name'];

    /**
     * Get all film for category .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function films()
    {
        return $this->hasMany('App\Film');
    }
}
