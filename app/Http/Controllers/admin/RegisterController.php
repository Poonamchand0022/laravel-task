<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([

            "name" => "required",
            "email" => "required",
            "password" => "required",
        ], [

            'name.required' => " name required...",
            'email.required' => "email is required...",
            'password.required' => "password is required..."
        ]);

        $users = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($users);

        auth()->login($user);
        return redirect()->route('dashboard')->withSuccess('User Registered Successfully....');
    }
}

