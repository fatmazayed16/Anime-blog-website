<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\status;
use App\Http\Controllers\Admin\posts;
use App\Http\Controllers\Admin\users;
use App\Http\Controllers\Admin\plans;

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

Route::group(['as' => 'admin.'], function() {

  Route::group(['middleware' => 'auth:admin'], function() {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/status', [status::class , 'st'])->name('status');
    Route::get('/posts', [posts::class , 'getdata'])->name('posts');
    Route::post('/posts', [posts::class , 'update'])->name('posts');
    Route::get('/addpost', [posts::class , 'gd'])->name('addposts');
    Route::post('/addpost', [posts::class , 'add'])->name('addposts');
    Route::get('/editpost', [posts::class , 'ed'])->name('editposts');
    Route::post('/editpost', [posts::class , 'edit'])->name('editposts');
    Route::get('/vposts', [posts::class , 'getdatav'])->name('vposts');
    Route::post('/vposts', [posts::class , 'updatev'])->name('vposts');
    Route::get('/user', [users::class , 'getdata'])->name('user');
    Route::post('/user', [users::class , 'update'])->name('user');
	//   Route::get('/plan', [plans::class , 'getdata'])->name('plan');
  //   Route::post('/plan', [plans::class , 'update'])->name('plan');

  });

  Route::group(['middleware' => 'guest:admin'], function() {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

  });

});