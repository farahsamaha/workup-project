<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function experiences()
    {
        return $this->belongsToMany(Experience::class);
    }
    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }
    public function certificates()
    {
        return $this->belongsToMany(Certificate::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function getFeaturedImageAttribute($value)
    {
        return $value ? Storage::url($value) : null;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'about',
        'featured_image',
        'mobile',
        'location_id'
    ];
    public $timestamps = false;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
