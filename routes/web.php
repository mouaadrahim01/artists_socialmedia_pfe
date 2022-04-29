<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\authadmin\IndexController;
use App\Http\Controllers\authadmin\PubController;
use App\Http\Controllers\authadmin\ProfController;
use App\Http\Controllers\authadmin\CategorieController;
use App\Http\Controllers\MessageController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('/abonne', [App\Http\Controllers\UserController::class, 'abonne_user'])->name('abonne_user')->middleware('auth');
Route::post('/abonne-user', [App\Http\Controllers\UserController::class, 'abonne_users'])->name('abonne_users')->middleware('auth');


Route::get('/editpage/{id}', [App\Http\Controllers\UpdateController::class,'editpage'])->middleware('auth');
Route::any('/update/{id}', [App\Http\Controllers\UpdateController::class,'update'])->name('update')->middleware('auth');
Route::any('/update', [App\Http\Controllers\UpdateController::class,'uploadImage'])->name('update_avatar')->middleware('auth');

Route::get('publications/create',[PublicationController::class, 'create'])->name('publications.create')->middleware('auth');
Route::post('publications',[PublicationController::class, 'store'])->name('publications.store')->middleware('auth');
Route::any('publications/edit/{id}', [App\Http\Controllers\PublicationController::class,'edit'])->middleware('auth');
Route::any('publications/{id}', [App\Http\Controllers\PublicationController::class,'update'])->middleware('auth');
Route::any('publications/delet/{id}', [App\Http\Controllers\PublicationController::class,'destroy'])->middleware('auth');
Route::post('/like-publication', [App\Http\Controllers\PublicationController::class, 'like_pub'])->name('like_publication')->middleware('auth');


Route::any('users/view-profile/{id}',[ProfileController::class, 'view_profile'])->name('view.profile');
Route::any('users/liste-amis',[ProfileController::class, 'liste_amis'])->name('view.listeamis');

Route::any('message/{id?}',[MessageController::class, 'index'])->name('message')->middleware('auth');
Route::post('message/send',[MessageController::class, 'send'])->name('message.send')->middleware('auth');

// Route::group(['middleware'=>'auth'],function(){

    
// });

Route::group(['namespace' => 'AuthAdmin', 'prefix'=>'authadmin', 'middleware'=>'auth.admin'],function(){

    
});

Route::get('authadmin/login',[IndexController::class, 'login'])->name('authadmin.login');
Route::get('authadmin/index',[IndexController::class, 'index'])->name('authadmin.index');
Route::get('authadmin/Publication',[PubController::class, 'index'])->name('authadmin.pub.index');
Route::get('authadmin/User',[ProfController::class, 'index'])->name('authadmin.profile.index');
Route::get('authadmin/Categorie',[CategorieController::class, 'index'])->name('authadmin.categorie.index');
Route::post('authadmin/Categorie',[CategorieController::class, 'store'])->name('authadmin.Categorie.store');

Route::any('authadmin/Categorie/delet/{id}',[CategorieController::class, 'destroy']);
Route::any('authadmin/Publication/delet/{id}',[PubController::class, 'destroy']);
Route::any('authadmin/User/delet/{id}',[ProfController::class, 'destroy']);



    