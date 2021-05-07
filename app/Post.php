<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    protected $fillable = [
        'title','body', 
        'image_url', 
        'published_at'
    ];

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

}
