<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $attributes = [
        'likes' => 0,
        'featured' => false
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'likeable_id', 'id');
    }

    public function getLikeCountAttribute()
    {
        return $this->likes;
    }
}
