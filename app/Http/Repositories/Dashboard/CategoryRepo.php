<?php

namespace App\Http\Repositories\Dashboard;

use App\Models\Content\PostCategory;
use Illuminate\Database\Eloquent\Builder;

class CategoryRepo
{
    public string $class = PostCategory::class;

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

    public function changeStatus($category)
    {
        if ($category->status === PostCategory::STATUS_ACTIVE) {
            return $category->update(['status' => PostCategory::STATUS_INACTIVE]);
        }
        return $category->update(['status' => PostCategory::STATUS_ACTIVE]);
    }

    // Home Query
    public function getActiveCategories(): Builder
    {
        return $this->query()->where('status', PostCategory::STATUS_ACTIVE)->latest();
    }

    public function findBySlug($slug)
    {
        return $this->query()->where([
            ['status', PostCategory::STATUS_ACTIVE],
            ['slug', $slug]
        ])->first();
    }

    private function query(): Builder
    {
        return PostCategory::query();
    }
}
