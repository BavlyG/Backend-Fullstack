<?php

use App\Helpers\GeneralHelper;
use App\Http\Controllers\ChangeStatusController;
use App\Http\Controllers\SelectMenuController;
use App\Http\Controllers\SiteLogoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'admin/site_logo', 'middleware' => GeneralHelper::getDefaultLoggedUserMiddlewares()], function () {
    Route::get('', [SiteLogoController::class, 'show']);
    Route::post('', [SiteLogoController::class, 'update']);
});

Route::group(['prefix' => 'select_menu'], function () {
    Route::get('pages', [SelectMenuController::class, 'pages']);
});
Route::get('public/site_logo', [SiteLogoController::class, 'show']);

Route::patch('change_status/{type}/{id}', [ChangeStatusController::class, 'handle'])->middleware(GeneralHelper::authMiddleware());
