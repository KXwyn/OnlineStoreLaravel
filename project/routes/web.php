<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountingController;

/*
|-----------------------------------
| Web Routes
|-----------------------------------
|
| Aquí van a quedar registras las rutas web de la tienda online.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 🔹 Rutas del AccountingController
Route::get('/login', [AccountingController::class, 'login']);
Route::get('/logout', [AccountingController::class, 'logout']);
Route::get('/change-password', [AccountingController::class, 'changePassword']);
Route::get('/profile/{id}', [AccountingController::class, 'viewProfile']);
Route::post('/update-user/{id}', [AccountingController::class, 'updateUser']);
