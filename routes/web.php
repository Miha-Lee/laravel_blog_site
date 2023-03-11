<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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

Route::get('/', [BlogController::class, 'index']);

Route::get('/post_blog', [BlogController::class, 'create'])->middleware('auth');

Route::post('/create_blog', [BlogController::class, 'store'])->middleware('auth');

Route::get('/all_blogs', [BlogController::class, 'all']);

Route::get('/blogs/{blog}', [BlogController::class, 'show']);

Route::get('/blogs/edit/delete', [BlogController::class, 'editDelete'])->middleware('auth');

Route::get('/edit_blog/{blog}', [BlogController::class, 'edit'])->middleware('auth');

Route::put('/update_blog/{blog}', [BlogController::class, 'update'])->middleware('auth');

Route::delete('/delete_blog/{blog}', [BlogController::class, 'destroy'])->middleware('auth');

Route::get('/edit_profile', [UserController::class, 'editProfile'])->middleware('auth');

Route::get('/register', [UserController::class, 'register'])->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::post('/login', [UserController::class, 'authenticate']);

Route::put('/user_update', [UserController::class, 'update'])->middleware('auth');
