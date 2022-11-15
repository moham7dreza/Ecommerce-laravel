<?php

namespace App\Http\Repositories\Dashboard;

use App\Models\Content\Menu;
use Illuminate\Database\Eloquent\Builder;

class MenuRepo
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

    private function query(): Builder
    {
        return Menu::query();
    }
}
