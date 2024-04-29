<?php

use App\Http\Controllers\AdminController;
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
Route::fallback([HomePageController::class, 'fallback'])->name('fallback');
Route::get('/anime/{specificAnime}', [HomePageController::class, 'show'])->name('show');


Route::get('/signup', [UserController::class, 'create'])->name('create_user');
Route::post('/users', [UserController::class, 'store'])->name('store_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('animes/top-rated', [HomePageController::class, 'showTopAnimes'])->name('show_top_animes');



// Still not sure if I should put both the role of user and admin in the same middleware
Route::middleware(['auth'])->group(function () {

    Route::get('/users/anime/list', [UserController::class, 'showAnimeList'])->name('user_anime_list');

    Route::get('/anime/{specificAnime}/review', [UserController::class, 'createReview'])->name('create_review');
    Route::post('/anime/{specificAnime}/review/store', [UserController::class, 'storeReview'])->name('store_review');
// Route::get('/anime/{specificAnime}/review/{specificReview}/edit', [UserController::class, 'editReview'])->name('edit_review');
// Route::put('/anime/{specificAnime}/review/{specificReview}', [UserController::class, 'updateReview'])->name('update_review');
// Route::delete('/anime/{specificAnime}/review/{specificReview}', [UserController::class, 'destroyReview'])->name('destroy_review');
});


// If the route name is the same, it would have a conflict called Route Collision
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/create/anime', [AnimeController::class, 'create'])->name('create_anime');
    Route::post('/store/anime', [AnimeController::class, 'store'])->name('store_anime');
    Route::get('/edit/anime/{animeToBeEdited}', [AnimeController::class, 'edit'])->name('edit_anime');
    Route::put('/update/anime/{animeToBeUpdated}', [AnimeController::class, 'update'])->name('update_anime');
    Route::delete('/anime/{animeToBeDestroyed}', [AnimeController::class, 'destroy'])->name('destroy_anime');


    Route::get('/manage/animes', [AdminController::class, 'manageAnimes'])->name('manage_animes');
    Route::get('/manage/users', [AdminController::class,'manageUsers'])->name('manage_users');
    Route::get('/edit/user/{specificUser}', [AdminController::class, 'edit'])->name('edit_user');
    Route::put('/user/{specificUser}', [AdminController::class, 'update'])->name('update_user');
    Route::delete('/user/{specificUser}', [AdminController::class, 'destroy'])->name('destroy_user');
});
