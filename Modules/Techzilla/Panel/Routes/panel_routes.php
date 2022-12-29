<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Panel routes
|--------------------------------------------------------------------------
|
| Here you can see panel routes.
|
*/

Route::group(['prefix' => 'panel-module', 'middleware' => 'auth'], static function ($router) {
    $router->get('/', ['uses' => 'PanelController', 'as' => 'panel.module.index']);
});
