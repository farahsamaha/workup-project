<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
