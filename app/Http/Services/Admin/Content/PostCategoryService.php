<?php

namespace App\Http\Services\Admin\Content;

use App\Models\Content\PostCategory;
use Illuminate\Database\Eloquent\Builder;

class PostCategoryService
{
    public function store($inputs)
    {
        return $this->query()->create($inputs);
    }

    public function update($postCategory, $inputs)
    {
        return $postCategory->update($inputs);
    }

    public function destroy($postCategory)
    {
        return $postCategory->delete();
    }

    private function query(): Builder
    {
        return PostCategory::query();
    }
}
