<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UsersRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->sortKeys();

        return view('users.index', ['users' => $users]);
    }

    public function store(UsersRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
