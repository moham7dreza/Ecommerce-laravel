<?php

namespace App\Http\Services\Dashboard;

use App\Models\Content\Banner;
use Illuminate\Database\Eloquent\Builder;

class BannerService
{
    public function store($request)
    {
        return $this->query()->create([
            'url' => $request->url,
            'title' => $request->title,
            'position' => $request->position,
            'status' => $request->status,
            'image' => $request->image,
        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'url' => $request->url,
            'title' => $request->title,
            'position' => $request->position,
            'status' => $request->status,
            'image' => $request->image,
        ]);
    }

    public function deleteImage($article)
    {
        if (Storage::disk('public')->exists('images/' . $article->imageName)) {
            return Storage::disk('public')->delete('images/' . $article->imageName);
        }

        return null;
    }

    private function query(): Builder
    {
        return Banner::query();
    }
}
