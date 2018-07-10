<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $attributes = [
        'likes' => 0,
        'featured' => false
    ];
}
