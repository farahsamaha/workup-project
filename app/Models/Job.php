<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function locations()
    {
        return $this->belongsTo(Location::class);
    }
    public function types() {
        return $this->belongsToMany(Type::class);
    }
    public function places() {
        return $this->belongsToMany(Place::class);
    }
}
