<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'remember' => ['boolean'],
        ]);

        $credentials = [
            'username' => $request->post('username'),
            'password' => $request->post('password'),
        ];

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'username' => 'Invalid username and password combination.'
            ]);
        }

        // user already has logged in, redirect to homepage
        return redirect()->route('home');

    }
}
