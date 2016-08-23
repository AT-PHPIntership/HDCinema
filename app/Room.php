<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'rooms';
    
    protected $fillable= ['name', 'status', 'cinemas_id'];

    /**
     * Get schedule of room .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    /**
     * Get cinema that owns the room .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cinemas()
    {
        return $this->belongsTo('App\Cinema', 'cinemas_id');
    }
    
    /**
     * Get all seat of room .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats()
    {
        return $this->hasMany('App\Seat');
    }
}
