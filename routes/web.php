<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, "showCorrectHomepage"]);
//User related routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/home', [UserController::class, 'homeProfile']);
Route::get('/homepagefeed', [UserController::class, 'homefeed'])->name('homefeed.show');
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/profile/{user}', [UserController::class, 'profile']);
Route::get('profile/{user:username}/followers', [UserController::class, 'profileFollowers']);
Route::get('profile/{user:username}/following', [UserController::class, 'profileFollowing']);

//Follow related routes

Route::post('/create-follow/{user}', [FollowController::class, 'createFollow']);
Route::post('/remove-follow/{user}', [FollowController::class, 'removeFollow']);

//search
Route::get('/search', [UserController::class, 'search']);

//email verification related route

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


 


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'web', 'signed'])->name('verification.verify');


 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/profile', function () {
//     // Only verified users may access this route...
//     Route::get('/homepagefeed', [UserController::class, 'homefeed'])->name('homefeed.show');
// Route::post('/logout', [UserController::class, 'logout']);

// Route::get('/profile/{user}', [UserController::class, 'profile']);
// Route::get('profile/{user:username}/followers', [UserController::class, 'profileFollowers']);
// Route::get('profile/{user:username}/following', [UserController::class, 'profileFollowing']);

// //Follow related routes

// Route::post('/create-follow/{user}', [FollowController::class, 'createFollow']);
// Route::post('/remove-follow/{user}', [FollowController::class, 'removeFollow']);

// //search
// Route::get('/search', [UserController::class, 'search']);

// })->middleware(['auth', 'verified']);