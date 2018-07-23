<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return $this->morphMany('App\Like', 'likeable');
    }

    public function getLikeCountAttribute()
    {
        return $this->likes;
    }


    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return ($like && $like->like_type == 'like') ? true : false;
    }

}
