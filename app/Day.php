<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'days';

    protected $fillable= ['name'];

    /**
     * Get all schedule of day .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
