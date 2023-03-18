<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index() {
        return view('form');
    }

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        dd($request->all());
    }
}
