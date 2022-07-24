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
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(User $user)
    {
        return Inertia::render('user/UserProfile', [
            'users' => User::all()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'birth_date' => $user->birth_date,
                    'about' =>$user->about,
                    'featured_image' =>$user->featured_image,
                    'mobile' => $user->mobile,
                    'location_id'=> $user->locations,
                    'skill_id'=> $user->skills,
                    'certificate_id'=> $user->certificates,
                    'experience_id' => $user->experiences,
                    'organization_id' =>$user->organizations,

                ];
            }),
        ]);

        return Inertia::render('user/UserProfile' , compact('user'));
    }

    public function create()
    {
        // $users = User::get(['featured_image','birth_date','mobile']);
        $locations = Location::all(['id','name']);
        $skills = Skill::all(['id','name']);
        $experiences = Experience::all(['id','name']);
        $certificates = Certificate::all(['id','name']);
        $organizations = Organization::all(['id','name']);
        return Inertia::render('user/CreateUser', compact('locations','skills','experiences', 'certificates', 'organizations'));
    }

    public function store(StoreUserRequest $request, User $user)
    {

        $data['featured_image'] = $request->file('featured_image')->store('/','public');

        $data = $request->validated();

        $data = $request->validated();
        $user->skills()->attach($request->skills);
        $user->experiences()->attach($request->experiences);
        $user->certificates()->attach($request->certificates);
        $user->organizations()->attach($request->organizations);

        User::create($data);

        return back()->with('message', 'information created successfully!');
    }

    public function update(StoreUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->validated();


        $user->update($data);
        $user->skills()->sync($request->skills);
        $user->certificates()->sync($request->certificates);
        $user->experience()->sync($request->experiences);
        $user->organization()->sync($request->organizations);


        return back()->with('message', 'updated successfully!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();
        return Inertia::route('user/UserProfile')->with('message', 'deleted successfully!');
    }

    public function edit(User $user)
    {


    }
    public function show(User $user)
    {
        // return Inertia::render('user/UserIndex' , compact('user'));
    }
}
