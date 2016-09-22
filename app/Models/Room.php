<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Room extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'rooms';
    
    protected $fillable= ['name', 'status', 'cinemas_id', 'days_id'];

    /**
     * Get schedule of room .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule');
    }

    /**
     * Get day that owns the room .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function days()
    {
        return $this->belongsTo('App\Models\Day', 'days_id');
    }
    
    /**
     * Get cinema that owns the room .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cinemas()
    {
        return $this->belongsTo('App\Models\Cinema', 'cinemas_id');
    }

    /**
     * Get all seat of room .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats()
    {
        return $this->hasMany('App\Models\Seat');
    }
}
