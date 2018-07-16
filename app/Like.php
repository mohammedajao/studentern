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

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
        'like_type'
    ];

    public function article() {
        return $this->belongsTo('App\Article');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
