<?php

// it city
use App\Http\Controllers\ItCity\BlogController;
use App\Http\Controllers\ItCity\HomeController as ItCityHomeController;
use App\Http\Controllers\ItCity\PageController as ItCityPageController;
use App\Http\Controllers\ItCity\PC\PcSmartAssembleController;
use App\Http\Controllers\ItCity\SalesSteps\CartController as StoreCartController;
use App\Http\Controllers\ItCity\Office\ServiceController;
use App\Http\Controllers\ItCity\Store\HardwareController;

use App\Http\Controllers\SinglePage\HomeController as SinglePageController;

use Illuminate\Support\Facades\Route;

/***********************************************************************************************************************
 *
 * SECTION #3 : IT CITY ( PC, LAPTOP, ... )
 * */

Route::prefix('it-city')->namespace('ItCity')->group(function () {

    /******************************************************************************************************************
     * main market page
     *
     *  */
    Route::get('/', [ItCityHomeController::class, 'home'])->name('it-city.home');
    Route::get('/error/404', [ItCityHomeController::class, 'error404'])->name('it-city.error.404');


    Route::prefix('pc')->namespace('PC')->group(function () {
        Route::prefix('smart-assemble')->group(function () {
            Route::get('/', [PcSmartAssembleController::class, 'index'])->name('it-city.pc.smart-assemble.index');
            Route::get('/systems/{systemCategory:slug}', [PcSmartAssembleController::class, 'systemTypes'])->name('it-city.pc.smart-assemble.system-types');

        });
    });
    Route::prefix('pages')->group(function () {
        Route::get('/about-us', [ItCityPageController::class, 'aboutUs'])->name('it-city.pages.about-us');
        Route::get('/smart-assemble-system', [ItCityPageController::class, 'smartAssembleSystem'])->name('it-city.pages.smart-assemble-system');
        Route::get('/contact-us', [ItCityPageController::class, 'contactUs'])->name('it-city.pages.contact-us');
        Route::get('/privacy-policy', [ItCityPageController::class, 'privacyPolicy'])->name('it-city.pages.privacy-policy');
        Route::get('/make-appointment', [ItCityPageController::class, 'makeAppointment'])->name('it-city.pages.make-appointment');
        Route::get('/warranty-rules', [ItCityPageController::class, 'warrantyRules'])->name('it-city.pages.warranty-rules');
        Route::get('/faq', [ItCityPageController::class, 'faq'])->name('it-city.pages.faq');
        Route::get('/career', [ItCityPageController::class, 'career'])->name('it-city.pages.career');
        Route::get('/price', [ItCityPageController::class, 'price'])->name('it-city.pages.price');
        Route::get('/installment', [ItCityPageController::class, 'installment'])->name('it-city.pages.installment');
        Route::get('/why-this-shop', [ItCityPageController::class, 'whyThisShop'])->name('it-city.pages.why-this-shop');
        Route::get('/how-to-buy', [ItCityPageController::class, 'howToBuy'])->name('it-city.pages.how-to-buy');
    });

    Route::prefix('service')->namespace('ServiceAndRepair')->group(function () {
        // all parent services
        Route::get('/', [ServiceController::class, 'index'])->name('it-city.service.index');
        // all sub services
        Route::get('/all-services', [ServiceController::class, 'allServices'])->name('it-city.service.all-services');
        // main service children
        Route::get('/{service:slug}', [ServiceController::class, 'service'])->name('it-city.service.service');
        // service details
        Route::get('/detail/{service:slug}', [ServiceController::class, 'serviceDetail'])->name('it-city.service.detail');
    });

    Route::prefix('blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('it-city.blog.index');
        Route::get('/news', [BlogController::class, 'news'])->name('it-city.blog.news');
        Route::get('/post/{post:slug}', [BlogController::class, 'postDetail'])->name('it-city.blog.post.detail');

    });

    Route::prefix('store')->namespace('Store')->group(function () {
        Route::get('/navigation', [HardwareController::class, 'navigation'])->name('it-city.store.navigation');
        Route::namespace('Hardware')->group(function () {
            Route::get('/hardware/{hardware:slug}', [HardwareController::class, 'hardware'])->name('it-city.store.hardware');
            Route::get('/special-sale', [HardwareController::class, 'specialSale'])->name('it-city.store.special-sale');
            Route::get('/{productCategory}/components', [HardwareController::class, 'categoryComponents'])->name('it-city.store.category.components');
        });

        Route::namespace('SalesSteps')->group(function () {
            Route::get('/cart', [StoreCartController::class, 'cart'])->name('it-city.sales-steps.cart');
            Route::get('/checkout', [StoreCartController::class, 'checkout'])->name('it-city.sales-steps.checkout');
        });
    });
});

/***********************************************************************************************************************
 *
 * SECTION #5 : SinglePage ( WORK, PORTFOLIO, RESUME, ... )
 * */

Route::prefix('single-pages')->namespace('SinglePage')->group(function () {
    Route::get('/ultra-profile', [SinglePageController::class, 'ultraProfile'])->name('single-pages.ultra-profile');
    Route::get('/letter', [SinglePageController::class, 'letter'])->name('single-pages.letter');
    Route::get('/app', [SinglePageController::class, 'app'])->name('single-pages.app');
    Route::get('/hydrogen', [SinglePageController::class, 'hydrogen'])->name('single-pages.hydrogen');
    Route::get('/astro-motion', [SinglePageController::class, 'astroMotion'])->name('single-pages.motion');
});

