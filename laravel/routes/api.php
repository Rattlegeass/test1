<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Route untuk registrasi pengguna
 * Method: POST
 */
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register'])->name('api.register');

/**
 * Route untuk login pengguna
 * Method: POST
 */
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login'])->name('api.login');

/**
 * Route untuk mendapatkan informasi pengguna yang terautentikasi
 * Method: GET
 * Hanya bisa diakses oleh pengguna yang telah terautentikasi
 */
Route::middleware('auth:api')->get('/user', [App\Http\Controllers\Api\AuthController::class, 'user'])->name('api.user');

/**
 * Route untuk logout pengguna
 * Method: POST
 * Hanya bisa diakses oleh pengguna yang telah terautentikasi
 */
Route::middleware('auth:api')->post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->name('api.logout');
