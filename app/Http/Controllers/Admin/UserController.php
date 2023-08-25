<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user_index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        return view('admin.user_form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // refer to current user
        $user = new User;

        // do form validation
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                // use '.' to concantenate string
                'email' => 'required|email|unique:users,email',
                'phone' => 'nullable',
                'password' => 'required|min:8|confirmed'
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
        Session()->flash('success', 'The user has been added');

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user_form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // do form validation
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                // use '.' to concantenate string
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'nullable',
                'password' => 'nullable'
            ]
        );

        // if validation passed, save the data
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];

        if ($request['password'] != null) {
            $user->password = Hash::make($request['password']);
        }

        // actually save the data to Db
        $user->save();

        // inform user saved profile
        Session()->flash('success', 'The user has been updated');

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
