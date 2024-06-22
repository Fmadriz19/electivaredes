<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterPersonal;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/hola', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Registro
Route::get('/view', [App\Http\Controllers\RegisterPersonal::class, 'index']);
Route::post('/register', [App\Http\Controllers\RegisterPersonal::class, 'store']);

//Correo verificar
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/verify-account', [App\Http\Controllers\HomeController::class, 'verifyaccount'])->name('verifyAccount');
Route::post('/verifyotp', [App\Http\Controllers\HomeController::class, 'useractivation'])->name('verifyotp');