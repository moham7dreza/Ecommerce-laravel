<?php

namespace App\Http\Repositories\Admin\Content;

use App\Models\Content\PostCategory;
use Illuminate\Database\Eloquent\Builder;

class PostCategoryRepo
{
    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function getParentCategories($cat_id)
    {
        return $this->query()->whereNull('parent_id')
            ->where('status', PostCategory::STATUS_ACTIVE)->get()->except($cat_id);
    }

    private function query(): Builder
    {
        return PostCategory::query();
    }
}
