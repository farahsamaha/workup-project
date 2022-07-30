<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Conner\Likeable\Likeable;

class Post extends Model
{
    use HasFactory, SoftDeletes, Likeable;


    protected $fillable = ['user_id', 'content', 'image'];

    // protected $with = ['user', 'comments'];
    public $timestamps = false;


    public function getImageAttribute($value)
    {
        return $value ? Storage::url($value) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function likes()
    // {
    //     return $this->morphMany(Like::class, 'likeable');
    // }

    // public function getLikedAttribute()
    // {
    //     return $this->likes()->where('like', function ($like) {
    //         if ($this->like != 0)
    //             return $like;
    //     })
    //         ->where('likeable_id', $this->id)
    //         ->where('likeable_type', get_class($this))
    //         ->count();
    // }

    // public function getunlikedAttribute()
    // {
    //     return $this->likes()->where('unlike', 1)
    //         ->where('likeable_id', $this->id)
    //         ->where('likeable_type', get_class($this))
    //         ->count();
    // }
}
