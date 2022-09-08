<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:40', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = new User();
        $user->first_name = $request->post('first_name');
        $user->last_name = $request->post('last_name');
        $user->email = $request->post('email');
        $user->username = $request->post('username');
        $user->password = Hash::make( $request->post('password') );

        $user->save();

        // Login user after register
        Auth::login($user);

        return redirect()->route('home');
    }
}
