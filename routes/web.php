<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [AppController::class, 'app']);
Route::get('/app', [AppController::class, 'app']);
Route::get('/app/{any}', [AppController::class, 'app'])->where('any', '.*');