<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'schedules';
    
    protected $fillable= ['films_id', 'cinemas_id', 'days_id', 'times_id', 'rooms_id'];

    /**
     * Get cinema that owns the schedule .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cinemas()
    {
        return $this->belongsTo('App\Cinema', 'cinemas_id');
    }

    /**
     * Get day that owns the schedule .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function days()
    {
        return $this->belongsTo('App\Day', 'days_id');
    }

    /**
     * Get room that owns the schedule .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rooms()
    {
        return $this->belongsTo('App\Room', 'rooms_id');
    }

    /**
     * Get film that owns the schedule .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function films()
    {
        return $this->belongsTo('App\Film', 'films_id');
    }

    /**
     * Get time that owns the schedule .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function times()
    {
        return $this->belongsTo('App\Time', 'times_id');
    }
}
