<?php

use Illuminate\Http\Request;
use Modules\Order\Http\Controllers\OrderController;
use Modules\Rest\Http\Controllers\RestController;

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

Route::group(['prefix' => 'rests'], function(){
    Route::get('', [RestController::class, 'index']);
    Route::post('', [RestController::class, 'store']);
    Route::delete('{rest}', [RestController::class, 'destroy']);
    Route::post('{rest}/order', [OrderController::class, 'store'])->middleware('auth:sanctum');
});
