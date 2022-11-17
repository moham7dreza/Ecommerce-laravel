<?php

use App\Http\Controllers\Admin\Report\ChartController;
use App\Http\Controllers\Admin\SmartAssemble\SystemBrandController;
use App\Http\Controllers\Admin\SmartAssemble\SystemCategoryController;
use App\Http\Controllers\Admin\SmartAssemble\SystemClassGalleryController;
use App\Http\Controllers\Admin\SmartAssemble\SystemConfigController;
use App\Http\Controllers\Admin\SmartAssemble\SystemController;
use App\Http\Controllers\Admin\SmartAssemble\SystemCpuController;
use App\Http\Controllers\Admin\SmartAssemble\SystemGalleryController;
use App\Http\Controllers\Admin\SmartAssemble\SystemMenuController;
use App\Http\Controllers\Admin\SmartAssemble\SystemTypeController;
use App\Http\Controllers\Admin\TelegramBot\SendController;
use App\Http\Controllers\Admin\user\RoleController;
use App\Http\Controllers\Admin\notify\SMSController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\content\PageController;
use App\Http\Controllers\Admin\content\PostController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\Market\StoreController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\notify\EmailController;
use App\Http\Controllers\Admin\ticket\TicketController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\GalleryController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\DiscountController;
use App\Http\Controllers\Admin\Market\PropertyController;
use App\Http\Controllers\Admin\setting\SettingController;
use App\Http\Controllers\Admin\user\PermissionController;
use App\Http\Controllers\Admin\Market\GuaranteeController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Market\ProductColorController;
use App\Http\Controllers\Admin\Market\PropertyValueController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketPriorityController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;

// new panel namespaces
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\TelegramBot\SendController as BotSendController;
use App\Http\Controllers\Panel\Report\ChartController as PanelChartController;

//adminto panel
use App\Http\Controllers\Dashboard\AdminToController;
use App\Http\Controllers\Dashboard\CategoryController as PostCategoryController;
use App\Http\Controllers\Dashboard\PostController as PostsController;
use App\Http\Controllers\Dashboard\MenuController as PostMenuController;
use App\Http\Controllers\Dashboard\BannerController as PostBannerController;
use App\Http\Controllers\Dashboard\CommentController as PostCommentController;
use App\Http\Controllers\Dashboard\UserController as PostUserController;
use App\Http\Controllers\Dashboard\RoleController as PostRoleController;
use App\Http\Controllers\Dashboard\SettingController as PostSettingController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin panel Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'admin.check'])->namespace('Admin')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    /*******************************************************************************************************************
     *  telegram bot
     *
     * */
    Route::prefix('telegram-bot')->namespace('TelegramBot')->group(function () {
        Route::prefix('send')->group(function () {
            Route::get('/', [SendController::class, 'message'])->name('admin.bot.message');
            Route::post('/message', [SendController::class, 'sendMessage'])->name('admin.bot.send.message');
        });
    });

    /*******************************************************************************************************************
     *  system usage reports
     *
     * */
    Route::prefix('reports')->namespace('Report')->group(function () {
        Route::prefix('charts')->group(function () {
            Route::get('sales', [ChartController::class, 'salesChart'])->name('admin.reports.charts.sales');
        });
    });

    /*******************************************************************************************************************
     *  smart assemble system
     *
     * */
    Route::prefix('smart-assemble')->namespace('SmartAssemble')->group(function () {
        //brand
        Route::prefix('brand')->group(function () {
            Route::get('/', [SystemBrandController::class, 'index'])->name('admin.smart-assemble.brand.index');
            Route::get('/create', [SystemBrandController::class, 'create'])->name('admin.smart-assemble.brand.create');
            Route::post('/store', [SystemBrandController::class, 'store'])->name('admin.smart-assemble.brand.store');
            Route::get('/edit/{systemBrand}', [SystemBrandController::class, 'edit'])->name('admin.smart-assemble.brand.edit');
            Route::put('/update/{systemBrand}', [SystemBrandController::class, 'update'])->name('admin.smart-assemble.brand.update');
            Route::delete('/destroy/{systemBrand}', [SystemBrandController::class, 'destroy'])->name('admin.smart-assemble.brand.destroy');
        });

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [SystemCategoryController::class, 'index'])->name('admin.smart-assemble.category.index');
            Route::get('/create', [SystemCategoryController::class, 'create'])->name('admin.smart-assemble.category.create');
            Route::post('/store', [SystemCategoryController::class, 'store'])->name('admin.smart-assemble.category.store');
            Route::get('/edit/{systemCategory}', [SystemCategoryController::class, 'edit'])->name('admin.smart-assemble.category.edit');
            Route::put('/update/{systemCategory}', [SystemCategoryController::class, 'update'])->name('admin.smart-assemble.category.update');
            Route::delete('/destroy/{systemCategory}', [SystemCategoryController::class, 'destroy'])->name('admin.smart-assemble.category.destroy');
            Route::get('/status/{systemCategory}', [SystemCategoryController::class, 'status'])->name('admin.smart-assemble.category.status');
        });


        //type
        Route::prefix('type')->group(function () {
            Route::get('/', [SystemTypeController::class, 'index'])->name('admin.smart-assemble.type.index');
            Route::get('/create', [SystemTypeController::class, 'create'])->name('admin.smart-assemble.type.create');
            Route::post('/store', [SystemTypeController::class, 'store'])->name('admin.smart-assemble.type.store');
            Route::get('/edit/{systemType}', [SystemTypeController::class, 'edit'])->name('admin.smart-assemble.type.edit');
            Route::put('/update/{systemType}', [SystemTypeController::class, 'update'])->name('admin.smart-assemble.type.update');
            Route::delete('/destroy/{systemType}', [SystemTypeController::class, 'destroy'])->name('admin.smart-assemble.type.destroy');
            Route::get('/status/{systemType}', [SystemTypeController::class, 'status'])->name('admin.smart-assemble.type.status');

            //gallery
            Route::get('/gallery/{systemCategory}/{systemType}', [SystemClassGalleryController::class, 'index'])->name('admin.smart-assemble.type.gallery.index');
            Route::get('/gallery/create/{systemCategory}/{systemType}', [SystemClassGalleryController::class, 'create'])->name('admin.smart-assemble.type.gallery.create');
            Route::post('/gallery/store/{systemCategory}/{systemType}', [SystemClassGalleryController::class, 'store'])->name('admin.smart-assemble.type.gallery.store');
            Route::delete('/gallery/destroy/{systemCategory}/{systemType}/{systemGallery}', [SystemClassGalleryController::class, 'destroy'])->name('admin.smart-assemble.type.gallery.destroy');
        });

        //cpu
        Route::prefix('cpu')->group(function () {
            Route::get('/', [SystemCpuController::class, 'index'])->name('admin.smart-assemble.cpu.index');
            Route::get('/create', [SystemCpuController::class, 'create'])->name('admin.smart-assemble.cpu.create');
            Route::post('/store', [SystemCpuController::class, 'store'])->name('admin.smart-assemble.cpu.store');
            Route::get('/edit/{systemCpu}', [SystemCpuController::class, 'edit'])->name('admin.smart-assemble.cpu.edit');
            Route::put('/update/{systemCpu}', [SystemCpuController::class, 'update'])->name('admin.smart-assemble.cpu.update');
            Route::delete('/destroy/{systemCpu}', [SystemCpuController::class, 'destroy'])->name('admin.smart-assemble.cpu.destroy');
            Route::get('/status/{systemCpu}', [SystemCpuController::class, 'status'])->name('admin.smart-assemble.cpu.status');
        });

        //config
        Route::prefix('config')->group(function () {
            Route::get('/', [SystemConfigController::class, 'index'])->name('admin.smart-assemble.config.index');
            Route::get('/create', [SystemConfigController::class, 'create'])->name('admin.smart-assemble.config.create');
            Route::post('/store', [SystemConfigController::class, 'store'])->name('admin.smart-assemble.config.store');
            Route::get('/edit/{systemConfig}', [SystemConfigController::class, 'edit'])->name('admin.smart-assemble.config.edit');
            Route::put('/update/{systemConfig}', [SystemConfigController::class, 'update'])->name('admin.smart-assemble.config.update');
            Route::delete('/destroy/{systemConfig}', [SystemConfigController::class, 'destroy'])->name('admin.smart-assemble.config.destroy');
            Route::get('/status/{systemConfig}', [SystemConfigController::class, 'status'])->name('admin.smart-assemble.config.status');
        });


        //offered-system
        Route::prefix('system')->group(function () {
            Route::get('/', [SystemController::class, 'index'])->name('admin.smart-assemble.system.index');
            Route::get('/create', [SystemController::class, 'create'])->name('admin.smart-assemble.system.create');
            Route::post('/store', [SystemController::class, 'store'])->name('admin.smart-assemble.system.store');
            Route::get('/edit/{system}', [SystemController::class, 'edit'])->name('admin.smart-assemble.system.edit');
            Route::put('/update/{system}', [SystemController::class, 'update'])->name('admin.smart-assemble.system.update');
            Route::delete('/destroy/{system}', [SystemController::class, 'destroy'])->name('admin.smart-assemble.system.destroy');
            Route::get('/status/{system}', [SystemController::class, 'status'])->name('admin.smart-assemble.system.status');

            //gallery
            Route::get('/gallery/{system}', [SystemGalleryController::class, 'index'])->name('admin.smart-assemble.system.gallery.index');
            Route::get('/gallery/create/{system}', [SystemGalleryController::class, 'create'])->name('admin.smart-assemble.system.gallery.create');
            Route::post('/gallery/store/{system}', [SystemGalleryController::class, 'store'])->name('admin.smart-assemble.system.gallery.store');
            Route::delete('/gallery/destroy/{system}/{systemGallery}', [SystemGalleryController::class, 'destroy'])->name('admin.smart-assemble.system.gallery.destroy');

            //components
            Route::get('/components/{system}', [SystemController::class, 'components'])->name('admin.smart-assemble.system.components.index');
            Route::get('/components/create/{system}', [SystemController::class, 'componentsCreate'])->name('admin.smart-assemble.system.components.create');
            Route::post('/components/store/{system}', [SystemController::class, 'componentsStore'])->name('admin.smart-assemble.system.components.store');
            Route::get('/components/edit/{system}', [SystemController::class, 'componentsEdit'])->name('admin.smart-assemble.system.components.edit');
            Route::put('/components/update/{system}', [SystemController::class, 'componentsUpdate'])->name('admin.smart-assemble.system.components.update');
        });

        // system-menus
        Route::prefix('menu')->group(function () {
            Route::get('/', [SystemMenuController::class, 'index'])->name('admin.smart-assemble.menu.index');
            Route::get('/create', [SystemMenuController::class, 'create'])->name('admin.smart-assemble.menu.create');
            Route::post('/store', [SystemMenuController::class, 'store'])->name('admin.smart-assemble.menu.store');
            Route::get('/edit/{systemMenu}', [SystemMenuController::class, 'edit'])->name('admin.smart-assemble.menu.edit');
            Route::put('/update/{systemMenu}', [SystemMenuController::class, 'update'])->name('admin.smart-assemble.menu.update');
            Route::delete('/destroy/{systemMenu}', [SystemMenuController::class, 'destroy'])->name('admin.smart-assemble.menu.destroy');
            Route::get('/status/{systemMenu}', [SystemMenuController::class, 'status'])->name('admin.smart-assemble.menu.status');
        });
    });

    /*******************************************************************************************************************
     *
     *  admin market section
     *  */
    Route::prefix('market')->namespace('Market')->group(function () {

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.market.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.market.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.market.category.store');
            Route::get('/edit/{productCategory}', [CategoryController::class, 'edit'])->name('admin.market.category.edit');
            Route::put('/update/{productCategory}', [CategoryController::class, 'update'])->name('admin.market.category.update');
            Route::delete('/destroy/{productCategory}', [CategoryController::class, 'destroy'])->name('admin.market.category.destroy');
            Route::get('/get-sub-categories/{productCategory}', [CategoryController::class, 'getSubCategories'])->name('admin.market.category.get-sub-categories');
        });

        //brand
        Route::prefix('brand')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('admin.market.brand.index');
            Route::get('/create', [BrandController::class, 'create'])->name('admin.market.brand.create');
            Route::post('/store', [BrandController::class, 'store'])->name('admin.market.brand.store');
            Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('admin.market.brand.edit');
            Route::put('/update/{brand}', [BrandController::class, 'update'])->name('admin.market.brand.update');
            Route::delete('/destroy/{brand}', [BrandController::class, 'destroy'])->name('admin.market.brand.destroy');
        });

        //comment
        Route::prefix('comment')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('admin.market.comment.index');
            Route::get('/show/{comment}', [CommentController::class, 'show'])->name('admin.market.comment.show');
            Route::post('/store', [CommentController::class, 'store'])->name('admin.market.comment.store');
            Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('admin.market.comment.edit');
            Route::put('/update/{id}', [CommentController::class, 'update'])->name('admin.market.comment.update');
            Route::delete('/destroy/{id}', [CommentController::class, 'destroy'])->name('admin.market.comment.destroy');
            Route::get('/approved/{comment}', [CommentController::class, 'approved'])->name('admin.market.comment.approved');
            Route::get('/status/{comment}', [CommentController::class, 'status'])->name('admin.market.comment.status');
            Route::post('/answer/{comment}', [CommentController::class, 'answer'])->name('admin.market.comment.answer');
        });

        //delivery
        Route::prefix('delivery')->group(function () {
            Route::get('/', [DeliveryController::class, 'index'])->name('admin.market.delivery.index');
            Route::get('/create', [DeliveryController::class, 'create'])->name('admin.market.delivery.create');
            Route::post('/store', [DeliveryController::class, 'store'])->name('admin.market.delivery.store');
            Route::get('/edit/{delivery}', [DeliveryController::class, 'edit'])->name('admin.market.delivery.edit');
            Route::put('/update/{delivery}', [DeliveryController::class, 'update'])->name('admin.market.delivery.update');
            Route::delete('/destroy/{delivery}', [DeliveryController::class, 'destroy'])->name('admin.market.delivery.destroy');
            Route::get('/status/{delivery}', [DeliveryController::class, 'status'])->name('admin.market.delivery.status');
        });

        //discount
        Route::prefix('discount')->group(function () {
            Route::get('/copan', [DiscountController::class, 'copan'])->name('admin.market.discount.copan');
            Route::get('/copan/create', [DiscountController::class, 'copanCreate'])->name('admin.market.discount.copan.create');
            Route::get('/common-discount', [DiscountController::class, 'commonDiscount'])->name('admin.market.discount.commonDiscount');
            Route::post('/common-discount/store', [DiscountController::class, 'commonDiscountStore'])->name('admin.market.discount.commonDiscount.store');
            Route::get('/common-discount/edit/{commonDiscount}', [DiscountController::class, 'commonDiscountEdit'])->name('admin.market.discount.commonDiscount.edit');
            Route::put('/common-discount/update/{commonDiscount}', [DiscountController::class, 'commonDiscountUpdate'])->name('admin.market.discount.commonDiscount.update');
            Route::delete('/common-discount/destroy/{commonDiscount}', [DiscountController::class, 'commonDiscountDestroy'])->name('admin.market.discount.commonDiscount.destroy');
            Route::get('/common-discount/create', [DiscountController::class, 'commonDiscountCreate'])->name('admin.market.discount.commonDiscount.create');
            Route::get('/amazing-sale', [DiscountController::class, 'amazingSale'])->name('admin.market.discount.amazingSale');
            Route::get('/amazing-sale/create', [DiscountController::class, 'amazingSaleCreate'])->name('admin.market.discount.amazingSale.create');
            Route::post('/amazing-sale/store', [DiscountController::class, 'amazingSaleStore'])->name('admin.market.discount.amazingSale.store');
            Route::get('/amazing-sale/edit/{amazingSale}', [DiscountController::class, 'amazingSaleEdit'])->name('admin.market.discount.amazingSale.edit');
            Route::put('/amazing-sale/update/{amazingSale}', [DiscountController::class, 'amazingSaleUpdate'])->name('admin.market.discount.amazingSale.update');
            Route::delete('/amazing-sale/destroy/{amazingSale}', [DiscountController::class, 'amazingSaleDestroy'])->name('admin.market.discount.amazingSale.destroy');
            Route::post('/copan/store', [DiscountController::class, 'copanStore'])->name('admin.market.discount.copan.store');
            Route::get('/copan/edit/{copan}', [DiscountController::class, 'copanEdit'])->name('admin.market.discount.copan.edit');
            Route::put('/copan/update/{copan}', [DiscountController::class, 'copanUpdate'])->name('admin.market.discount.copan.update');
            Route::delete('/copan/destroy/{copan}', [DiscountController::class, 'copanDestroy'])->name('admin.market.discount.copan.destroy');


        });

        //order
        Route::prefix('order')->group(function () {
            Route::get('/', [OrderController::class, 'all'])->name('admin.market.order.all');
            Route::get('/new-order', [OrderController::class, 'newOrders'])->name('admin.market.order.newOrders');
            Route::get('/sending', [OrderController::class, 'sending'])->name('admin.market.order.sending');
            Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.market.order.unpaid');
            Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.market.order.canceled');
            Route::get('/returned', [OrderController::class, 'returned'])->name('admin.market.order.returned');
            Route::get('/show/{order}', [OrderController::class, 'show'])->name('admin.market.order.show');
            Route::get('/show/{order}/detail', [OrderController::class, 'detail'])->name('admin.market.order.show.detail');
            Route::get('/change-send-status/{order}', [OrderController::class, 'changeSendStatus'])->name('admin.market.order.changeSendStatus');
            Route::get('/change-order-status/{order}', [OrderController::class, 'changeOrderStatus'])->name('admin.market.order.changeOrderStatus');
            Route::get('/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('admin.market.order.cancelOrder');
        });


        //payment
        Route::prefix('payment')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('admin.market.payment.index');
            Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
            Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
            Route::get('/cash', [PaymentController::class, 'cash'])->name('admin.market.payment.cash');
            Route::get('/canceled/{payment}', [PaymentController::class, 'canceled'])->name('admin.market.payment.canceled');
            Route::get('/returned/{payment}', [PaymentController::class, 'returned'])->name('admin.market.payment.returned');
            Route::get('/show/{payment}', [PaymentController::class, 'show'])->name('admin.market.payment.show');
        });

        //product
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.market.product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.market.product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('admin.market.product.store');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.market.product.edit');
            Route::put('/update/{product}', [ProductController::class, 'update'])->name('admin.market.product.update');
            Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('admin.market.product.destroy');


            //gallery
            Route::get('/gallery/{product}', [GalleryController::class, 'index'])->name('admin.market.gallery.index');
            Route::get('/gallery/create/{product}', [GalleryController::class, 'create'])->name('admin.market.gallery.create');
            Route::post('/gallery/store/{product}', [GalleryController::class, 'store'])->name('admin.market.gallery.store');
            Route::delete('/gallery/destroy/{product}/{gallery}', [GalleryController::class, 'destroy'])->name('admin.market.gallery.destroy');

            //color
            Route::get('/color/{product}', [ProductColorController::class, 'index'])->name('admin.market.color.index');
            Route::get('/color/create/{product}', [ProductColorController::class, 'create'])->name('admin.market.color.create');
            Route::post('/color/store/{product}', [ProductColorController::class, 'store'])->name('admin.market.color.store');
            Route::delete('/color/destroy/{product}/{color}', [ProductColorController::class, 'destroy'])->name('admin.market.color.destroy');


            //guarantee
            Route::get('/guarantee/{product}', [GuaranteeController::class, 'index'])->name('admin.market.guarantee.index');
            Route::get('/guarantee/create/{product}', [GuaranteeController::class, 'create'])->name('admin.market.guarantee.create');
            Route::post('/guarantee/store/{product}', [GuaranteeController::class, 'store'])->name('admin.market.guarantee.store');
            Route::delete('/guarantee/destroy/{product}/{guarantee}', [GuaranteeController::class, 'destroy'])->name('admin.market.guarantee.destroy');
        });

        //property
        Route::prefix('property')->group(function () {
            Route::get('/', [PropertyController::class, 'index'])->name('admin.market.property.index');
            Route::get('/create', [PropertyController::class, 'create'])->name('admin.market.property.create');
            Route::post('/store', [PropertyController::class, 'store'])->name('admin.market.property.store');
            Route::get('/edit/{categoryAttribute}', [PropertyController::class, 'edit'])->name('admin.market.property.edit');
            Route::put('/update/{categoryAttribute}', [PropertyController::class, 'update'])->name('admin.market.property.update');
            Route::delete('/destroy/{categoryAttribute}', [PropertyController::class, 'destroy'])->name('admin.market.property.destroy');


            //value
            Route::get('/value/{categoryAttribute}', [PropertyValueController::class, 'index'])->name('admin.market.value.index');
            Route::get('/value/create/{categoryAttribute}', [PropertyValueController::class, 'create'])->name('admin.market.value.create');
            Route::post('/value/store/{categoryAttribute}', [PropertyValueController::class, 'store'])->name('admin.market.value.store');
            Route::get('/value/edit/{categoryAttribute}/{value}', [PropertyValueController::class, 'edit'])->name('admin.market.value.edit');
            Route::put('/value/update/{categoryAttribute}/{value}', [PropertyValueController::class, 'update'])->name('admin.market.value.update');
            Route::delete('/value/destroy/{categoryAttribute}/{value}', [PropertyValueController::class, 'destroy'])->name('admin.market.value.destroy');
        });

        //store
        Route::prefix('store')->group(function () {
            Route::get('/', [StoreController::class, 'index'])->name('admin.market.store.index');
            Route::get('/add-to-store/{product}', [StoreController::class, 'addToStore'])->name('admin.market.store.add-to-store');
            Route::post('/store/{product}', [StoreController::class, 'store'])->name('admin.market.store.store');
            Route::get('/edit/{product}', [StoreController::class, 'edit'])->name('admin.market.store.edit');
            Route::put('/update/{product}', [StoreController::class, 'update'])->name('admin.market.store.update');
        });
    });

    /*******************************************************************************************************************
     *
     *  admin content section
     *  */
    Route::prefix('content')->namespace('Content')->group(function () {

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [ContentCategoryController::class, 'index'])->name('admin.content.category.index');
            Route::get('/create', [ContentCategoryController::class, 'create'])->name('admin.content.category.create');
            Route::post('/store', [ContentCategoryController::class, 'store'])->name('admin.content.category.store');
            Route::get('/edit/{postCategory}', [ContentCategoryController::class, 'edit'])->name('admin.content.category.edit');
            Route::put('/update/{postCategory}', [ContentCategoryController::class, 'update'])->name('admin.content.category.update');
            Route::delete('/destroy/{postCategory}', [ContentCategoryController::class, 'destroy'])->name('admin.content.category.destroy');
            Route::get('/status/{postCategory}', [ContentCategoryController::class, 'status'])->name('admin.content.category.status');
        });

        //comment
        Route::prefix('comment')->group(function () {
            Route::get('/', [ContentCommentController::class, 'index'])->name('admin.content.comment.index');
            Route::get('/show/{comment}', [ContentCommentController::class, 'show'])->name('admin.content.comment.show');
            Route::delete('/destroy/{comment}', [ContentCommentController::class, 'destroy'])->name('admin.content.comment.destroy');
            Route::get('/approved/{comment}', [ContentCommentController::class, 'approved'])->name('admin.content.comment.approved');
            Route::get('/status/{comment}', [ContentCommentController::class, 'status'])->name('admin.content.comment.status');
            Route::post('/answer/{comment}', [ContentCommentController::class, 'answer'])->name('admin.content.comment.answer');
        });

        //faq
        Route::prefix('faq')->group(function () {
            Route::get('/', [FAQController::class, 'index'])->name('admin.content.faq.index');
            Route::get('/create', [FAQController::class, 'create'])->name('admin.content.faq.create');
            Route::post('/store', [FAQController::class, 'store'])->name('admin.content.faq.store');
            Route::get('/edit/{faq}', [FAQController::class, 'edit'])->name('admin.content.faq.edit');
            Route::put('/update/{faq}', [FAQController::class, 'update'])->name('admin.content.faq.update');
            Route::delete('/destroy/{faq}', [FAQController::class, 'destroy'])->name('admin.content.faq.destroy');
            Route::get('/status/{faq}', [FAQController::class, 'status'])->name('admin.content.faq.status');
        });
        //menu
        Route::prefix('menu')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('admin.content.menu.index');
            Route::get('/create', [MenuController::class, 'create'])->name('admin.content.menu.create');
            Route::post('/store', [MenuController::class, 'store'])->name('admin.content.menu.store');
            Route::get('/edit/{menu}', [MenuController::class, 'edit'])->name('admin.content.menu.edit');
            Route::put('/update/{menu}', [MenuController::class, 'update'])->name('admin.content.menu.update');
            Route::delete('/destroy/{menu}', [MenuController::class, 'destroy'])->name('admin.content.menu.destroy');
            Route::get('/status/{menu}', [MenuController::class, 'status'])->name('admin.content.menu.status');
            Route::get('/get-sub-menus/{menu}', [MenuController::class, 'getSubMenus'])->name('admin.content.menu.get-sub-menus');
            Route::get('/get-menus/{location}', [MenuController::class, 'getMenus'])->name('admin.content.menu.get-menus');
        });

        //page
        Route::prefix('page')->group(function () {
            Route::get('/', [PageController::class, 'index'])->name('admin.content.page.index');
            Route::get('/create', [PageController::class, 'create'])->name('admin.content.page.create');
            Route::post('/store', [PageController::class, 'store'])->name('admin.content.page.store');
            Route::get('/edit/{page}', [PageController::class, 'edit'])->name('admin.content.page.edit');
            Route::put('/update/{page}', [PageController::class, 'update'])->name('admin.content.page.update');
            Route::delete('/destroy/{page}', [PageController::class, 'destroy'])->name('admin.content.page.destroy');
            Route::get('/status/{page}', [PageController::class, 'status'])->name('admin.content.page.status');
        });

        //post
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.content.post.index');
            Route::get('/create', [PostController::class, 'create'])->name('admin.content.post.create');
            Route::post('/store', [PostController::class, 'store'])->name('admin.content.post.store');
            Route::get('/edit/{post}', [PostController::class, 'edit'])->name('admin.content.post.edit');
            Route::put('/update/{post}', [PostController::class, 'update'])->name('admin.content.post.update');
            Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('admin.content.post.destroy');
            Route::get('/status/{post}', [PostController::class, 'status'])->name('admin.content.post.status');
            Route::get('/commentable/{post}', [PostController::class, 'commentable'])->name('admin.content.post.commentable');
        });

        //banner
        Route::prefix('banner')->group(function () {
            Route::get('/', [BannerController::class, 'index'])->name('admin.content.banner.index');
            Route::get('/create', [BannerController::class, 'create'])->name('admin.content.banner.create');
            Route::post('/store', [BannerController::class, 'store'])->name('admin.content.banner.store');
            Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('admin.content.banner.edit');
            Route::put('/update/{banner}', [BannerController::class, 'update'])->name('admin.content.banner.update');
            Route::delete('/destroy/{banner}', [BannerController::class, 'destroy'])->name('admin.content.banner.destroy');
            Route::get('/status/{banner}', [BannerController::class, 'status'])->name('admin.content.banner.status');
        });
    });

    /*******************************************************************************************************************
     *
     *  admin user section
     *  */
    Route::prefix('user')->namespace('User')->group(function () {

        //admin-user
        Route::prefix('admin-user')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.admin-user.index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.admin-user.create');
            Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.admin-user.store');
            Route::get('/edit/{admin}', [AdminUserController::class, 'edit'])->name('admin.user.admin-user.edit');
            Route::put('/update/{admin}', [AdminUserController::class, 'update'])->name('admin.user.admin-user.update');
            Route::delete('/destroy/{admin}', [AdminUserController::class, 'destroy'])->name('admin.user.admin-user.destroy');
            Route::get('/status/{user}', [AdminUserController::class, 'status'])->name('admin.user.admin-user.status');
            Route::get('/activation/{user}', [AdminUserController::class, 'activation'])->name('admin.user.admin-user.activation');
            Route::get('/role-form/{user}', [AdminUserController::class, 'roleForm'])->name('admin.user.admin-user.role-form');
            Route::put('/role-update/{user}', [AdminUserController::class, 'roleUpdate'])->name('admin.user.admin-user.role-update');
        });

        //customer
        Route::prefix('customer')->group(function () {
            Route::get('/', [CustomerController::class, 'index'])->name('admin.user.customer.index');
            Route::get('/create', [CustomerController::class, 'create'])->name('admin.user.customer.create');
            Route::post('/store', [CustomerController::class, 'store'])->name('admin.user.customer.store');
            Route::get('/edit/{user}', [CustomerController::class, 'edit'])->name('admin.user.customer.edit');
            Route::put('/update/{user}', [CustomerController::class, 'update'])->name('admin.user.customer.update');
            Route::delete('/destroy/{user}', [CustomerController::class, 'destroy'])->name('admin.user.customer.destroy');
            Route::get('/status/{user}', [CustomerController::class, 'status'])->name('admin.user.customer.status');
            Route::get('/activation/{user}', [CustomerController::class, 'activation'])->name('admin.user.customer.activation');
        });

        //role
        Route::prefix('role')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('admin.user.role.index');
            Route::get('/create', [RoleController::class, 'create'])->name('admin.user.role.create');
            Route::post('/store', [RoleController::class, 'store'])->name('admin.user.role.store');
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('admin.user.role.edit');
            Route::put('/update/{role}', [RoleController::class, 'update'])->name('admin.user.role.update');
            Route::delete('/destroy/{role}', [RoleController::class, 'destroy'])->name('admin.user.role.destroy');
            Route::get('/permission-form/{role}', [RoleController::class, 'permissionForm'])->name('admin.user.role.permission-form');
            Route::put('/permission-update/{role}', [RoleController::class, 'permissionUpdate'])->name('admin.user.role.permission-update');
        });

        //permission
        Route::prefix('permission')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('admin.user.permission.index');
            Route::get('/create', [PermissionController::class, 'create'])->name('admin.user.permission.create');
            Route::post('/store', [PermissionController::class, 'store'])->name('admin.user.permission.store');
            Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('admin.user.permission.edit');
            Route::put('/update/{id}', [PermissionController::class, 'update'])->name('admin.user.permission.update');
            Route::delete('/destroy/{id}', [PermissionController::class, 'destroy'])->name('admin.user.permission.destroy');
        });
    });

    /*******************************************************************************************************************
     *
     *  admin notify section
     *  */
    Route::prefix('notify')->namespace('Notify')->group(function () {

        //email
        Route::prefix('email')->group(function () {
            Route::get('/', [EmailController::class, 'index'])->name('admin.notify.email.index');
            Route::get('/create', [EmailController::class, 'create'])->name('admin.notify.email.create');
            Route::post('/store', [EmailController::class, 'store'])->name('admin.notify.email.store');
            Route::get('/edit/{email}', [EmailController::class, 'edit'])->name('admin.notify.email.edit');
            Route::put('/update/{email}', [EmailController::class, 'update'])->name('admin.notify.email.update');
            Route::delete('/destroy/{email}', [EmailController::class, 'destroy'])->name('admin.notify.email.destroy');
            Route::get('/status/{email}', [EmailController::class, 'status'])->name('admin.notify.email.status');
        });


        //email file
        Route::prefix('email-file')->group(function () {
            Route::get('/{email}', [EmailFileController::class, 'index'])->name('admin.notify.email-file.index');
            Route::get('/{email}/create', [EmailFileController::class, 'create'])->name('admin.notify.email-file.create');
            Route::post('/{email}/store', [EmailFileController::class, 'store'])->name('admin.notify.email-file.store');
            Route::get('/edit/{file}', [EmailFileController::class, 'edit'])->name('admin.notify.email-file.edit');
            Route::put('/update/{file}', [EmailFileController::class, 'update'])->name('admin.notify.email-file.update');
            Route::delete('/destroy/{file}', [EmailFileController::class, 'destroy'])->name('admin.notify.email-file.destroy');
            Route::get('/status/{file}', [EmailFileController::class, 'status'])->name('admin.notify.email-file.status');
        });

        //sms
        Route::prefix('sms')->group(function () {
            Route::get('/', [SMSController::class, 'index'])->name('admin.notify.sms.index');
            Route::get('/create', [SMSController::class, 'create'])->name('admin.notify.sms.create');
            Route::post('/store', [SMSController::class, 'store'])->name('admin.notify.sms.store');
            Route::get('/edit/{sms}', [SMSController::class, 'edit'])->name('admin.notify.sms.edit');
            Route::put('/update/{sms}', [SMSController::class, 'update'])->name('admin.notify.sms.update');
            Route::delete('/destroy/{sms}', [SMSController::class, 'destroy'])->name('admin.notify.sms.destroy');
            Route::get('/status/{sms}', [SMSController::class, 'status'])->name('admin.notify.sms.status');
        });
    });

    /*******************************************************************************************************************
     *
     *  admin ticket section
     *  */
    Route::prefix('ticket')->namespace('Ticket')->group(function () {

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [TicketCategoryController::class, 'index'])->name('admin.ticket.category.index');
            Route::get('/create', [TicketCategoryController::class, 'create'])->name('admin.ticket.category.create');
            Route::post('/store', [TicketCategoryController::class, 'store'])->name('admin.ticket.category.store');
            Route::get('/edit/{ticketCategory}', [TicketCategoryController::class, 'edit'])->name('admin.ticket.category.edit');
            Route::put('/update/{ticketCategory}', [TicketCategoryController::class, 'update'])->name('admin.ticket.category.update');
            Route::delete('/destroy/{ticketCategory}', [TicketCategoryController::class, 'destroy'])->name('admin.ticket.category.destroy');
            Route::get('/status/{ticketCategory}', [TicketCategoryController::class, 'status'])->name('admin.ticket.category.status');
        });


        //priority
        Route::prefix('priority')->group(function () {
            Route::get('/', [TicketPriorityController::class, 'index'])->name('admin.ticket.priority.index');
            Route::get('/create', [TicketPriorityController::class, 'create'])->name('admin.ticket.priority.create');
            Route::post('/store', [TicketPriorityController::class, 'store'])->name('admin.ticket.priority.store');
            Route::get('/edit/{ticketPriority}', [TicketPriorityController::class, 'edit'])->name('admin.ticket.priority.edit');
            Route::put('/update/{ticketPriority}', [TicketPriorityController::class, 'update'])->name('admin.ticket.priority.update');
            Route::delete('/destroy/{ticketPriority}', [TicketPriorityController::class, 'destroy'])->name('admin.ticket.priority.destroy');
            Route::get('/status/{ticketPriority}', [TicketPriorityController::class, 'status'])->name('admin.ticket.priority.status');
        });


        //admin
        Route::prefix('admin')->group(function () {
            Route::get('/', [TicketAdminController::class, 'index'])->name('admin.ticket.admin.index');
            Route::get('/set/{admin}', [TicketAdminController::class, 'set'])->name('admin.ticket.admin.set');
        });

        //main
        Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
        Route::get('/new-tickets', [TicketController::class, 'newTickets'])->name('admin.ticket.newTickets');
        Route::get('/open-tickets', [TicketController::class, 'openTickets'])->name('admin.ticket.openTickets');
        Route::get('/close-tickets', [TicketController::class, 'closeTickets'])->name('admin.ticket.closeTickets');
        Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');
        Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('admin.ticket.answer');
        Route::get('/change/{ticket}', [TicketController::class, 'change'])->name('admin.ticket.change');
    });

    /*******************************************************************************************************************
     *
     *  admin setting section
     *  */
    Route::prefix('setting')->namespace('Setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::get('/edit/{setting}', [SettingController::class, 'edit'])->name('admin.setting.edit');
        Route::put('/update/{setting}', [SettingController::class, 'update'])->name('admin.setting.update');
        Route::delete('/destroy/{setting}', [SettingController::class, 'destroy'])->name('admin.setting.destroy');
    });

    // read all admin notifications
    Route::post('/notification/read-all', [NotificationController::class, 'readAll'])->name('admin.notification.readAll');
});

/***********************************************************************************************************************
 *
 *  new admin panel section
 *  */
Route::prefix('panel')->middleware(['auth', 'admin.check'])->namespace('Panel')->group(function () {

//    Route::get('/', [PanelController::class, 'index'])->name('panel.home');
    Route::get('/', ['uses' => [PanelController::class, 'index'], 'as' => 'panel.home']);


    /*******************************************************************************************************************
     *
     *  telegram bot
     *  */
    Route::prefix('telegram-bot')->namespace('TelegramBot')->group(function () {
        Route::prefix('send')->group(function () {
            Route::get('/', [BotSendController::class, 'message'])->name('panel.bot.message');
            Route::post('/message', [BotSendController::class, 'sendMessage'])->name('panel.bot.send.message');
        });
    });

    /*******************************************************************************************************************
     *  system usage reports
     *
     * */
    Route::prefix('reports')->namespace('Report')->group(function () {
        Route::prefix('charts')->group(function () {
            Route::get('sales', [PanelChartController::class, 'salesChart'])->name('panel.reports.charts.sales');
        });
    });

    /*******************************************************************************************************************
     *  smart assemble system
     *
     * */
    Route::prefix('smart-assemble')->namespace('SmartAssemble')->group(function () {

    });

});
/***********************************************************************************************************************
 *
 *  adminto dashboard
 *  */
Route::prefix('adminto')->middleware(['auth', 'admin.check'])->namespace('Dashboard')
    ->group(function () {
        Route::get('/', [AdminToController::class, 'home'])->name('adminto.home');

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [PostCategoryController::class, 'index'])->name('adminto.category.index');
            Route::get('/create', [PostCategoryController::class, 'create'])->name('adminto.category.create');
            Route::post('/store', [PostCategoryController::class, 'store'])->name('adminto.category.store');
            Route::get('/edit/{id}', [PostCategoryController::class, 'edit'])->name('adminto.category.edit');
            Route::patch('/update/{id}', [PostCategoryController::class, 'update'])->name('adminto.category.update');
            Route::delete('/destroy/{id}', [PostCategoryController::class, 'destroy'])->name('adminto.category.destroy');
            Route::patch('/status/{id}', [PostCategoryController::class, 'changeStatus'])->name('adminto.category.change.status');
        });

        //post
        Route::prefix('post')->group(function () {
            Route::get('/', [PostsController::class, 'index'])->name('adminto.post.index');
            Route::get('/create', [PostsController::class, 'create'])->name('adminto.post.create');
            Route::post('/store', [PostsController::class, 'store'])->name('adminto.post.store');
            Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('adminto.post.edit');
            Route::patch('/update/{id}', [PostsController::class, 'update'])->name('adminto.post.update');
            Route::delete('/destroy/{id}', [PostsController::class, 'destroy'])->name('adminto.post.destroy');
            Route::patch('/status/{id}', [PostsController::class, 'changeStatus'])->name('adminto.post.change.status');
            Route::patch('/commentable/{id}', [PostsController::class, 'commentable'])->name('adminto.post.commentable');
        });

        //banner
        Route::prefix('banner')->group(function () {
            Route::get('/', [PostBannerController::class, 'index'])->name('adminto.banner.index');
            Route::get('/create', [PostBannerController::class, 'create'])->name('adminto.banner.create');
            Route::post('/store', [PostBannerController::class, 'store'])->name('adminto.banner.store');
            Route::get('/edit/{id}', [PostBannerController::class, 'edit'])->name('adminto.banner.edit');
            Route::patch('/update/{id}', [PostBannerController::class, 'update'])->name('adminto.banner.update');
            Route::delete('/destroy/{id}', [PostBannerController::class, 'destroy'])->name('adminto.banner.destroy');
            Route::patch('/status/{id}', [PostBannerController::class, 'changeStatus'])->name('adminto.banner.change.status');
        });

        //comment
        Route::prefix('comment')->group(function () {
            Route::get('/', [PostCommentController::class, 'index'])->name('adminto.comment.index');
            Route::get('/show/{id}', [PostCommentController::class, 'show'])->name('adminto.comment.show');
            Route::delete('/destroy/{id}', [PostCommentController::class, 'destroy'])->name('adminto.comment.destroy');
            Route::patch('/approved/{id}', [PostCommentController::class, 'approved'])->name('adminto.comment.approved');
            Route::patch('/status/{id}', [PostCommentController::class, 'changeStatus'])->name('adminto.comment.change.status');
            Route::post('/answer/{id}', [PostCommentController::class, 'answer'])->name('adminto.comment.answer');
        });

        //menu
        Route::prefix('menu')->group(function () {
            Route::get('/', [PostMenuController::class, 'index'])->name('adminto.menu.index');
            Route::get('/create', [PostMenuController::class, 'create'])->name('adminto.menu.create');
            Route::post('/store', [PostMenuController::class, 'store'])->name('adminto.menu.store');
            Route::get('/edit/{id}', [PostMenuController::class, 'edit'])->name('adminto.menu.edit');
            Route::patch('/update/{id}', [PostMenuController::class, 'update'])->name('adminto.menu.update');
            Route::delete('/destroy/{id}', [PostMenuController::class, 'destroy'])->name('adminto.menu.destroy');
            Route::patch('/status/{id}', [PostMenuController::class, 'changeStatus'])->name('adminto.menu.change.status');
        });

        //user
        Route::prefix('user')->group(function () {
            Route::get('/', [PostUserController::class, 'index'])->name('adminto.user.index');
            Route::get('/create', [PostUserController::class, 'create'])->name('adminto.user.create');
            Route::post('/store', [PostUserController::class, 'store'])->name('adminto.user.store');
            Route::get('/edit/{id}', [PostUserController::class, 'edit'])->name('adminto.user.edit');
            Route::patch('/update/{id}', [PostUserController::class, 'update'])->name('adminto.user.update');
            Route::delete('/destroy/{id}', [PostUserController::class, 'destroy'])->name('adminto.user.destroy');
            Route::patch('/status/{id}', [PostUserController::class, 'status'])->name('adminto.user.status');
            Route::patch('/activation/{id}', [PostUserController::class, 'activation'])->name('adminto.user.activation');
            Route::get('/add-roles/{userId}', [PostUserController::class, 'addRoles'])->name('adminto.user.add-roles');
            Route::post('/role-store/{userId}', [PostUserController::class, 'roleStore'])->name('adminto.user.role-store');
            Route::delete('/role-remove/{userId}/role/{roleId}', [PostUserController::class, 'roleRemove'])->name('adminto.user.role-remove');
        });

        //role
        Route::prefix('role')->group(function () {
            Route::get('/', [PostRoleController::class, 'index'])->name('adminto.role.index');
            Route::get('/create', [PostRoleController::class, 'create'])->name('adminto.role.create');
            Route::post('/store', [PostRoleController::class, 'store'])->name('adminto.role.store');
            Route::get('/edit/{id}', [PostRoleController::class, 'edit'])->name('adminto.role.edit');
            Route::patch('/update/{id}', [PostRoleController::class, 'update'])->name('adminto.role.update');
            Route::delete('/destroy/{id}', [PostRoleController::class, 'destroy'])->name('adminto.role.destroy');
            Route::patch('/status/{id}', [PostRoleController::class, 'changeStatus'])->name('adminto.role.change.status');
            Route::get('/permission-form/{id}', [PostRoleController::class, 'permissionForm'])->name('adminto.role.permission-form');
            Route::put('/permission-update/{id}', [PostRoleController::class, 'permissionUpdate'])->name('adminto.role.permission-update');
        });

        //setting
        Route::prefix('setting')->namespace('Setting')->group(function () {
            Route::get('/', [PostSettingController::class, 'index'])->name('adminto.setting.index');
            Route::get('/edit/{id}', [PostSettingController::class, 'edit'])->name('adminto.setting.edit');
            Route::patch('/update/{id}', [PostSettingController::class, 'update'])->name('adminto.setting.update');
        });

        // read all admin notifications
        Route::post('/notification/read-all', [NotificationController::class, 'readAll'])->name('admin.notification.readAll');
    });
