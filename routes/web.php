<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\MessagesController;

Route::get('/',[UserController::class, "showCorrectHomepage"]);
//User related routes
Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);
Route::get('/home',[UserController::class,'homeProfile']);
Route::get('/homepagefeed',[UserController::class,'homefeed'])->name('homefeed.show');
Route::post('/logout',[UserController::class, 'logout']);

Route::get('/profile/{user}',[UserController::class,'profile']);
Route::get('profile/{user}/followers', [UserController::class, 'profileFollowers']);
Route::get('profile/{user}/following', [UserController::class, 'profileFollowing']);
Route::get('/profile/{user}/message',[MessagesController::class, 'message']);
//Follow related routes

Route::post('/create-follow/{user}',[FollowController::class, 'createFollow']);
Route::post('/remove-follow/{user}',[FollowController::class, 'removeFollow']);

//search
Route::get('/search',[UserController::class, 'search']);


//messages routes

Route::get('/messages',[MessagesController::class, 'inbox'])->name('messages.create');
Route::get('/messages/{user}', [MessagesController::class, 'show'])->name('messages.show');
Route::post('/messages/{user}',[MessagesController::class, 'store'])->name('messages.store');


Route::get('/verify/email/{token}', [UserController::class, 'verifyEmail'])->name('verify.email');
