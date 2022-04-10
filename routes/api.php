<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CentersController;
use App\Http\Controllers\ServicesController;


Route::post('login', [AuthController::class, 'authenticate']);
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout']);

// Route::group(['middleware' => ['jwt.verify','role:ROLE_ADMIN']], function() {
    Route::resource('users', UserController::class);
    Route::resource('centers', CentersController::class);
// });

Route::get('services', [ServicesController::class, 'index']);
Route::post('services', [ServicesController::class, 'store']);
Route::put('services/{id}', [ServicesController::class, 'update']);
Route::delete('services/{id}', [ServicesController::class, 'destroy']);