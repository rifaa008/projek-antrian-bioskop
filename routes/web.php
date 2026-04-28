<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\JadwalFilmController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\AdminController;

// AUTH
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ADMIN 
Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'dashboard']);

    Route::resource('films', FilmController::class);
    Route::resource('jadwal_films', JadwalFilmController::class);
    Route::resource('antrians', AntrianController::class);

});


// USER
Route::get('/user', [UserPageController::class, 'home']);
Route::get('/user/films', [UserPageController::class, 'films']);
Route::get('/user/jadwal', [UserPageController::class, 'jadwal']);
Route::get('/user/antrian', [UserPageController::class, 'antrian']);

Route::get('/user/ambil', [UserPageController::class, 'formAntrian']);
Route::post('/ambil-antrian', [UserPageController::class, 'ambilAntrian']);