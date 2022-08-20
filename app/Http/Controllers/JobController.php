<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Inertia\Inertia;
use App\Http\Requests\StoreJobRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Place;
use App\Models\Type;
use App\Http\Resources\JobResource;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::filter($request->query());

        $categories = Category::get();
        $locations = Location::get();
        $types = Type::get();
        // dd($query->toSql());
        $jobs = $query->with(['location', 'types', 'places'])->paginate(22);
        // dd($jobs);

        return Inertia::render('job/JobIndex', compact('jobs', 'categories', 'locations', 'types'));
    }

    // Show job details
    public function show(job $job)
    {
        $job->load(['location', 'types', 'places']);
        return Inertia::render('job/ShowJob', compact('job'));
    }

    public function create()
    {
        $categories = Category::all(['id', 'name']);
        $locations = Location::all(['id', 'name']);
        $types = Type::all(['id', 'name']);
        $places = Place::all(['id', 'name']);

        return Inertia::render('job/CreateJob', compact('types', 'places', 'categories', 'locations'));
    }

    public function store(StorejobRequest $request)
    {

        $data['user_id'] = auth()->id();

        $data = $request->validated();
        $job = job::create($request->except(['type_id', 'place_id']));
        // dd($data);
        $job->types()->attach($request->type_id);
        $job->places()->attach($request->place_id);



        return Redirect::route('jobs')->with('success', 'job posted successfully!');
    }


    public function edit(Job $job)
    {


        $this->authorize('update', $job);

        $categories = Category::all(['id', 'name']);
        $locations = Location::all(['id', 'name']);
        $types = Type::all(['id', 'name']);
        $places = Place::all(['id', 'name']);

        return Inertia::render('job/EditJob', compact('job', 'types', 'places', 'categories', 'locations'));
    }


    // u might need to create another reqeust for updateing jobrequest
    public function update(StorejobRequest $request, Job $job)
    {
        $this->authorize('update', $job);

        $data = $request->validated();


        $job->update($data);
        $job->types()->sync($request->types);
        $job->places()->sync($request->places);

        return Inertia::route('job/JobIndex')->with('message', 'job updated successfully!');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return Redirect::back()->with('error', 'job deleted successfully!');
    }


    public function manage(Job $job)
    {
        $jobs = Job::all();

        return Inertia::render('job/ManageJob', compact('jobs'));
    }


    public function apply(Job $job)
    {
        $job->like();
        $job->save();

        return Redirect::back()->with('success', 'job applied successfully!');
    }
}
