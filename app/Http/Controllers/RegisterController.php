<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', ['title' => 'Register']);
    }

    public function register(Request $request)
    {
        // ddd($request);
        $validated_data = $request->validate([
            'name' => ['required', 'min:5'],
            'username' => ['required', 'min:5', 'unique:users'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:8']
        ]);

        $validated_data['password'] = Hash::make($validated_data['password']);
        $validated_data['slug'] = Str::slug($validated_data['username']);

        User::create($validated_data);

        return redirect('/login', 201)->with('success', 'Register Successfully! Please Login');
    }
}
