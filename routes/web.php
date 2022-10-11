<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Todos Route
Route::resource('/tasks', TaskController::class)->except(['show', 'create', 'edit'])->middleware('auth');
Route::controller(TaskController::class)->middleware('auth')->group(function () {
  Route::get('/', 'index');
  Route::get('/completed', 'completed');
  Route::get('/uncompleted', 'uncompleted');
});

// Register Route
Route::controller(RegisterController::class)->group(function () {
  Route::get('/register', 'index')->middleware('guest');
  Route::post('/register', 'register');
});

// Login Route
Route::controller(LoginController::class)->group(function () {
  Route::get('/login', 'index')->name('login')->middleware('guest');
  Route::post('/login', 'login_authenticate');
  Route::post('/logout', 'logout');
});

// Profile Route
Route::controller(ProfileController::class)->middleware('auth')->group(function () {
  Route::get('/profile/{user:slug}', 'index');
  Route::get('/profile/edit/{user:slug}', 'edit_profile');
  Route::patch('/profile/{user:slug}', 'update_profile');
});
