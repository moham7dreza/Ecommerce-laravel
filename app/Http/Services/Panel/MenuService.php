<?php

namespace App\Http\Services\Panel;

use App\Models\Content\Menu;
use Illuminate\Database\Eloquent\Builder;

class MenuService
{
    private string $class = Menu::class;

    public function store($request)
    {
        return $this->query()->create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'url' => $request->url,
            'status' => $request->status,
            'location' => $request->location,
            'level' => $request->level,
        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'url' => $request->url,
            'status' => $request->status,
            'level' => $request->level,
        ]);
    }

    public function setLevel($parent_id)
    {
        return is_null($parent_id) ? $this->class::LEVEL_MAIN_MENU : $this->class::LEVEL_SUB_MENU;
    }

    private function query(): Builder
    {
        return Menu::query();
    }
}
