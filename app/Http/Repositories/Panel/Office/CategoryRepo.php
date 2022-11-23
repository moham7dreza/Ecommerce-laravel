<?php

namespace App\Http\Repositories\Panel\Office;

use App\Models\ItCity\Office\ServiceCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Share\Enums\Status;

class CategoryRepo
{
    public string $class = ServiceCategory::class;

    public function index(): Builder
    {
        return $this->query()->latest();
    }

    public function findById($id): Model|Collection|Builder|array|null
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function changeStatus($category)
    {
        if ($category->status === Status::STATUS_ACTIVE) {
            return $category->update(['status' => Status::STATUS_INACTIVE]);
        }
        return $category->update(['status' => Status::STATUS_ACTIVE]);
    }

    // Home Query
    public function getActiveCategories(): Builder
    {
        return $this->query()->where('status', Status::STATUS_ACTIVE)->latest();
    }

    public function findBySlug($slug)
    {
        return $this->query()->where([
            ['status', Status::STATUS_ACTIVE],
            ['slug', $slug]
        ])->first();
    }

    private function query(): Builder
    {
        return $this->class::query();
    }
}
