<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
    'verify'=>true
]);
Route::get('/',[UserController::class, "showCorrectHomepage"])->name('home');

Route::get('/homepagefeed',[UserController::class,'homefeed'])->name('homefeed.show')->middleware('verified');

Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/p/create',[PostsController::class,'create']);
Route::post('/p',[PostsController::class,'store']);
Route::get('/p/create',[PostsController::class,'create']);

Route::post('/i',[ProfileController::class,'store']);


Route::get('/profile/{user}',[ProfileController::class,'index']);
Route::get('/profile/{user}/edit',[ProfileController::class,'edit'])->middleware('auth');
Route::patch('/profile/{user}',[ProfileController::class,'update']);

Route::post('/create-follow/{user}',[FollowController::class, 'createFollow']);
Route::post('/remove-follow/{user}',[FollowController::class, 'removeFollow']);


Route::get('/profile/{user}/follower',[ProfileController::class,'profileFollower']);
Route::get('/profile/{user}/following',[ProfileController::class,'profileFollowing']);

//search
Route::get('/search',[UserController::class, 'search']);

