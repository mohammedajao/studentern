<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
        'like_type'
    ];

    public function article() {
        return $this->morphedByMany('App\Article', 'likeable');
    }

    public function user() {
        return $this->morphedByMany('App\User', 'likeable');
    }

}
