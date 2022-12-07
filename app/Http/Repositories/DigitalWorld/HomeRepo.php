<?php

namespace App\Http\Repositories\DigitalWorld;

use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class HomeRepo
{
    public function vip_posts(): Builder
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->latest();
    }

    public function getActiveCategories(): Collection|array
    {
        return PostCategory::query()->where('status', Post::STATUS_ACTIVE)->latest()->get();
    }

    public function getVipPostsOrderByView(): Collection|array
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->latest()->limit(5)->get();
    }

    public function getAuthorUsers(): Collection|array
    {
        return User::query()->limit(20)->get();
    }

    public function getPostsOrderByView(): Collection|array
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->latest()->limit(3)->get();
    }

    public function getNewPosts(): Collection|array
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->latest()->limit(8)->get();
    }

    public function getNewPosts2()
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->latest();
    }

    public function authors(): Builder
    {
        return User::query()->latest();
    }
}
