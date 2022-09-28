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
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('market')->namespace('Market')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/all', [\App\Http\Controllers\Api\Market\ProductController::class, 'all'])->name('api.market.product.all');
    });
    Route::prefix('order')->group(function () {
        Route::get('/all', [\App\Http\Controllers\Api\Market\OrderController::class, 'all'])->name('api.market.order.all');
    });
    Route::prefix('comment')->group(function () {
        Route::get('/all', [\App\Http\Controllers\Api\Market\CommentController::class, 'all'])->name('api.market.comment.all');
    });
});
Route::prefix('notification')->group(function () {
    Route::get('/all', [\App\Http\Controllers\Api\NotificationController::class, 'all'])->name('api.notification.all');
});
