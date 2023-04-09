<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    // cara1
    // public function store()
    // {
    //     return request()->all();
    // }
    // cara2
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], // unix pada tabel users
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => 'required|min:3|max:255'
        ]);
        // bcrypt
        // $validate['password'] = bcrypt($validate['password']);
        // hash
        $validate['password'] = Hash::make($validate['password']);
        user::create($validate);
        // $request->session()->flash('success', 'Akun berhasil dibuat');
        // return redirect('/login');
        return redirect('/login')->with('success', 'Akun berhasil dibuat');
    }
}