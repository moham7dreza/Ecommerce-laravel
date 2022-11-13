<?php

namespace App\Http\Repositories\Admin\Content;

use App\Models\Content\Post;
use Illuminate\Database\Eloquent\Builder;

class PostRepo
{
    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function findBySlug($slug)
    {
        return $this->query()->where('slug', $slug)->first();
    }

    // home queries
    public function relatedPosts($category_id, $id): Builder
    {
        return $this->query()->where([
            ['status', Post::STATUS_ACTIVE],
            ['category_id', $category_id],
            ['id', '!=', $id]
        ]);
    }

    public function home(): Builder
    {
        return $this->query()->where('status', Post::STATUS_ACTIVE)->latest();
    }

    private function query(): Builder
    {
        return Post::query();
    }
}
