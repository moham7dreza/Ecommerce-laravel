<?php

namespace App\Http\Repositories\Panel\Office;

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

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function findBySlug($slug)
    {
        return $this->query()->whereSlug($slug)->first();
    }

    public function changeStatus($service)
    {
        if ($service->status === $this->class::STATUS_ACTIVE) {
            return $service->update(['status' => $this->class::STATUS_INACTIVE]);
        }
        return $service->update(['status' => $this->class::STATUS_ACTIVE]);
    }


    public function home()
    {
        return $this->query()->where('status', $this->class::STATUS_ACTIVE)->latest();
    }

    private function query(): Builder
    {
        return $this->class::query();
    }
}
