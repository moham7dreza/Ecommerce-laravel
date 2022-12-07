<?php

use App\Http\Controllers\Assemble\SmartAssembleController;
use App\Http\Controllers\Auth\Customer\LoginRegisterController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\Market\ProductController as MarketProductController;
use App\Http\Controllers\Customer\SalesProcess\AddressController;
use App\Http\Controllers\Customer\SalesProcess\CartController;
use App\Http\Controllers\Customer\SalesProcess\PaymentController as CustomerPaymentController;
use App\Http\Controllers\Customer\SalesProcess\ProfileCompletionController;
use App\Http\Controllers\Customer\UserProfile\ProfileController;
use Illuminate\Support\Facades\Route;

// customer

/***********************************************************************************************************************
 * login system
 *
 *  */

Route::namespace('Auth')->group(function () {
    Route::get('login-register', [LoginRegisterController::class, 'loginRegisterForm'])->name('auth.customer.login-register-form');
    Route::middleware('throttle:customer-login-register-limiter')->post('/login-register', [LoginRegisterController::class, 'loginRegister'])->name('auth.customer.login-register');
    Route::get('login-confirm/{token}', [LoginRegisterController::class, 'loginConfirmForm'])->name('auth.customer.login-confirm-form');
    Route::middleware('throttle:customer-login-confirm-limiter')->post('/login-confirm/{token}', [LoginRegisterController::class, 'loginConfirm'])->name('auth.customer.login-confirm');
    Route::middleware('throttle:customer-login-resend-otp-limiter')->get('/login-resend-otp/{token}', [LoginRegisterController::class, 'loginResendOtp'])->name('auth.customer.login-resend-otp');
    Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('auth.customer.logout');
});

/***********************************************************************************************************************
 * SECTION #1 : CUSTOMER (SALES PROCESS, PRODUCTS, USER Profile)
 * */
Route::namespace('Customer')->group(function () {

    /******************************************************************************************************************
     * main market page
     *
     *  */
    Route::get('/', [HomeController::class, 'home'])->name('customer.home');
    Route::get('/search', [HomeController::class, 'liveSearch'])->name('customer.search');


    /******************************************************************************************************************
     * sales process pages
     *
     *  */

    Route::namespace('SalesProcess')->group(function () {

        //cart
        Route::get('/cart', [CartController::class, 'cart'])->name('customer.sales-process.cart');
        Route::post('/cart', [CartController::class, 'updateCart'])->name('customer.sales-process.update-cart');
        Route::post('/add-to-cart/{product:slug}', [CartController::class, 'addToCart'])->name('customer.sales-process.add-to-cart');
        Route::get('/remove-from-cart/{cartItem}', [CartController::class, 'removeFromCart'])->name('customer.sales-process.remove-from-cart');

        //profile completion
        Route::get('/profile-completion', [ProfileCompletionController::class, 'profileCompletion'])->name('customer.sales-process.profile-completion');
        Route::post('/profile-completion', [ProfileCompletionController::class, 'update'])->name('customer.sales-process.profile-completion-update');

        Route::middleware('profile.completion')->group(function () {
            //address
            Route::get('/address-and-delivery', [AddressController::class, 'addressAndDelivery'])->name('customer.sales-process.address-and-delivery');
            Route::post('/add-address', [AddressController::class, 'addAddress'])->name('customer.sales-process.add-address');
            Route::put('/update-address/{address}', [AddressController::class, 'updateAddress'])->name('customer.sales-process.update-address');
            Route::get('/get-cities/{province}', [AddressController::class, 'getCities'])->name('customer.sales-process.get-cities');
            Route::post('/choose-address-and-delivery', [AddressController::class, 'chooseAddressAndDelivery'])->name('customer.sales-process.choose-address-and-delivery');

            //payment
            Route::get('/payment', [CustomerPaymentController::class, 'payment'])->name('customer.sales-process.payment');
            Route::post('/copan-discount', [CustomerPaymentController::class, 'copanDiscount'])->name('customer.sales-process.copan-discount');
            Route::post('/payment-submit', [CustomerPaymentController::class, 'paymentSubmit'])->name('customer.sales-process.payment-submit');
            Route::any('/payment-callback/{order}/{onlinePayment}', [CustomerPaymentController::class, 'paymentCallback'])->name('customer.sales-process.payment-call-back');
        });
    });

    /******************************************************************************************************************
     * every thing about products
     *
     *  */
    Route::namespace('Market')->group(function () {

        Route::get('/product/{product:slug}', [MarketProductController::class, 'product'])->name('customer.market.product');
        Route::post('/add-comment/product/{product:slug}', [MarketProductController::class, 'addComment'])->name('customer.market.add-comment');
        Route::get('/add-to-favorite/product/{product:slug}', [MarketProductController::class, 'addToFavorite'])->name('customer.market.add-to-favorite');

        // products of special category
        Route::get('/category/{productCategory:slug}/products', [MarketProductController::class, 'categoryProducts'])->name('customer.market.category.products');
        // Products selected for special sale.
        Route::get('/products/special-sale', [MarketProductController::class, 'bestOffers'])->name('customer.market.products.offers');
        Route::get('/products/query', [MarketProductController::class, 'queryProducts'])->name('customer.market.query-products');
    });

    /******************************************************************************************************************
     * user profile pages
     *
     *  */
    Route::prefix('user')->namespace('UserProfile')->group(function () {
        Route::get('/profile', [ProfileController::class, 'myProfile'])->name('customer.profile.info');
        Route::put('/update', [ProfileController::class, 'updateUserInfo'])->name('customer.profile.update.info');
        Route::get('/orders', [ProfileController::class, 'myOrders'])->name('customer.profile.orders');
        Route::get('/favorites', [ProfileController::class, 'myFavorites'])->name('customer.profile.favorites');
        Route::get('/favorites/delete/{product}', [ProfileController::class, 'deleteFromFavorites'])->name('customer.profile.favorites.delete');
        Route::get('/addresses', [ProfileController::class, 'myAddresses'])->name('customer.profile.addresses');
    });
});

/***********************************************************************************************************************
 *
 *   system smart assemble pages
 *  */

Route::prefix('smart-assemble')->namespace('Assemble')->group(function () {

    // assemble by user
    Route::get('/', [SmartAssembleController::class, 'index'])->name('smart.assemble.index');

    // recommended system categories, types, cpus and configs
    Route::get('/systems/', [SmartAssembleController::class, 'systemCategories'])->name('smart.assemble.categories');
    Route::get('/systems/{systemCategory:slug}', [SmartAssembleController::class, 'systemTypes'])->name('smart.assemble.types');
    Route::get('/systems/{systemCategory:slug}/{systemType:slug}', [SmartAssembleController::class, 'systemCpus'])->name('smart.assemble.cpus');
    Route::get('/systems/{systemCategory:slug}/{systemType:slug}/{systemCpu}', [SmartAssembleController::class, 'systemConfigs'])->name('smart.assemble.configs');

    // recommended system components according to selected system categories, types, gens and configs
    Route::get('/systems/{systemCategory:slug}/{systemType:slug}/{systemCpu}/{systemConfig}/config', [SmartAssembleController::class, 'build'])->name('smart.assemble.build');
    Route::post('/systems/{systemCategory:slug}/{systemType:slug}/{systemCpu}/{systemConfig}/config', [SmartAssembleController::class, 'builder'])->name('smart.assemble.builder');

    // add system components to cart
    Route::post('/systems/{system}/add-to-cart', [SmartAssembleController::class, 'addSystemToCart'])->name('smart.assemble.add-system-to-cart');
});
