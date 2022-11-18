<?php

namespace App\Http\Repositories\Panel;

use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use App\Models\ItCity\Store\Hardware;
use App\Models\User;

class PanelRepo
{
    public function usersCount(): int
    {
        return User::query()->count();
    }

    public function postsCount(): int
    {
        return Post::query()->count();
    }

    public function hardwareCount(): int
    {
        return Hardware::query()->count();
    }

    public function commentsCount(): int
    {
        return Comment::query()->where('commentable_type', 'App\Models\Market\Product')->count();
    }

    public function postCategoriesCount(): int
    {
        return PostCategory::query()->count();
    }

    public function hardwareCategoriesCount(): int
    {
        return PostCategory::query()->count();
    }

    public function getLatestAuthorUsers()
    {
        return User::query()->latest()->limit(4)->get();
    }

    public function getLatestPosts()
    {
        return Post::query()->latest()->limit(10)->get();
    }

    public function getLatestHardware()
    {
        return Hardware::query()->latest()->limit(10)->get();
    }
}
