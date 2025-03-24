<?php

namespace App\Providers;

use Database\Seeders\admin\PermissionsSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        DatabaseSeeder::$seeders[] = PermissionsSeeder::class;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
