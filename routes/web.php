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
Route::post('/anime/store', [AnimeController::class, 'store'])->name('store_anime');
Route::get('/anime/{specificAnime}/edit', [AnimeController::class, 'edit'])->name('edit');
Route::put('/anime/{specificAnime}', [AnimeController::class, 'update'])->name('update');
Route::delete('/anime/{specificAnime}', [AnimeController::class, 'destroy'])->name('destroy');
Route::get('/signup', [UserController::class, 'create'])->name('create_user');
Route::post('/users', [UserController::class, 'store'])->name('store_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::fallback([HomePageController::class, 'fallback'])->name('fallback');
Route::get('animes/top-rated', [HomePageController::class, 'showTopAnimes'])->name('show_top_animes');

Route::get('/users/anime/list', [UserController::class, 'showAnimeList'])->name('user_anime_list');

// Route for user review forms, still not sure if this is the best way to do it
Route::get('/anime/{specificAnime}/review', [UserController::class, 'createReview'])->name('create_review');
Route::post('/anime/{specificAnime}/review/store', [UserController::class, 'storeReview'])->name('store_review');

// For testing purposes for displaying lists of anime in tabular format
Route::get('/animes/manage', [HomePageController::class, 'manageAnimes'])->name('manage_anime');
