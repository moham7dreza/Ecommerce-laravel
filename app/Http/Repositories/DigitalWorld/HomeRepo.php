<?php

namespace App\Http\Repositories\DigitalWorld;

use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use App\Models\User;
use App\Models\User\Permission;
use Illuminate\Database\Eloquent\Builder;

class HomeRepo
{
    public function vip_posts(): Builder
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->latest();
    }

    public function getActiveCategories()
    {
        return PostCategory::query()->where('status', Post::STATUS_ACTIVE)->latest()->get();
    }

    public function getVipPostsOrderByView()
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->latest()->limit(5)->get();
    }

    public function getAuthorUsers()
    {
        return User::query()->limit(20)->get();
    }

    public function getPostsOrderByView()
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->latest()->limit(3)->get();
    }

    public function getNewPosts()
    {
        return Post::query()->where('status',Post::STATUS_ACTIVE)->latest()->limit(8)->get();
    }

    public function authors(): Builder
    {
        return User::query()->latest();
    }
}
