<?php

namespace App\Http\Controllers;

use App\User;
use App\UserBiodata;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function create()
    {
        // redirect to profile if user has filled in info
        if (UserBiodata::where('user_id', auth()->user()->id)->exists())
        {
            // find a better way to do this!!!
            $biodata = auth()->user()->user_biodata()->get();
            return view('profile.show', compact('biodata'));
        }

        return view('profile.create');

    }

    public function store()
    {
        $data = \request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'school' => 'required',
        ]);

        $bio_data = auth()->user()->user_biodata()->create($data);

        return redirect('/profile/'.$bio_data->user_id);

    }

    public function show()
    {
        $biodata = auth()->user()->user_biodata()->get();

        return view('profile.show', compact('biodata'));
    }

    public function update()
    {
        // update users profile
        auth()->user()->user_biodata()->update($this->validatedData());

        return redirect('/profile/'.auth()->user()->id);
    }

    public function edit()
    {
        $user_id = auth()->user()->id;
        // get users biodata to display on form
        $biodata = auth()->user()->user_biodata()->get();
        return view('profile.edit', compact('user_id', 'biodata'));
    }

    public function validatedData()
    {
        return \request()->validate([
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'school' => 'required',
        ]);
    }
}
