<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Conner\Likeable\Likeable;

class Job extends Model
{
    use HasFactory, Likeable;
    protected $fillable = ['title', 'category_id', 'location_id', 'email', 'description'];


    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function location()
    {

        return $this->belongsTo(Location::class);
    }
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
    public function places()
    {
        return $this->belongsToMany(Place::class);
    }

    public function scopeFilter($query)
    {
        $filters = request()->query();
        // dd($filters);
        if (request()->query('category_id')) {
            $query->where('category_id', 'like', '%' . request('category_id') . '%');
            // dd(request()->query('category_id'));
        }

        if (request()->query('location_id')) {

            $query->where('location_id', 'like', '%' . request('location_id') . '%');
        }

        if (request()->query('type_id')) {
            $query->whereHas('types', fn ($q) => $q->where('id', '<>', [request('type_id')]));
        }

        if (request()->query('title')) {
            $query->where('title', 'like', '%' . request('title') . '%');
        }
    }
}
