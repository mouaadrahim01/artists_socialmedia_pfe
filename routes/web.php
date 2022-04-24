<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ProfileController;

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
    return view('front.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');

Route::post('/abonne', [App\Http\Controllers\UserController::class, 'abonne_user'])->name('abonne_user');
Route::post('/abonne-user', [App\Http\Controllers\UserController::class, 'abonne_users'])->name('abonne_users');


Route::get('/editpage/{id}', [App\Http\Controllers\UpdateController::class,'editpage']);
Route::any('/update/{id}', [App\Http\Controllers\UpdateController::class,'update'])->name('update');
Route::any('/update', [App\Http\Controllers\UpdateController::class,'uploadImage'])->name('update_avatar');

Route::post('/abonne', [App\Http\Controllers\UserController::class, 'abonne_user'])->name('abonne_user');

Route::get('publications/create',[PublicationController::class, 'create'])->name('publications.create');
Route::post('publications',[PublicationController::class, 'store'])->name('publications.store');
Route::any('users/view-profile/{id}',[ProfileController::class, 'view_profile'])->name('view.profile');
Route::any('users/liste-amis',[ProfileController::class, 'liste_amis'])->name('view.listeamis');

Route::get('authadmin/index',[PublicationController::class, 'create'])->name('publications.create');

