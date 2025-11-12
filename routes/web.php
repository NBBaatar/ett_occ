<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('landing');
});
Route::get('/post', function () {
    return view('welcome');
});
Route::get('/post/1', function () {
    return view('welcome1');
});
Route::get('/post/2', function () {
    return view('welcome2');
});
Route::get('/post/3', function () {
    return view('welcome3');
});
Route::get('/post/4', function () {
    return view('welcome4');
});
Route::get('/post/5', function () {
    return view('welcome5');
});
Route::get('/post/6', function () {
    return view('welcome6');
});
Route::get('post/search', [IndexController::class, 'search']);
Route::get('post/search1', [IndexController::class, 'search1']);
Route::get('post/search2', [IndexController::class, 'search2']);
Route::get('post/search3', [IndexController::class, 'search3']);
Route::get('post/search4', [IndexController::class, 'search4']);
Route::get('post/search5', [IndexController::class, 'search5']);
Route::get('post/search6', [IndexController::class, 'search6']);
Route::get('/indexed', function () {
    return view('indexed');
});
Route::post('/post/search', [IndexController::class, 'search']);
Route::get('/post/logs', [IndexController::class, 'logs']);
Route::get('/post/logs_error', [IndexController::class, 'logs_error']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
