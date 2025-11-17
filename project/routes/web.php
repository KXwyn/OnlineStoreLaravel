<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', [BlogController::class, 'index'])
    ->middleware('permission:showBlogs');

Route::post('/blogs', [BlogController::class, 'store'])
    ->middleware('permission:createBlogs');

//Rutas de autenticación
    // Mostrar el formulario de registro
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
// Procesar el formulario de registro
Route::post('/register', [LoginController::class, 'register']);

// Mostrar el formulario de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Procesar el formulario de login
Route::post('/login', [LoginController::class, 'login']);

// Cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
