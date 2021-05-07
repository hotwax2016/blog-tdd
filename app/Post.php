<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'image_url',
        'published_at'
    ];

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
