<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Admin extends Authenticatable implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admins';

    protected $fillable = ['username', 'password', 'fullname'];

    protected $hidden = [
        'password'
    ];

    /**
     * Get all user for Admin .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    /**
     * Get all film for Admin.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function films()
    {
        return $this->hasMany('App\Models\Film');
    }
}
