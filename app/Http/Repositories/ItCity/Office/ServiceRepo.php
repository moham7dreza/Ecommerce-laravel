<?php

namespace App\Http\Repositories\ItCity\Office;

use App\Models\ItCity\Office\Service;
use Illuminate\Database\Eloquent\Builder;

class ServiceRepo
{
    public string $class = Service::class;

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

    public function parentServices(): Builder
    {
        return $this->query()->where([
            ['status', $this->class::STATUS_ACTIVE],
            ['service_availability', $this->class::SERVICE_AVAILABLE],
            ['parent_id', null]
        ])->latest();
    }

    public function services(): Builder
    {
        return $this->query()->where([
            ['status', $this->class::STATUS_ACTIVE],
            ['service_availability', $this->class::SERVICE_AVAILABLE],
            ['parent_id', '!=', null]
        ])->latest();
    }

    public function relatedServices($service): Builder
    {
        return $this->query()->where([
            ['status', $this->class::STATUS_ACTIVE],
            ['service_availability', $this->class::SERVICE_AVAILABLE],
        ])->orWhere([
            ['parent_id', $service->parent_id],
            ['category_id', $service->category_id],
            ['brand_id', $service->brand_id]
        ])->latest();
    }

    public function home(): Builder
    {
        return $this->query()->where('status', $this->class::STATUS_ACTIVE)->latest();
    }

    private function query(): Builder
    {
        return $this->class::query();
    }
}
