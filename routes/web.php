<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'Admin'], function() {
        //GIFTS
        Route::get('/gifts', [App\Http\Controllers\GiftsController::class, 'view']);
        Route::get('gifts/delete/{id}', [App\Http\Controllers\GiftsController::class, 'delete']);
        Route::get('/gifts/create', [App\Http\Controllers\GiftsController::class, 'create']);
        Route::get('/gifts/edit/{id}', [App\Http\Controllers\GiftsController::class, 'editGift']);
        Route::post('updateGift', [App\Http\Controllers\GiftsController::class, 'updateGift'])->name('updateGift');
        Route::post('storeGift', [App\Http\Controllers\GiftsController::class, 'save'])->name('storeGift');

        //TYPES
        Route::get('/types', [App\Http\Controllers\TypesController::class, 'view']);
        Route::get('types/delete/{id}', [App\Http\Controllers\TypesController::class, 'delete']);
        Route::get('/types/create', [App\Http\Controllers\TypesController::class, 'create']);
        Route::get('/types/edit/{id}', [App\Http\Controllers\TypesController::class, 'editType']);
        Route::post('updateType', [App\Http\Controllers\TypesController::class, 'updateType'])->name('updateType');
        Route::post('storeType', [App\Http\Controllers\TypesController::class, 'save'])->name('storeType');

        //BOXES
        Route::get('boxes/delete/{id}', [App\Http\Controllers\BoxController::class, 'delete']);
        Route::get('/boxes/create', [App\Http\Controllers\BoxController::class, 'create']);
        Route::get('/boxes/edit/{id}', [App\Http\Controllers\BoxController::class, 'editBox']);
        Route::post('updateBox', [App\Http\Controllers\BoxController::class, 'updateBox'])->name('updateBox');
        Route::post('storeBox', [App\Http\Controllers\BoxController::class, 'save'])->name('storeBox');


        //BOXGIFT
        Route::get('/boxes/addGift/{id}', [App\Http\Controllers\BoxGiftController::class, 'create']);
        Route::post('storeGiftToBox', [App\Http\Controllers\BoxGiftController::class, 'save'])->name('storeGiftToBox');
        Route::get('/deleteGiftFromBox/{gift_id}/{box_id}', [App\Http\Controllers\BoxGiftController::class, 'delete'])->name("deleteGiftFromBox");
    });


    //BOXES
    Route::get('/boxes', [App\Http\Controllers\BoxController::class, 'view']);

    //BOXGIFT

    Route::get('/boxes/boxGifts/{id}', [App\Http\Controllers\BoxGiftController::class, 'view']);

    //APPLIED BOXES
    Route::get('/subscriptions', [App\Http\Controllers\UserController::class, 'view']);
    Route::get('boxes/apply/{id}', [App\Http\Controllers\UserController::class, 'apply']);
    Route::get('boxes/cancel/{id}', [App\Http\Controllers\UserController::class, 'cancel']);

    //logout
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);
});
