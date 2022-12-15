<?php

namespace App\Providers;

use App\Models\Content\Comment;
use App\Models\Content\Menu;
use App\Models\Content\PostCategory;
use App\Models\Market\CartItem;
use App\Models\Market\ProductCategory;
use App\Models\Notification;
use App\Models\Setting\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // *************************************************************************************************************
        // admin panels
        view()->composer(['admin.layouts.header', 'panel.layouts.header', 'adminto.layouts.navbar'], function ($view) {
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

        view()->composer(['customer.layouts.head-tag', 'customer.layouts.footer'], function ($view) {
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
        view()->composer(['digital-world.layouts.header', 'digital-world.layouts.footer'], function ($view) {
            $view->with('menus', Menu::query()->where([['status', 1], ['location', 3], ['parent_id', NULL]])->orderBy('created_at')->get());
            $view->with('setting', Setting::query()->find(3));
            $view->with('categories', PostCategory::query()->where([['status', 1], ['parent_id', NULL]])->orderBy('created_at')->get());
            $view->with('notifications', Notification::query()->where([['read_at', null], ['notifiable_id', auth()->id()]])->get());
            $view->with('unseenComments', Comment::query()->where([['seen', 0], ['commentable_type', 'App\Models\Content\Post'], ['author_id', auth()->id()]])->get());
        });
        view()->composer('digital-world.layouts.head-tag', function ($view) {
            $view->with('setting', Setting::query()->find(3));
        });
    }
}
