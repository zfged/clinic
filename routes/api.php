<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CentersController;


Route::post('login', [AuthController::class, 'authenticate']);
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout']);

// Route::group(['middleware' => ['jwt.verify','role:ROLE_ADMIN']], function() {
    Route::resource('users', UserController::class);
    Route::resource('centers', CentersController::class);
// });