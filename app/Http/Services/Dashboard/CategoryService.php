<?php

namespace App\Http\Services\Dashboard;

use App\Models\Content\PostCategory;

class CategoryService
{
    public function store($request)
    {
        return PostCategory::query()->create([
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
        return PostCategory::query()->where('id', $id)->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $request->image,
            'tags' => $request->tags,
        ]);
    }
}
