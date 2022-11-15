<?php

namespace App\Http\Services\Dashboard;

use App\Models\Content\PostCategory;

class CategoryService
{
    public function store($request)
    {
        return PostCategory::query()->create([
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'title' => $request->title,
            'slug' => $this->makeSlug($request->title),
            'keywords' => $request->keywords,
            'description' => $request->description,
            'status' => $request->status,
        ]);
    }

    public function update($request, $id)
    {
        return PostCategory::query()->where('id', $id)->update([
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'title' => $request->title,
            'slug' => $this->makeSlug($request->title),
            'keywords' => $request->keywords,
            'description' => $request->description,
            'status' => $request->status,
        ]);
    }
}
