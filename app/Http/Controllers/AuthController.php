<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserConfirmMail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index() {
        return view('Auth.Login');
    }

    public function login()
    {

    }

    public function register_view()
    {
        return view('Auth.Register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $token = Str::random(32);
        $user = [
            'name' => $validated['full_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'token' => $token,
            'status' => 0
        ];

        User::create($user);

        Mail::to($user['email'])->send(new UserConfirmMail($user));

        return redirect(route('login'));
    }

    public function forget_view()
    {
        return view('Auth.Forget');
    }

    public function forget()
    {

    }

    public function verifyEmail($email, $token)
    {   
        User::where(['email' => $email, 'token' => $token])->update(['token' => '', 'status' => 1]);
        return redirect('/all-user');
    }
}
