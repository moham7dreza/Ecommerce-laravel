<?php
// panel controllers
use App\Http\Controllers\Panel\Client\RoleController as PanelClientRoleController;
use App\Http\Controllers\Panel\Client\UserController as PanelClientUserController;
use App\Http\Controllers\Panel\Content\BannerController as PanelContentBannerController;
use App\Http\Controllers\Panel\Content\MenuController as PanelContentMenuController;
use App\Http\Controllers\Panel\Content\PostController as PanelContentPostController;
use App\Http\Controllers\Panel\Content\CategoryController as PanelContentCategoryController;
use App\Http\Controllers\Panel\Content\CommentController as PanelContentCommentController;
use App\Http\Controllers\Panel\Market\BrandController as PanelMarketBrandController;
use App\Http\Controllers\Panel\Market\CategoryController as PanelMarketCategoryController;
use App\Http\Controllers\Panel\Market\CommentController as PanelMarketCommentController;
use App\Http\Controllers\Panel\Market\HardwareController as PanelMarketHardwareController;
use App\Http\Controllers\Panel\Office\ServiceController as PanelOfficeServiceController;
use App\Http\Controllers\Panel\Office\CommentController as PanelOfficeCommentController;
use App\Http\Controllers\Panel\Office\CategoryController as PanelOfficeCategoryController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\Report\ChartController as PanelChartController;
use App\Http\Controllers\Panel\Setting\SettingController as PanelSettingController;
use App\Http\Controllers\Panel\TelegramBot\SendController as BotSendController;

//
use Illuminate\Support\Facades\Route;

/***********************************************************************************************************************
 *
 *  new admin panel section
 *  */
Route::prefix('panel')->middleware(['auth', 'admin.check', 'access.control:role-admin'])->namespace('Panel')->group(function () {

    Route::get('/', [PanelController::class, 'index'])->name('panel.home');
//    Route::get('/', ['uses' => [PanelController::class, 'index'], 'as' => 'panel.home']);

    //market
    Route::prefix('market')->group(function () {

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [PanelMarketCategoryController::class, 'index'])->name('panel.market.category.index');
            Route::get('/create', [PanelMarketCategoryController::class, 'create'])->name('panel.market.category.create');
            Route::post('/store', [PanelMarketCategoryController::class, 'store'])->name('panel.market.category.store');
            Route::get('/edit/{id}', [PanelMarketCategoryController::class, 'edit'])->name('panel.market.category.edit');
            Route::patch('/update/{id}', [PanelMarketCategoryController::class, 'update'])->name('panel.market.category.update');
            Route::delete('/destroy/{id}', [PanelMarketCategoryController::class, 'destroy'])->name('panel.market.category.destroy');
            Route::patch('/status/{id}', [PanelMarketCategoryController::class, 'changeStatus'])->name('panel.market.category.change.status');
        });

        //comment
        Route::prefix('comment')->group(function () {
            Route::get('/', [PanelMarketCommentController::class, 'index'])->name('panel.market.comment.index');
            Route::get('/show/{id}', [PanelMarketCommentController::class, 'show'])->name('panel.market.comment.show');
            Route::delete('/destroy/{id}', [PanelMarketCommentController::class, 'destroy'])->name('panel.market.comment.destroy');
            Route::patch('/approved/{id}', [PanelMarketCommentController::class, 'approved'])->name('panel.market.comment.approved');
            Route::patch('/status/{id}', [PanelMarketCommentController::class, 'changeStatus'])->name('panel.market.comment.change.status');
            Route::patch('/approve/{id}', [PanelMarketCommentController::class, 'changeApprove'])->name('panel.market.comment.change.approve');
            Route::post('/answer/{id}', [PanelMarketCommentController::class, 'answer'])->name('panel.market.comment.answer');
        });
        //hardware
        Route::prefix('hardware')->group(function () {
            Route::get('/', [PanelMarketHardwareController::class, 'index'])->name('panel.market.hardware.index');
            Route::get('/create', [PanelMarketHardwareController::class, 'create'])->name('panel.market.hardware.create');
            Route::post('/store', [PanelMarketHardwareController::class, 'store'])->name('panel.market.hardware.store');
            Route::get('/edit/{id}', [PanelMarketHardwareController::class, 'edit'])->name('panel.market.hardware.edit');
            Route::patch('/update/{id}', [PanelMarketHardwareController::class, 'update'])->name('panel.market.hardware.update');
            Route::delete('/destroy/{id}', [PanelMarketHardwareController::class, 'destroy'])->name('panel.market.hardware.destroy');
            Route::patch('/status/{id}', [PanelMarketHardwareController::class, 'changeStatus'])->name('panel.market.hardware.change.status');
        });

        //brand
        Route::prefix('brand')->group(function () {
            Route::get('/', [PanelMarketBrandController::class, 'index'])->name('panel.market.brand.index');
            Route::get('/create', [PanelMarketBrandController::class, 'create'])->name('panel.market.brand.create');
            Route::post('/store', [PanelMarketBrandController::class, 'store'])->name('panel.market.brand.store');
            Route::get('/edit/{id}', [PanelMarketBrandController::class, 'edit'])->name('panel.market.brand.edit');
            Route::patch('/update/{id}', [PanelMarketBrandController::class, 'update'])->name('panel.market.brand.update');
            Route::delete('/destroy/{id}', [PanelMarketBrandController::class, 'destroy'])->name('panel.market.brand.destroy');
            Route::patch('/status/{id}', [PanelMarketBrandController::class, 'changeStatus'])->name('panel.market.brand.change.status');
        });
    });

    //content
    Route::prefix('content')->group(function () {

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [PanelContentCategoryController::class, 'index'])->name('panel.content.category.index');
            Route::get('/create', [PanelContentCategoryController::class, 'create'])->name('panel.content.category.create');
            Route::post('/store', [PanelContentCategoryController::class, 'store'])->name('panel.content.category.store');
            Route::get('/edit/{id}', [PanelContentCategoryController::class, 'edit'])->name('panel.content.category.edit');
            Route::patch('/update/{id}', [PanelContentCategoryController::class, 'update'])->name('panel.content.category.update');
            Route::delete('/destroy/{id}', [PanelContentCategoryController::class, 'destroy'])->name('panel.content.category.destroy');
            Route::patch('/status/{id}', [PanelContentCategoryController::class, 'changeStatus'])->name('panel.content.category.change.status');
        });

        //post
        Route::prefix('post')->group(function () {
            Route::get('/', [PanelContentPostController::class, 'index'])->name('panel.content.post.index');
            Route::get('/create', [PanelContentPostController::class, 'create'])->name('panel.content.post.create');
            Route::post('/store', [PanelContentPostController::class, 'store'])->name('panel.content.post.store');
            Route::get('/edit/{id}', [PanelContentPostController::class, 'edit'])->name('panel.content.post.edit');
            Route::patch('/update/{id}', [PanelContentPostController::class, 'update'])->name('panel.content.post.update');
            Route::delete('/destroy/{id}', [PanelContentPostController::class, 'destroy'])->name('panel.content.post.destroy');
            Route::patch('/status/{id}', [PanelContentPostController::class, 'changeStatus'])->name('panel.content.post.change.status');
            Route::patch('/commentable/{id}', [PanelContentPostController::class, 'commentable'])->name('panel.content.post.commentable');
        });

        //banner
        Route::prefix('banner')->group(function () {
            Route::get('/', [PanelContentBannerController::class, 'index'])->name('panel.content.banner.index');
            Route::get('/create', [PanelContentBannerController::class, 'create'])->name('panel.content.banner.create');
            Route::post('/store', [PanelContentBannerController::class, 'store'])->name('panel.content.banner.store');
            Route::get('/edit/{id}', [PanelContentBannerController::class, 'edit'])->name('panel.content.banner.edit');
            Route::patch('/update/{id}', [PanelContentBannerController::class, 'update'])->name('panel.content.banner.update');
            Route::delete('/destroy/{id}', [PanelContentBannerController::class, 'destroy'])->name('panel.content.banner.destroy');
            Route::patch('/status/{id}', [PanelContentBannerController::class, 'changeStatus'])->name('panel.content.banner.change.status');
        });

        //menu
        Route::prefix('menu')->group(function () {
            Route::get('/', [PanelContentMenuController::class, 'index'])->name('panel.content.menu.index');
            Route::get('/create', [PanelContentMenuController::class, 'create'])->name('panel.content.menu.create');
            Route::post('/store', [PanelContentMenuController::class, 'store'])->name('panel.content.menu.store');
            Route::get('/edit/{id}', [PanelContentMenuController::class, 'edit'])->name('panel.content.menu.edit');
            Route::patch('/update/{id}', [PanelContentMenuController::class, 'update'])->name('panel.content.menu.update');
            Route::delete('/destroy/{id}', [PanelContentMenuController::class, 'destroy'])->name('panel.content.menu.destroy');
            Route::patch('/status/{id}', [PanelContentMenuController::class, 'changeStatus'])->name('panel.content.menu.change.status');
        });

        //comment
        Route::prefix('comment')->group(function () {
            Route::get('/', [PanelContentCommentController::class, 'index'])->name('panel.content.comment.index');
            Route::get('/show/{id}', [PanelContentCommentController::class, 'show'])->name('panel.content.comment.show');
            Route::delete('/destroy/{id}', [PanelContentCommentController::class, 'destroy'])->name('panel.content.comment.destroy');
            Route::patch('/approved/{id}', [PanelContentCommentController::class, 'approved'])->name('panel.content.comment.approved');
            Route::patch('/status/{id}', [PanelContentCommentController::class, 'changeStatus'])->name('panel.content.comment.change.status');
            Route::patch('/approve/{id}', [PanelContentCommentController::class, 'changeApprove'])->name('panel.content.comment.change.approve');
            Route::post('/answer/{id}', [PanelContentCommentController::class, 'answer'])->name('panel.content.comment.answer');
        });
    });

    //office
    Route::prefix('office')->group(function () {

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [PanelOfficeCategoryController::class, 'index'])->name('panel.office.category.index');
            Route::get('/create', [PanelOfficeCategoryController::class, 'create'])->name('panel.office.category.create');
            Route::post('/store', [PanelOfficeCategoryController::class, 'store'])->name('panel.office.category.store');
            Route::get('/edit/{id}', [PanelOfficeCategoryController::class, 'edit'])->name('panel.office.category.edit');
            Route::patch('/update/{id}', [PanelOfficeCategoryController::class, 'update'])->name('panel.office.category.update');
            Route::delete('/destroy/{id}', [PanelOfficeCategoryController::class, 'destroy'])->name('panel.office.category.destroy');
            Route::patch('/status/{id}', [PanelOfficeCategoryController::class, 'changeStatus'])->name('panel.office.category.change.status');
        });

        //service
        Route::prefix('service')->group(function () {
            Route::get('/', [PanelOfficeServiceController::class, 'index'])->name('panel.office.service.index');
            Route::get('/create', [PanelOfficeServiceController::class, 'create'])->name('panel.office.service.create');
            Route::post('/store', [PanelOfficeServiceController::class, 'store'])->name('panel.office.service.store');
            Route::get('/edit/{id}', [PanelOfficeServiceController::class, 'edit'])->name('panel.office.service.edit');
            Route::patch('/update/{id}', [PanelOfficeServiceController::class, 'update'])->name('panel.office.service.update');
            Route::delete('/destroy/{id}', [PanelOfficeServiceController::class, 'destroy'])->name('panel.office.service.destroy');
            Route::patch('/status/{id}', [PanelOfficeServiceController::class, 'changeStatus'])->name('panel.office.service.change.status');
        });

        //comment
        Route::prefix('comment')->group(function () {
            Route::get('/', [PanelOfficeCommentController::class, 'index'])->name('panel.office.comment.index');
            Route::get('/show/{id}', [PanelOfficeCommentController::class, 'show'])->name('panel.office.comment.show');
            Route::delete('/destroy/{id}', [PanelOfficeCommentController::class, 'destroy'])->name('panel.office.comment.destroy');
            Route::patch('/approved/{id}', [PanelOfficeCommentController::class, 'approved'])->name('panel.office.comment.approved');
            Route::patch('/status/{id}', [PanelOfficeCommentController::class, 'changeStatus'])->name('panel.office.comment.change.status');
            Route::patch('/approve/{id}', [PanelOfficeCommentController::class, 'changeApprove'])->name('panel.office.comment.change.approve');
            Route::post('/answer/{id}', [PanelOfficeCommentController::class, 'answer'])->name('panel.office.comment.answer');
        });
    });


    //client
    Route::prefix('client')->group(function () {

        //user
        Route::prefix('user')->group(function () {
            Route::get('/', [PanelClientUserController::class, 'index'])->name('panel.client.user.index');
            Route::get('/create', [PanelClientUserController::class, 'create'])->name('panel.client.user.create');
            Route::post('/store', [PanelClientUserController::class, 'store'])->name('panel.client.user.store');
            Route::get('/edit/{id}', [PanelClientUserController::class, 'edit'])->name('panel.client.user.edit');
            Route::patch('/update/{id}', [PanelClientUserController::class, 'update'])->name('panel.client.user.update');
            Route::delete('/destroy/{id}', [PanelClientUserController::class, 'destroy'])->name('panel.client.user.destroy');
            Route::patch('/status/{id}', [PanelClientUserController::class, 'status'])->name('panel.client.user.status');
            Route::patch('/activation/{id}', [PanelClientUserController::class, 'activation'])->name('panel.client.user.activation');
            Route::get('/add-roles/{userId}', [PanelClientUserController::class, 'addRoles'])->name('panel.client.user.add-roles');
            Route::post('/role-store/{userId}', [PanelClientUserController::class, 'roleStore'])->name('panel.client.user.role-store');
            Route::delete('/role-remove/{userId}/role/{roleId}', [PanelClientUserController::class, 'roleRemove'])->name('panel.client.user.role-remove');
            Route::delete('/permission-remove/{userId}/permission/{permissionId}', [PanelClientUserController::class, 'rolePermission'])->name('panel.client.user.permission-remove');
        });

        //role
        Route::prefix('role')->group(function () {
            Route::get('/', [PanelClientRoleController::class, 'index'])->name('panel.client.role.index');
            Route::get('/create', [PanelClientRoleController::class, 'create'])->name('panel.client.role.create');
            Route::post('/store', [PanelClientRoleController::class, 'store'])->name('panel.client.role.store');
            Route::get('/edit/{id}', [PanelClientRoleController::class, 'edit'])->name('panel.client.role.edit');
            Route::patch('/update/{id}', [PanelClientRoleController::class, 'update'])->name('panel.client.role.update');
            Route::delete('/destroy/{id}', [PanelClientRoleController::class, 'destroy'])->name('panel.client.role.destroy');
            Route::patch('/status/{id}', [PanelClientRoleController::class, 'changeStatus'])->name('panel.client.role.change.status');
            Route::get('/permission-form/{id}', [PanelClientRoleController::class, 'permissionForm'])->name('panel.client.role.permission-form');
            Route::put('/permission-update/{id}', [PanelClientRoleController::class, 'permissionUpdate'])->name('panel.client.role.permission-update');
        });
    });

    //setting
    Route::prefix('setting')->namespace('Setting')->group(function () {
        Route::get('/', [PanelSettingController::class, 'index'])->name('panel.setting.index');
        Route::get('/edit/{id}', [PanelSettingController::class, 'edit'])->name('panel.setting.edit');
        Route::patch('/update/{id}', [PanelSettingController::class, 'update'])->name('panel.setting.update');
    });

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
