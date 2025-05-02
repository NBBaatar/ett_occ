<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('search', [IndexController::class, 'search']);
Route::get('/indexed', function () {
    return view('indexed');
});
Route::post('search', [IndexController::class, 'search']);
Route::get('logs', [IndexController::class, 'logs']);
Route::get('logs_error', [IndexController::class, 'logs_error']);
