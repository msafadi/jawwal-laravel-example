<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create($guard)
    {
        if ($guard !== 'web' && $guard !== 'admin') {
            abort(404);
        }

        return view('auth.login', [
            'guard' => $guard,
        ]);
    }

    public function store(Request $request, $guard)
    {
        if ($guard !== 'web' && $guard !== 'admin') {
            abort(404);
        }

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember' => ['boolean'],
        ]);

        $credentials = [
            'email' => $request->post('email'),
            'password' => $request->post('password'),
        ];
        $remember = $request->boolean('remember'); // return input "remember" as boolean value

        if (!Auth::guard($guard)->attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid username and password combination.'
            ]);
        }

        // user already has logged in, redirect to intended page or homepage
        return redirect()->intended( route('home') );

    }

    // Logout Action
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $guard = $user instanceof Admin? 'admin' : 'web';
        
        Auth::guard($guard)->logout();
        $request->session()->regenerateToken(); // Regenerate new CSRF Token
        $request->session()->invalidate(); // Regenerate session ID

        return redirect()->route('home');

    }
}
