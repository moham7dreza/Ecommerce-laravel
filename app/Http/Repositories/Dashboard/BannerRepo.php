<?php

namespace App\Http\Repositories\Dashboard;

use App\Models\Content\Banner;
use Illuminate\Database\Eloquent\Builder;

class BannerRepo
{
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

    public function getAdvByLocation(string $location)
    {
        return $this->query()->where('location', $location);
    }

    private function query()
    {
        return Banner::query();
    }
}
