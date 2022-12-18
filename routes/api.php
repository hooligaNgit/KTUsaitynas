<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::middleware('auth:api')->group(function() {



    Route::apiResource('/gifts', \App\Http\Controllers\GiftsController::class);
    Route::apiResource('/boxes', \App\Http\Controllers\BoxController::class);
    Route::apiResource('/types', \App\Http\Controllers\TypesController::class);
    Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
//});
Route::apiResource('/users', \App\Http\Controllers\UserController::class);
Route::post('/register', [\App\Http\Controllers\UserController::class, 'register'])->name('apiRegister');
Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('apiLogin');
Route::get('/login', [\App\Http\Controllers\UserController::class, 'login']);
