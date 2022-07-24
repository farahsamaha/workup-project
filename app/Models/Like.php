<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'like',
        'unlike',
        'likeable_id',
        'likeable_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likeable()
    {
        return $this->morphTo();
    }
}
