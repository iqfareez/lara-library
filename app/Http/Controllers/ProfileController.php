<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function get()
    {
        $user = Auth::user();
        return view('pages.profile_form', compact('user'));
    }

    public function post(Request $request)
    {
        // refer to current user
        $user = Auth::user();

        // do form validation
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                // use '.' to concantenate string
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'nullable',
                'password' => 'nullable|min:6|confirmed'
            ]
        );

        // if validation passed, save the data
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];

        $user->password = Hash::make($request['password']);

        // actually save the data to Db
        $user->save();

        // inform user saved profile
        Session()->flash('success', 'You profile have been saved');

        return redirect()->route('profile.get');

        // dd($request);
    }
}
