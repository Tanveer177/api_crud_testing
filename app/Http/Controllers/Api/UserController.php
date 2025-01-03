<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
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
    }
    public function usersaved(Request $request){

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone_id = $request->phone_id;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_id' => 'required',
        ]);
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone_id' => $phone_id,
        ]);
        return response()->json(['message' => 'User saved successfully'], 200);
    }
    public function usersget($id){
        echo 'here';
        // $phone_id =User::with('phone_id')->findOrFail($id);
        // if (! $phone_id) {
        //     return response()->json(['error' => 'Participant Not Found'], 404);
        // }
        // return new UserResource($phone_id);
    }
}
