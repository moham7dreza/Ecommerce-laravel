<?php

namespace App\Http\Services\Panel;

use App\Models\Market\Brand;
use Illuminate\Database\Eloquent\Builder;

class BrandService
{
    private string $class = Brand::class;

    public function store($request)
    {
        return $this->query()->create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $request->image,
            'tags' => $request->tags,
        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $request->image,
            'tags' => $request->tags,
        ]);
    }

    private function query(): Builder
    {
        return $this->class::query();
    }
}
