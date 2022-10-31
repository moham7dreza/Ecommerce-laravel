<?php

namespace App\Providers;

use App\Models\Content\Menu;
use App\Models\Content\PostCategory;
use App\Models\Market\CartItem;
use App\Models\Market\ProductCategory;
use App\Models\Notification;
use App\Models\Content\Comment;
use App\Models\Setting\Setting;
use App\Models\SmartAssemble\SystemMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // *************************************************************************************************************
        // admin
        view()->composer('admin.layouts.header', function ($view) {
            $view->with('unseenComments', Comment::query()->where('seen', 0)->get());
            $view->with('notifications', Notification::query()->where('read_at', null)->get());
        });

        // *************************************************************************************************************
        // new admin panel
        view()->composer('panel.layouts.header', function ($view) {
            $view->with('unseenComments', Comment::query()->where('seen', 0)->get());
            $view->with('notifications', Notification::query()->where('read_at', null)->get());
        });


        // *************************************************************************************************************
        // customer section
        view()->composer('customer.layouts.header', function ($view) {
            if (Auth::check()) {
                $cartItems = CartItem::query()->where('user_id', Auth::user()->id)->get();
                $view->with('cartItems', $cartItems);
            }
            $view->with('menus', Menu::query()->where([['status', 1], ['location', 1], ['parent_id', NULL]])->orderBy('created_at')->get());
            $view->with('categories', ProductCategory::query()->where([['status', 1], ['show_in_menu', 1], ['parent_id', NULL]])->orderBy('created_at')->get());
            $view->with('logo', Setting::query()->where('id', 1)->pluck('logo')->first());
        });

        view()->composer('customer.layouts.head-tag', function ($view) {
            $view->with('setting', Setting::query()->first());
        });

        view()->composer('customer.layouts.footer', function ($view) {
            $view->with('setting', Setting::query()->first());
        });

        // *************************************************************************************************************
        // it-city section
        view()->composer('it-city.layouts.header', function ($view) {
            $view->with('menus', Menu::query()->where([['status', 1], ['location', 2], ['parent_id', NULL]])->orderBy('created_at')->get());
            $view->with('settings', Setting::query()->find(2));
        });
        view()->composer('it-city.layouts.head-tag', function ($view) {
            $view->with('settings', Setting::query()->find(2));
        });

        // *************************************************************************************************************
        // digital-world section
        view()->composer('digital-world.layouts.header', function ($view) {
            $view->with('menus', Menu::query()->where([['status', 1], ['location', 3], ['parent_id', NULL]])->orderBy('created_at')->get());
            $view->with('settings', Setting::query()->find(3));
            $view->with('categories', PostCategory::query()->where([['status', 1], ['parent_id', NULL]])->orderBy('created_at')->get());
        });
        view()->composer('digital-world.layouts.head-tag', function ($view) {
            $view->with('settings', Setting::query()->find(3));
        });
    }
}
