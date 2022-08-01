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
        // $user = User::all()->map(function ($user) {
        //     return [
        //         'id' => $user->id,
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         'birth_date' => $user->birth_date,
        //         'about' =>$user->about,
        //         'featured_image' =>$user->featured_image,
        //         'mobile' => $user->mobile,
        //         'location_id'=> $user->locations,
        //         'skill_id'=> $user->skills,
        //         'certificate_id'=> $user->certificates,
        //         'experience_id' => $user->experiences,
        //         'organization_id' =>$user->organizations,
        //     ];
        // });

        $user = Auth::user();
        $location = Location::get();
        $skills = Skill::get();
        $experience = Experience::get();
        $certificate = Certificate::get();
        $organization = Organization::get();
        $posts = PostResource::collection(Post::with('user')->latest()->paginate(30));
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
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $user->skills()->attach($request->skills);
        $user->experiences()->attach($request->experiences);
        $user->certificates()->attach($request->certificates);
        $user->organizations()->attach($request->organizations);
        $data['featured_image'] = $request->file('featured_image')->store('/', 'public');


        // $user->skills()->attach($request->skills);
        // if ($request->filled(('new_skills'))) {
        //     $skills = explode(',', $request->new_skills);
        //     foreach ($skills as $skill) {
        //         $skill = trim($skill);
        //         $model = Skill::firstOrCreate(['name' => $skill]);
        //         $user->skills()->attach($model);
        //     }
        // }

        User::create($data);
        return Redirect::route('/userprofile')->with('success', 'information added successfully!');
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
        $user->skill()->sync($request->skills);
        $user->certificate()->sync($request->certificates);
        $user->experience()->sync($request->experiences);
        $user->organization()->sync($request->organizations);


        return Redirect::route('user/UserProfile')->with('message', 'updated successfully!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);

        $user->delete();
        return Redirect::route('user/UserProfile')->with('message', 'deleted successfully!');
    }

    public function show(User $user)
    {
        // return Inertia::render('user/UserIndex' , compact('user'));
    }
}
