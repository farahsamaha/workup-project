<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;
use App\Models\Job;
use Inertia\Inertia;
use App\Http\Requests\StoreJobRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Type;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::all();
        // $jobs = job::latest()->filter(request(['category', 'search']))->paginate(5);
        // $query = Job::latest();

        // if ($request->filled('category')) {
        //     $query->where('category_id', $request->category);
        // }

        // if ($request->filled('location')) {


        //     $query->whereHas('locations', function ($q) use ($request){
        //         $q->whereIn('id', $request->location);
        //     });

        //     if ($request->filled('type')) {
        //         $query->where('type', $request->type);
        //     }
        // }

        // if ($request->filled('q')) {
        //     $query->where(function ($q) use ($request) {
        //         $q->Where('category', 'like', "%$request->q%")
        //             ->orWhere('location', 'like', "%$request->q%")
        //             ->orWhere('type', 'like', "%$request->q%");
        //     });
        // }

        // $jobs = $query->paginate(1);
        // $categories = Category::has('jobs')->get();
        // $locations = Location::has('jobs')->get();
        // $types = Type::has('jobs')->get();

        return Inertia::render('job/JobIndex' , compact('jobs'));
    }

    // Show job details
    public function show(job $job)
    {
        return Inertia::render('job/ShowJob' , compact('job'));
    }

    public function create()
    {
        return Inertia::render('job/CreateJob');
    }

    public function store(StorejobRequest $request)
    {
        $data = $request->validated();


        $data['user_id'] = auth()->id();

        job::create($data);

        return Inertia::route('job/JobIndex')->with('message', 'job created successfully!');
    }


    public function edit(Job $job)
    {
        $this->authorize('update', $job);

        return Inertia::render('job/EditJob' , compact('job'));
    }


    public function update(StorejobRequest $request, Job $job)
    {
       $this->authorize('update', $job);

        $data = $request->validate([
            'title' => 'required',
            'category'=> 'required',
            'place'=> 'required',
            'type'=> 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required'
        ]);


        $job->update($data);

        return back()->with('message', 'job updated successfully!');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $job->delete();
        return Inertia::route('job/JobIndex')->with('message', 'job deleted successfully!');
    }
}
