<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'images';

    protected $fillable= ['name', 'description', 'films_id', 'cinemas_id',
    'news_id', 'advertisements_id'];

    /**
     * Get advertisement that owns the image .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertisements()
    {
        return $this->belongsTo('App\Advertisement', 'advertisements_id');
    }

    /**
     * Get news that owns the image .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news()
    {
        return $this->belongsTo('App\News', 'news_id');
    }

    /**
     * Get films that owns the image .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function films()
    {
        return $this->belongsTo('App\Film', 'films_id');
    }

    /**
     * Get cinema that owns the image .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cinemas()
    {
        return $this->belongsTo('App\Cinema', 'cinemas_id');
    }
}
