<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profileupdate');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('update_avatar');
Route::get('/editpage/{id}', [App\Http\Controllers\UpdateController::class,'editpage']);
Route::put('/update/{id}', [App\Http\Controllers\UpdateController::class,'update'])->name('update');