<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('user.index', [
            'title' => 'My Profile',
            'user' => $user,
        ]);
    }

    public function edit_profile(User $user)
    {
        return view('user.edit', [
            'title' => 'Edit Profile',
            'user' => $user,
        ]);
    }

    public function update_profile(Request $request, User $user)
    {
        $rules = [
            'image' => ['image', 'file', 'max:5120'],
            'name' => ['required', 'min:5'],
        ];

        // If email not changed
        if ($request->email != $user->email) {
            $rules['email'] = ['required', 'unique:users', 'email'];
        }

        // If username not changed 
        if ($request->username != $user->username) {
            $rules['username'] = ['required', 'min:5', 'unique:users'];
        }

        $validated_data = $request->validate($rules);
        $validated_data['slug'] = Str::slug($request->username);

        // If user not upload avatar
        if (!$request->file('avatar')) {
            $validated_data['avatar'] = $user->avatar;
        } else {
            $validated_data['avatar'] = $request->file('avatar')->store('avatar');
            Storage::delete($user->avatar);
        }

        if (User::find($user->id)->update($validated_data)) {
            return Redirect::to('/profile/' . User::find($user->id)->slug)
                ->with('success', 'Update Profile Successfully');
        }
    }
}
