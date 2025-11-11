<?php

use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', [BlogController::class, 'index'])
    ->middleware('permission:showBlogs');

Route::post('/blogs', [BlogController::class, 'store'])
    ->middleware('permission:createBlogs');
