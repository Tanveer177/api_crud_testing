<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');

    }
    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // $request->authenticate();
        $email = $request->email;
        $password = $request->password;
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        User::created([
            'email' => $email,
            'password' => Hash::make($request->password),
            ]);
            return response()->json(['message' => 'User logged in successfully'], 200);

        // $request->validate([
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);
        //     if (!Auth::attempt($request->only('email', 'password'))) {
        //         return response()->json(['message' => 'Invalid credentials'], 401);
        //         }
        //         return response()->json(['message' => 'User logged in successfully'], 200);


    }
}
