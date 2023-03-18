<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('Pages.createUser');
    }

    public function allUser()
    {
        $users = User::all();
        return view('Pages.allUser')->with('users', $users);
    }

    public function saveUser(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = [
            'name' => $validated['full_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'token' => '',
            'status' => 1
        ];

        User::create($user);

        return redirect()->back();
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/all-user');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('Pages.EditUser')->with('edit_user', $user);
    }

    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $user = User::find($id);
        $user->update(['name' => $validated['full_name'], 'email' => $validated['email']]);

        return redirect('/all-user');
    }

    public function logout() 
    {
        Session::flush();
        return redirect(route('login'));
    }
}
