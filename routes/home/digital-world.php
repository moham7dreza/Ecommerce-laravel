<?php

// digital world
use App\Http\Controllers\DigitalWorld\HomeController as DigiHomeController;
use App\Http\Livewire\DigitalWorld\Author\Detail as DigitalWorldAuthorDetailController;
use App\Http\Livewire\DigitalWorld\Author\Home as DigitalWorldAuthorController;
use App\Http\Livewire\DigitalWorld\Category\Home as DigitalWorldCategoryController;
use App\Http\Livewire\DigitalWorld\Home as DigitalWorldHomeController;
use App\Http\Livewire\DigitalWorld\Post\Detail as DigitalWorldPostDetailController;
use App\Http\Livewire\DigitalWorld\Post\Home as DigitalWorldPostController;
use App\Http\Livewire\DigitalWorld\Post\Search as DigitalWorldPostSearchController;
use App\Http\Livewire\DigitalWorld\Technology\CategoryPosts;
use App\Http\Livewire\DigitalWorld\Technology\PostDetail;
use App\Http\Livewire\DigitalWorld\Technology\Posts;
use Illuminate\Support\Facades\Route;

// implement with livewire


/***********************************************************************************************************************
 *
 * SECTION #2 : DigitalWorld
 * */

Route::prefix('digital-world')->group(function () {
    Route::prefix('livewire')->group(function ($router) {
        $router->get('home', DigitalWorldHomeController::class)->name('digital-world.livewire.home');
        Route::prefix('post')->group(function ($router) {
            $router->get('home', DigitalWorldPostController::class)->name('digital-world.livewire.post.home');
            $router->get('search/{catId}/{char?}', DigitalWorldPostSearchController::class)->name('digital-world.livewire.post.search');
            $router->get('{post:slug}/detail', DigitalWorldPostDetailController::class)->name('digital-world.livewire.post.detail');
        });
        Route::prefix('category')->group(function ($router) {
            $router->get('{postCategory:slug}/posts', DigitalWorldCategoryController::class)->name('digital-world.livewire.category.posts');
        });
        Route::prefix('author')->group(function ($router) {
            $router->get('home', DigitalWorldAuthorController::class)->name('digital-world.livewire.author.home');
            $router->get('{user:first_name}/detail', DigitalWorldAuthorDetailController::class)->name('digital-world.livewire.author.detail');
        });
    });
    Route::prefix('technology')->group(function () {
        // main page - show all posts
        Route::get('/posts', Posts::class)->name('digital-world.technology.index');
        // single page of show post details
        Route::get('/post/{post:slug}', PostDetail::class)->name('digital-world.technology.post.detail');
        // add comment to post in that page
//    Route::post('/add-comment/post/{post:slug}', \App\Http\Livewire\Techno\AddCommentToPost::class)->name('technology.post.add-comment');
        // add post to favorites in main page of all posts
//    Route::get('/add-to-favorite/post/{post:slug}', \App\Http\Livewire\Techno\Posts::class)->name('technology.post.add-to-favorite');
        // show all posts of one special category
        Route::get('/category/{postCategory}/posts', CategoryPosts::class)->name('digital-world.technology.category.posts');
    });
    /******************************************************************************************************************
     * main digital island page
     *
     *  */
    Route::get('/', [DigiHomeController::class, 'home'])->name('digital-world.home');
    Route::get('/post/{post:slug}', [DigiHomeController::class, 'post'])->name('digital-world.post.detail');
    Route::get('/posts/all', [DigiHomeController::class, 'posts'])->name('digital-world.posts.all');
    Route::get('/posts/authors', [DigiHomeController::class, 'authors'])->name('digital-world.posts.authors');
    Route::get('/posts/author/{user:email}', [DigiHomeController::class, 'author'])->name('digital-world.posts.author');
    Route::get('/category/{postCategory:slug}/posts', [DigiHomeController::class, 'category'])->name('digital-world.category.posts');
    Route::post('/add-comment/post/{post:slug}', [DigiHomeController::class, 'addComment'])->name('digital-world.post.add-comments');
    Route::post('/add-to-favorite/{post:slug}', [DigiHomeController::class, 'addToFavorite'])->name('digital-world.post.add-to-favorite');
    Route::post('/post/{post:slug}/like', [DigiHomeController::class, 'likePost'])->name('digital-world.post.like');
});
