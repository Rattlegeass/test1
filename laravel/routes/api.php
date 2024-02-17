<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

/**
 * route "/user"
 * @method "GET"
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * route "/logout"
 * @method "POST"
 */
Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);