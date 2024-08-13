<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('admin.login.index');
    }

    public function loginPost(Request $request) {

        $request->validate([

            "email" => "required",
            "password" => "required",
        ], [

            'email.required' => "email is required...",
            'password.required' => "password is required..."
        ]);

        $loginData = $request->only('email', 'password');

        if (Auth::attempt($loginData)) {
            return redirect()->route('dashboard')->withSuccess('User Login successfully..');
        } else {
            return redirect()->route('login')->withErrors('message', 'Login First');
        }
    }

    public function signOut(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
}
