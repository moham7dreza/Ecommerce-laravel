<?php

use App\Http\Controllers\Assemble\SmartAssembleController;
use Illuminate\Support\Facades\Route;

Route::prefix('smart-assemble')->namespace('Assemble')->group(function () {
    // assemble by user
    Route::get('/', [SmartAssembleController::class, 'index'])->name('smart.assemble.index');
    // recommended system categories, types, cpus and configs
    Route::get('/systems/', [SmartAssembleController::class, 'systemCategories'])->name('smart.assemble.categories');
    Route::get('/systems/{systemCategory:slug}', [SmartAssembleController::class, 'systemTypes'])->name('smart.assemble.types');
    Route::get('/systems/{systemCategory:slug}/{systemType:slug}', [SmartAssembleController::class, 'systemGens'])->name('smart.assemble.cpus');
    Route::get('/systems/{systemCategory:slug}/{systemType:slug}/{systemCpu:slug}', [SmartAssembleController::class, 'systemConfigs'])->name('smart.assemble.configs');
    // recommended system components according to selected system categories, types, gens and configs
    Route::get('/systems/{systemCategory:slug}/{systemType:slug}/{systemCpu:slug}/{systemConfig:slug}/config/{system}', [SmartAssembleController::class, 'offeredSystems'])->name('smart.assemble.offered.systems');
});
