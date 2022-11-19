<?php

namespace App\Http\Repositories\Panel\Content;

use App\Models\Content\Menu;
use Illuminate\Database\Eloquent\Builder;

class MenuRepo
{
    private string $class = Menu::class;

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

    public function changeStatus($menu)
    {
        if ($menu->status === $this->class::STATUS_ACTIVE) {
            return $menu->update(['status' => $this->class::STATUS_INACTIVE]);
        }
        return $menu->update(['status' => $this->class::STATUS_ACTIVE]);
    }

    private function query(): Builder
    {
        return Menu::query();
    }
}
