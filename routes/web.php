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

Route::get('/', [HomePageController::class, 'index']);
Route::get('anime/create', [AnimeController::class, 'create']);
Route::get('/anime/{specificAnime}', [HomePageController::class, 'show']);
Route::post('/anime', [AnimeController::class, 'store']);
Route::get('/anime/{specificAnime}/edit', [AnimeController::class, 'edit']);
Route::put('/anime/{specificAnime}', [AnimeController::class, 'update']);
Route::delete('/anime/{specificAnime}', [AnimeController::class, 'destroy']);
Route::get('/signup', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::get('/logout', [UserController::class, 'logout']);

