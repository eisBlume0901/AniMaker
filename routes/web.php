<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomePageController::class, 'index'])->name('index');
Route::get('/anime/create', [AnimeController::class, 'create'])->name('create_anime');
Route::get('/anime/{specificAnime}', [HomePageController::class, 'show'])->name('show');
Route::post('/anime', [AnimeController::class, 'store'])->name('store_anime');
Route::get('/anime/{specificAnime}/edit', [AnimeController::class, 'edit'])->name('edit');
Route::put('/anime/{specificAnime}', [AnimeController::class, 'update'])->name('update');
Route::delete('/anime/{specificAnime}', [AnimeController::class, 'destroy'])->name('destroy');
Route::get('/signup', [UserController::class, 'create'])->name('create_user');
Route::post('/users', [UserController::class, 'store'])->name('store_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// For testing purposes
Route::get('/animes/manage', [HomePageController::class, 'manageAnimes'])->name('manage_anime');
