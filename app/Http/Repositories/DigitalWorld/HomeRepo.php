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
        return PostCategory::query()->where('status', PostCategory::STATUS_ACTIVE)->latest()->get();
    }

    public function getVipPostsOrderByView(): Collection|array
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->orderByViews()->latest()->limit(5)->get();
    }

    public function getAuthorUsers(): \Illuminate\Support\Collection
    {
        $authorUserPermission = User\Permission::query()->where('name', User\Permission::PERMISSION_POST_AUTHORS['name'])->first();
        $users = collect();
        foreach (User::query()->limit(20)->get() as $user) {
            if ($user->hasPermissionTo($authorUserPermission)) {
                $users->push($user);
            }
        }
        return $users;
    }

    public function getPostsOrderByView(): Collection|array
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->orderByViews()->latest()->limit(3)->get();
    }

    public function getNewPosts()
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->latest()->paginate(3);
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
