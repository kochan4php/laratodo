<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
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
Route::get('/', [TodoController::class, 'index'])->middleware('auth');
Route::resource('/tasks', TodoController::class)->except(['show', 'create', 'edit'])->middleware('auth');
Route::get('/completed', [TodoController::class, 'completed'])->middleware('auth');
Route::get('/uncompleted', [TodoController::class, 'uncompleted'])->middleware('auth');

// Register Route
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

// Login Route
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login_authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Profile Route
Route::get('/profile/{user:slug}', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/edit/{user:slug}', [ProfileController::class, 'edit_profile'])->middleware('auth');
Route::patch('/profile/{user:slug}', [ProfileController::class, 'update_profile']);
