<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;


Route::post('/auth/login', [Api\AuthController::class, 'login']);

Route::resource('transactions', Api\TransactionController::class);
Route::get('users', Api\UController::class);


Route::middleware('auth:sanctum')->group(function () {

    Route::post('/auth/logout', [Api\AuthController::class, 'logout']);
    Route::post('/auth/user', [Api\AuthController::class, 'user']);
    
});
