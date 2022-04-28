<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('user.index', [
            'title' => 'My Profile',
            'user' => $user,
        ]);
    }

    public function update_profile(Request $request, User $user)
    {
        // dd($request);
        $rules = [
            'image' => ['required', 'image', 'file', 'max:5120'],
            'name' => ['required', 'min:5'],
        ];

        // If email not changed
        if ($request->email != $user->email) {
            $rules['email'] = ['required', 'unique:users', 'email'];
        }

        // If username not changed 
        if ($request->username != $user->username) {
            $rules['username'] = ['required', 'min:5', 'unique:users'];
            $rules['slug'] = Str::slug($rules['username']);
        }

        $validated_data = $request->validate($rules);
    }
}
