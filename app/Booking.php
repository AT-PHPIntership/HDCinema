<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'bookings';

    protected $fillable = ['users_id', 'films_id', 'identitycard', 'cinema',
     'date', 'time', 'quantity', 'seat'];
    
    /**
     * Get the User that owns the booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    /**
     * Get  film of booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function films()
    {
        return $this->belongsTo('App\Film', 'films_id');
    }
}
