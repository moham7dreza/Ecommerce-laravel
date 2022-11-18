<?php

namespace App\Http\Repositories\Panel;

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

    public function changeStatus($banner)
    {
        if ($banner->status === Banner::STATUS_ACTIVE) {
            return $banner->update(['status' => Banner::STATUS_INACTIVE]);
        }
        return $banner->update(['status' => Banner::STATUS_ACTIVE]);
    }

    public function getBannerByPosition(int $position): Builder
    {
        return $this->query()->where('position', $position);
    }

    private function query(): Builder
    {
        return Banner::query();
    }
}
