<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/1', function () {
    return view('welcome1');
});
Route::get('/2', function () {
    return view('welcome2');
});
Route::get('/3', function () {
    return view('welcome3');
});
Route::get('/4', function () {
    return view('welcome4');
});
Route::get('/5', function () {
    return view('welcome5');
});
Route::get('/6', function () {
    return view('welcome6');
});
Route::get('search', [IndexController::class, 'search']);
Route::get('search1', [IndexController::class, 'search1']);
Route::get('search2', [IndexController::class, 'search2']);
Route::get('search3', [IndexController::class, 'search3']);
Route::get('search4', [IndexController::class, 'search4']);
Route::get('search5', [IndexController::class, 'search5']);
Route::get('search6', [IndexController::class, 'search6']);
Route::get('/indexed', function () {
    return view('indexed');
});
Route::post('search', [IndexController::class, 'search']);
Route::get('logs', [IndexController::class, 'logs']);
Route::get('logs_error', [IndexController::class, 'logs_error']);
