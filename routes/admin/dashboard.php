<?php
// dashboard controllers
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Dashboard\AdminToController;
use App\Http\Controllers\Dashboard\BannerController as PostBannerController;
use App\Http\Controllers\Dashboard\CategoryController as PostCategoryController;
use App\Http\Controllers\Dashboard\CommentController as PostCommentController;
use App\Http\Controllers\Dashboard\MenuController as PostMenuController;
use App\Http\Controllers\Dashboard\PostController as PostsController;
use App\Http\Controllers\Dashboard\RoleController as PostRoleController;
use App\Http\Controllers\Dashboard\SettingController as PostSettingController;
use App\Http\Controllers\Dashboard\UserController as PostUserController;
use Illuminate\Support\Facades\Route;

//

/***********************************************************************************************************************
 *
 *  adminto dashboard
 *  */
Route::prefix('adminto')->middleware(['auth', 'admin.check', 'can:permission-adminto-panel'])->namespace('Dashboard')
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
