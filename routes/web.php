<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvShowsController;
use App\Http\Controllers\ActorsController;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/tvshows', [TvShowsController::class, 'index'])->name('tvshows.index');
Route::get('/tvshows/{tvshow}', [TvShowsController::class, 'show'])->name('tvshows.show');
Route::get('/actors', [ActorsController::class,'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorsController::class,'index']);

Route::get('/actors/{id}', [ActorsController::class,'show'])->name('actors.show');
