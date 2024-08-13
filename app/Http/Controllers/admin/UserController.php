<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        return redirect()->route('user.index')->withSuccess('User Created Successfully....');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([

            "name" => "required",
            "email" => "required",
        ], [

            'name.required' => " name required...",
            'email.required' => "email is required...",
        ]);

        if ($request->password) {
            $users = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            $user = User::where('id', $id)->update($users);

            return redirect()->route('user.index');
        } else {
            $users = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            $user = User::where('id', $id)->update($users);

            return redirect()->route('user.index')->withSuccess('User Updated Successfully....');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->delete();

        return redirect()->route('user.index')->withSuccess('User Deleted Successfully....');
    }
}
