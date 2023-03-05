<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;

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

Route::get('/',[UserController::class, "showCorrectHomepage"]);
//User related routes
Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);
Route::get('/home',[UserController::class,'homeProfile']);
Route::get('/homepagefeed',[UserController::class,'homefeed'])->name('homefeed.show');
Route::post('/logout',[UserController::class, 'logout']);

Route::get('/profile/{user}',[UserController::class,'profile']);

//Follow related routes

Route::post('/create-follow/{user}',[FollowController::class, 'createFollow']);
Route::post('/remove-follow/{user}',[FollowController::class, 'removefollow']);
