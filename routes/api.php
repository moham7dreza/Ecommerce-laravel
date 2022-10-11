<?php

use App\Http\Controllers\Api\Market\CommentController;
use App\Http\Controllers\Api\Market\OrderController;
use App\Http\Controllers\Api\Market\ProductController;
use App\Http\Controllers\Api\Market\ReportController;
use App\Http\Controllers\Api\NotificationController;
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

Route::prefix('admin')->group(function () {
    Route::prefix('market')->namespace('Market')->group(function () {
        Route::prefix('product')->group(function () {
            Route::get('/all', [ProductController::class, 'all'])->name('api.market.product.all');
        });
        Route::prefix('order')->group(function () {
            Route::get('/all', [OrderController::class, 'all'])->name('api.market.order.all');
        });
        Route::prefix('comment')->group(function () {
            Route::get('/all', [CommentController::class, 'all'])->name('api.market.comment.all');
        });
        Route::prefix('report')->group(function () {
            Route::get('/weekly-sales', [ReportController::class, 'weeklyTotalSales'])->name('api.market.report.weekly.sales');
            Route::get('/monthly-sales', [ReportController::class, 'monthlyTotalSales'])->name('api.market.report.monthly.sales');
        });
    });
    Route::prefix('notify')->group(function () {
        Route::get('/all', [NotificationController::class, 'all'])->name('api.admin.notify.all');
    });
});
