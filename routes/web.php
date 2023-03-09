<?php

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

Route::get('/',[UserController::class, "showCorrectHomepage"])->name('home');

Route::get('/homepagefeed',[UserController::class,'homefeed'])->name('homefeed.show');

Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/p',[PostsController::class,'store'])->middleware('auth');
Route::get('/p/create',[PostsController::class,'create'])->middleware('auth');

Route::post('/i',[ProfileController::class,'store']);


Route::get('/profile/{user}',[ProfileController::class,'index'])->name('profile.show');
Route::get('/profile/{user}/edit',[ProfileController::class,'edit'])->name('profile.edit')->middleware('auth');
Route::patch('/profile/{user}',[ProfileController::class,'update'])->name('profile.update')->middleware('auth');

