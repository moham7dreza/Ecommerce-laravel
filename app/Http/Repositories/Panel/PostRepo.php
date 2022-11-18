<?php

namespace App\Http\Repositories\Panel;

use App\Models\Content\Post;
use Illuminate\Database\Eloquent\Builder;

class PostRepo
{
    public string $class = Post::class;

    public function index(): Builder
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function findBySlug($slug)
    {
        return $this->query()->whereSlug($slug)->first();
    }

    public function changeStatus($post)
    {
        if ($post->status === $this->class::STATUS_ACTIVE) {
            return $post->update(['status' => $this->class::STATUS_INACTIVE]);
        }
        return $post->update(['status' => $this->class::STATUS_ACTIVE]);
    }

    // Home Query
    public function relatedArticles($categoryId, $id)
    {
        return $this->query()
            ->where('category_id', $categoryId)
            ->whereStatus(Article::STATUS_ACTIVE)
            ->where('id', '!=', $id);
    }

    public function home()
    {
        return $this->query()->whereStatus(Article::STATUS_ACTIVE)->latest();
    }

    public function getArticlesByViews()
    {
        return $this->query()->whereStatus(Article::STATUS_ACTIVE)->orderByViews();
    }

    public function getArticlesByUserId($user_id)
    {
        return $this->query()->whereStatus(Article::STATUS_ACTIVE)->where('user_id', $user_id);
    }

    public function getarticlesByCategoryId($category_id)
    {
        return $this->query()->whereStatus(Article::STATUS_ACTIVE)->where('category_id', $category_id);
    }

    private function query(): Builder
    {
        return Post::query();
    }
}
