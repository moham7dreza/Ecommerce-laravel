<?php

namespace App\Http\Repositories\Dashboard;

use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use App\Models\User;

class DashboardRepo
{
    public function usersCount(): int
    {
        return User::query()->count();
    }

    public function postsCount(): int
    {
        return Post::query()->count();
    }

    public function commentsCount(): int
    {
        return Comment::query()->count();
    }

    public function postCategoriesCount(): int
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
}
