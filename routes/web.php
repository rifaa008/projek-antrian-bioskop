<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['isAdmin'])->group(function () {
    Route::get('/test-admin', function () {
        return "Admin only";
    });
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});