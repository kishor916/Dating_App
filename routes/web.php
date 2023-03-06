<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::get('/', [UserController::class,'showCorrectHomepage']);

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/home', [UserController::class,'home'])->name('home.show');
Route::get('/homefeed', [UserController::class,'homefeed'])->name('homefeed.show');
Route::get('/profile', [UserController::class,'profile'])->name('profile.show');
