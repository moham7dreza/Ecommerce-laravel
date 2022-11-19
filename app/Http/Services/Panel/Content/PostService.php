<?php

namespace App\Http\Services\Panel\Content;

use App\Http\Services\Panel\Storage;
use App\Models\Content\Post;
use Illuminate\Database\Eloquent\Builder;

class PostService
{
    public function store($request)
    {
        return $this->query()->create([
            'author_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'time_to_read' => $request->time_to_read,
            'image' => $request->image,
            'status' => $request->status,
            'body' => $request->body,
            'summary' => $request->summary,
            'tags' => $request->tags,
            'published_at' => $request->published_at,
            'commentable' => $request->commentable,
        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'time_to_read' => $request->time_to_read,
            'image' => $request->image,
            'status' => $request->status,
            'body' => $request->body,
            'summary' => $request->summary,
            'tags' => $request->tags,
            'published_at' => $request->published_at,
            'commentable' => $request->commentable,
        ]);
    }

    public function deleteImage($article)
    {
//        if (File::exists(public_path('storage/images/' . $article->imageName))) {
//            return File::delete(public_path('storage/images/' . $article->imageName));
//        }
        if (Storage::disk('public')->exists('images/' . $article->imageName)) {
            return Storage::disk('public')->delete('images/' . $article->imageName);
        }

        return null;
    }

    private function makeSlug($title)
    {
        $url = str_replace('_', '', $title);
        return preg_replace('/\s+/', '-', $url);
    }

    private function query(): Builder
    {
        return Post::query();
    }
}
