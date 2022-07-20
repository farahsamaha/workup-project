<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function cities()
    {
        return $this->belongsTo(City::class);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function experience()
    {
        return $this->belongsToMany(Experience::class);
    }
    public function volunteering()
    {
        return $this->belongsToMany(Volunteering::class);
    }
    public function education()
    {
        return $this->belongsToMany(Education::class);
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
        ('name'),
        ('birth_date'),
        ('about'),
        ('skill'),
        ('experince'),
        ('volunteering'),
        ('education')
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
