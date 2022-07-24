<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Models\City;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        return Inertia::render('user/UserIndex' , compact('users'));
    }

    public function show(user $user)
    {
        return Inertia::render('user/UserIndex' , compact('users'));
    }

    public function create()
    {
        $cities = City::all(['id','name']);
        $education = Education::all(['id','name']);
        $experince = Experience::all(['id','name']);
        $skills = Skill::all(['id','name']);
        return Inertia::render('user/CreateUser', compact('cities', 'education', 'experince','skills'));
    }

    public function store(StoreUserRequest $request)
    {
        // $data = $request->validate([
        //     'birth_date' => 'required|date_format: Y-m-d',
        //     'about' => 'required',
        //     'city_id'=> 'required|exists:cities,id',
        //     'skill_id'=> 'required|exists:skills,id',
        //     'education_id'=> 'required|exists:education,id',
        //     'experince_id' => 'required|exists:experince,id',
        //     'volunteering_id' => 'required|exists:volunteering,id',
        //     'featured_image' =>'file|image',
        //     'mobile' => 'required|numeric',
        // ]);
        $data['featured_image'] = $request->file('featured_image')->store('/','public');

        $data = $request->validated();

        $data['user_id'] = auth()->id();

        user::create($data);

        return Inertia::route('user/UserIndex')->with('message', 'information added successfully!');
    }

    public function edit()
    {

    }


    public function update(StoreUserRequest $request, User $user)
    {
       $this->authorize('update', );

        $data = $request->validate([

            'birthdate' => 'required',
            'mobile' => 'required',
            'city'=> 'required',
            'skill'=> 'required',
            'education'=> 'required',
            'experince' => 'required',
            'volunteering' => 'required'
        ]);


        $user->update($data);

        return back()->with('message', 'information updated successfully!');
    }

    public function destroy()
    {

    }
}
