<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'cinemas';

    protected $fillable = ['content', 'parent_id', 'users_id', 'films_id'];
    
    /**
     * Get the User that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    /**
     * Get film that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function films()
    {
        return $this->belongsTo('App\Film', 'films_id');
    }
}
