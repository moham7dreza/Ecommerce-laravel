<?php

namespace App\Http\Repositories\ItCity\Store;

use App\Models\ItCity\Store\Hardware;
use App\Models\Market\AmazingSale;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class HardwareRepo
{
    public string $class = Hardware::class;

    public function index(): Builder
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

    public function relatedHardware($category_id): Builder
    {
        return $this->query()->where([
            ['status', $this->class::STATUS_ACTIVE],
            ['category_id', $category_id]
        ])->latest();
    }

    public function amazingSales(): Builder
    {
        return AmazingSale::query()->where([
            ['start_date', '<', Carbon::now()],
            ['end_date', '>', Carbon::now()],
            ['percentage', '>=', 1],
            ['status', 1]
        ])->latest();
    }

    public function getCategoryHardware($category)
    {
        return $category->products;
    }

    private function query(): Builder
    {
        return $this->class::query();
    }
}
