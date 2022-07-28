<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
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
    public function index(User $user)
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

        $user = User::find(Auth::user()->id);
        $location = Location::get();
        $skill = Skill::get();
        $experience = Experience::get();
        $certificate = Certificate::get();
        $organization = Organization::get();
        return Inertia::render('user/UserProfile' , compact('user','location','skill','experience','certificate','organization'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        $locations = Location::all(['id','name']);
        $skills = Skill::all(['id','name']);
        $experiences = Experience::all(['id','name']);
        $certificates = Certificate::all(['id','name']);
        $organizations = Organization::all(['id','name']);
        return Inertia::render('user/CreateUser', compact('locations','skills','experiences', 'certificates', 'organizations'));
    }

    public function store(StoreUserRequest $request, User $user)
    {
        $data['user_id'] = auth()->id();

        $data = $request->validated();
        $user->skills()->attach($request->skills);
        $user->experiences()->attach($request->experiences);
        $user->certificates()->attach($request->certificates);
        $user->organizations()->attach($request->organizations);
        $data['featured_image'] = $request->file('featured_image')->store('/','public');
        User::create($data);
        return Redirect::route('user/UserProfile')->with('message', 'information added successfully!');
    }

    public function edit(User $user)
    {
        $this->authorize('update', User::class);
        $users = User::get(['featured_image','about','birth_date','mobile']);
        $locations = Location::all(['id','name']);
        $skills = Skill::all(['id','name']);
        $experiences = Experience::all(['id','name']);
        $certificates = Certificate::all(['id','name']);
        $organizations = Organization::all(['id','name']);
        return Inertia::render('user/edituser', compact('users','locations','skills','experiences', 'certificates', 'organizations'));

    }

    public function update(StoreUserRequest $request, User $user)
    {
        $this->authorize('update', User::class);

        $data = $request->validated();

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
