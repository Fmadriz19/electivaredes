<?php

use App\Http\Controllers\AuthUsuarios;
use Illuminate\Support\Facades\Route;

route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthUsuarios::class, 'index'])->name('register');
Route::post('/register', [AuthUsuarios::class, 'store']);

Route::get('/login', [AuthUsuarios::class, 'login'])->name('login');
Route::post('/login', [AuthUsuarios::class, 'authenticate']);

Route::get('/home', [AuthUsuarios::class, 'inicio'])->name('inicio')->middleware('auth');

//Correo verificar
Route::get('/verify-account', [App\Http\Controllers\HomeController::class, 'verifyaccount'])->name('verifyAccount');
Route::post('/verifyotp', [App\Http\Controllers\HomeController::class, 'useractivation'])->name('verifyotp');
Route::post('/logout', [AuthUsuarios::class, 'destroy'])->name('logout');