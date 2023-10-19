<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Users;
use App\Http\controllers\profile;
use App\Http\controllers\UserProfile;
use App\Http\controllers\MyComments;
use App\Http\Controllers\postsController;
use App\Http\Controllers\commentController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\plans;



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



Route::prefix('user')->middleware(['auth','verified'])->name('user.')->group(function () {  
    Route::get('/edit',[users::class , 'getdata'])->name('edit');
    Route::post('/edit',[users::class , 'postdata'])->name('edit');
    Route::get('/prof', [UserProfile::class , 'profiledata'])->name('profile') ;
    Route::get('/mycomments', [MyComments::class , 'commentdata'])->name('comments') ;
    
Route::get('/plan',[plans::class,'index'])->name('plan');
Route::post('/plan',[plans::class,'update'])->name('plan');
   // Route::get('/mycomments', function(){
    //    return view('user.mycomments');
   // });

    Route::get('/change_password',[profile::class , 'index'])->name('updadte_password');
    Route::post('/change_password',[profile::class , 'update_password'])->name('update_password');

});

Route::get('/', function () {
    dd(\Illuminate\Support\Facades\Auth::user());
})->middleware(['auth', 'verified']);



Route::get('/',[postsController::class , 'index']);
Route::get('/Movies',[postsController::class , 'indexmo']);
Route::get('/Manga',[postsController::class , 'indexma']);


Route::get('/PostPage/{id}',[postsController::class , 'show']);

Route::get('/create',[postsController::class , 'create'])->middleware(['check']);
Route::post('/create',[postsController::class , 'store'])->middleware(['check']);  

Route::post('/comment',[commentController::class , 'show']);
Route::post('/comment',[commentController::class , 'store'])->name('ahmed');