<?php

namespace App\Http\Repositories\Panel\Market;

use App\Models\ItCity\Store\Hardware;
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

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function findBySlug($slug)
    {
        return $this->query()->where('slug', $slug)->first();
    }

    public function changeStatus($hardware)
    {
        if ($hardware->status === $this->class::STATUS_ACTIVE) {
            return $hardware->update(['status' => $this->class::STATUS_INACTIVE]);
        }
        return $hardware->update(['status' => $this->class::STATUS_ACTIVE]);
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
