<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'seats';

    protected $fillable= ['name', 'status', 'rooms_id'];

    /**
     * Get room that owns the seat .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rooms()
    {
        return $this->belongsTo('App\Room', 'rooms_id');
    }
}
