<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\JadwalFilmController;
use App\Http\Controllers\AntrianController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| ADMIN 
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::resource('films', FilmController::class);
    Route::resource('jadwal_films', JadwalFilmController::class);
    Route::resource('antrians', AntrianController::class);

});