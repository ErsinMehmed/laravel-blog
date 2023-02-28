<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Login
     *
     * @return void
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Login validation
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    /**
     * Registration
     *
     * @return void
     */
    public function registration()
    {
        return view('registration');
    }

    /**
     * Registration validation
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function validateRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('login')->with('success', 'Registration completed');
    }

    /**
     * Logout
     *
     * @return void
     */
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}
