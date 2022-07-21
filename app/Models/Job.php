<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'location_id', 'email', 'description'];
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories');
    }
    public function locations()
    {
        return $this->belongsToMany(Location::class, 'locations');
    }
    public function types()
    {
        return $this->belongsToMany(Type::class, 'types');
    }
    public function places()
    {
        return $this->belongsToMany(Place::class, 'places');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['category'] ?? false) {
            $query->where('categories', 'like', '%' . request('category') . '%');
        }

        if ($filters['location'] ?? false) {
            $query->where('locations', 'like', '%' . request('location') . '%');
        }

        if ($filters['types'] ?? false) {
            $query->where('types', 'like', '%' . request('types') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }
    }
}
