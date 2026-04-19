<?php

use Illuminate\Support\Facades\Route;



Route::get('/test-admin', function () {
    return "Admin only";
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

use App\Http\Controllers\FilmController;

Route::resource('films', FilmController::class);
