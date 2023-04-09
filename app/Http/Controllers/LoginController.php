<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email:dns|',
            'password' => 'required|min:3'
        ]);
        $credentials = $validate;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => '',
        ])/*->onlyInput('email')*/;
    }

    public function logout(Request $request)
    {
        Auth::logout();
            
        $request->session()->invalidate();
            
        $request->session()->regenerateToken();
            
        return redirect('/login');
    }
}
