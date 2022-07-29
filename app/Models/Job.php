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

    public function scopeFilter($query)
    {
        $filters = request()->query();
        // dd($filters);
        if (request()->query('category')) {
            $query->where('categories', 'like', '%' . request()->query('category') . '%');
            // dd('ok');
        }

        if (request()->query('location')) {
            $query->where('locations', 'like', '%' . request('location') . '%');
        }

        if (request()->query('type')) {
            $query->where('types', 'like', '%' . request('types') . '%');
        }

        if (request()->query('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }
    }
}
