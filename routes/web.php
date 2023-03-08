<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;


Route::get('/',[UserController::class, "showCorrectHomepage"]);
//User related routes
Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);
Route::get('/home',[UserController::class,'homeProfile']);
Route::get('/homepagefeed',[UserController::class,'homefeed'])->name('homefeed.show');
Route::post('/logout',[UserController::class, 'logout']);

Route::get('/profile/{user}',[UserController::class,'profile']);
Route::get('profile/{user:username}/followers', [UserController::class, 'profileFollowers']);
Route::get('profile/{user:username}/following', [UserController::class, 'profileFollowing']);

//Follow related routes

Route::post('/create-follow/{user}',[FollowController::class, 'createFollow']);
Route::post('/remove-follow/{user}',[FollowController::class, 'removeFollow']);
