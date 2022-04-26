<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
