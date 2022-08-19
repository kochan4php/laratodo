<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
  public function index()
  {
    return view('login.index', ['title' => 'Login']);
  }

  public function login_authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required']
    ]);

    $remember_me = $request->has('remember-me') ? true : false;

    if (Auth::attempt($credentials, $remember_me)) {
      $request->session()->regenerate();

      return Redirect::intended('/');
    }

    return back()->with('failed', 'Login Failed! Try Again.');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return Redirect::to('/login');
  }
}
