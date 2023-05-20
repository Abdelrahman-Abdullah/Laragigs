<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');

    }
    public function store()
    {
        $validatedData = \request()->validate([
            'name' => ['required'],
            'email'=> ['required' , 'email' , Rule::unique('users' , 'email')],
            'password' => ['required' , 'confirmed' , 'min:8']
        ]);

        // Create a User
        $user = User::create($validatedData);

        // Sign In With This User
        Auth::login($user);

        // Back
        return redirect('/')->with('message' , 'Your Account Was Created And Logged in Successfully');
    }

    public function login()
    {
        return view('users.login');
    }
    public function authenticate()
    {
        $cred = \request()->validate([
            'email' => ['required' , 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($cred))
        {
            session()->regenerate();
            return redirect('/')->with('message' , 'Logged in Successfully');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->withInput();

    }
    public function destroy()
    {
        \auth()->logout();
        return redirect('/')->with('message' , 'Logged out');

    }
}
