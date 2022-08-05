<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\StoreUserRequest;
use App\Models\Location;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Organization;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(User $user, Post $post)
    {

        $user = Auth::user();
        $location = Location::get();
        $skills = Skill::get();
        $experience = Experience::get();
        $certificate = Certificate::get();
        $organization = Organization::get();
        $posts = PostResource::collection(Post::with('user')->latest()->paginate(30));
        // $user->load(['location', 'skill', 'experience', 'organization']);
        return Inertia::render('user/UserProfile', compact('user', 'location', 'skills', 'experience', 'certificate', 'organization', 'posts'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        $user = User::get();
        $locations = Location::all(['id', 'name']);
        $skills = Skill::all(['id', 'name']);
        $experiences = Experience::all(['id', 'name']);
        $certificates = Certificate::all(['id', 'name']);
        $organizations = Organization::all(['id', 'name']);
        return Inertia::render('user/CreateUser', compact('user', 'locations', 'skills', 'experiences', 'certificates', 'organizations'));
    }

    public function store(StoreUserRequest $request, User $user)
    {

        $data['user_id'] = auth()->id();
        // dd($data);
        $data = $request->validated();

        if ($request->file('featured_image'))
            $data['featured_image'] = $request->featured_image->store('public/assets');

        auth()->user()->update($data);
        // $user = User::update($request->except(['skill_id', 'experience_id']);

        // $user->skills()->attach($request->skills);
        // $user->experiences()->attach($request->experiences);
        // $user->certificates()->attach($request->certificates);
        // $user->organizations()->attach($request->organizations);

        if ($request->filled('skills'))
            auth()->user()->skills()->attach($request->skills);
        if ($request->filled('experiences'))
            auth()->user()->experiences()->attach($request->experiences);
        if ($request->filled('certificates'))
            auth()->user()->certificates()->attach($request->certificates);
        if ($request->filled('organizations'))
            auth()->user()->organizations()->attach($request->organizations);

        // for add new items

        // if ($request->filled(('new_skills'))) {
        //     $skills = explode(',', $request->new_skills);
        //     foreach ($skills as $skill) {
        //         $skill = trim($skill);
        //         $model = Skill::firstOrCreate(['name' => $skill]);
        //         $user->skills()->attach($model);
        //     }
        // }


        // if ($request->filled(('new_experiences'))) {
        //     $experiences = explode(',', $request->new_experiences);
        //     foreach ($experiences as $experience) {
        //         $experience = trim($experience);
        //         $model = Experience::firstOrCreate(['name' => $experience]);
        //         $user->experiences()->attach($model);
        //     }
        // }

        // if ($request->filled(('new_certificates'))) {
        //     $certificates = explode(',', $request->new_certificates);
        //     foreach ($certificates as $certificate) {
        //         $certificate = trim($certificate);
        //         $model = Certificate::firstOrCreate(['name' => $certificate]);
        //         $user->certificates()->attach($model);
        //     }
        // }


        // if ($request->filled(('new_organizations'))) {
        //     $organizations = explode(',', $request->new_organizations);
        //     foreach ($organizations as $organization) {
        //         $organization = trim($organization);
        //         $model = Organization::firstOrCreate(['name' => $organization]);
        //         $user->organizations()->attach($model);
        //     }
        // }

        return Redirect::route('userprofile')->with('success', 'Done!');
    }

    public function edit()
    {
        $this->authorize('update', Auth::user());
        $user = Auth::user();
        $locations = Location::all(['id', 'name']);
        $skills = Skill::all(['id', 'name']);
        $experiences = Experience::all(['id', 'name']);
        $certificates = Certificate::all(['id', 'name']);
        $organizations = Organization::all(['id', 'name']);
        return Inertia::render('user/EditUser', compact('user', 'locations', 'skills', 'experiences', 'certificates', 'organizations'));
    }

    public function update(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user();
        $user->update($data);
        if ($request->filled('skills'))
            auth()->user()->skills()->sync($request->skills);
        if ($request->filled('experiences'))
            auth()->user()->experiences()->sync($request->experiences);
        if ($request->filled('certificates'))
            auth()->user()->certificates()->sync($request->certificates);
        if ($request->filled('organizations'))
            auth()->user()->organizations()->sync($request->organizations);

        // $user->skills()->sync($request->skills);
        // $user->certificate()->sync($request->certificates);
        // $user->experience()->sync($request->experiences);
        // $user->organization()->sync($request->organizations);

        return Redirect::route('userprofile')->with('success', 'updated successfully!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);

        $user->delete();
        return Redirect::route('user/UserProfile')->with('message', 'deleted successfully!');
    }

    public function show(User $user)
    {
        $user = Auth::user();
        $location = Location::get();
        $skills = Skill::get();
        $experience = Experience::get();
        $certificate = Certificate::get();
        $organization = Organization::get();
        $posts = PostResource::collection(Post::with('user')->latest()->paginate(30));
        return Inertia::render('user/ShowProfile', compact('user', 'location', 'skills', 'experience', 'certificate', 'organization', 'posts'));
    }
}
