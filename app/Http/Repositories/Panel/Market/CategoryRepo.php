<?php

namespace App\Http\Repositories\Panel\Market;

use App\Models\Market\ProductCategory;
use Illuminate\Database\Eloquent\Builder;

class CategoryRepo
{
    public string $class = ProductCategory::class;

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
        if ($category->status === $this->class::STATUS_ACTIVE) {
            return $category->update(['status' => $this->class::STATUS_INACTIVE]);
        }
        return $category->update(['status' => $this->class::STATUS_ACTIVE]);
    }

    // Home Query
    public function getActiveCategories(): Builder
    {
        return $this->query()->where('status', $this->class::STATUS_ACTIVE)->latest();
    }

    public function findBySlug($slug)
    {
        return $this->query()->where([
            ['status', $this->class::STATUS_ACTIVE],
            ['slug', $slug]
        ])->first();
    }

    private function query(): Builder
    {
        return $this->class::query();
    }
}
