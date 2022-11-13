<?php

namespace App\Http\Services\Admin\Content;

use App\Models\Content\Post;
use Illuminate\Database\Eloquent\Builder;

class PostService
{
    public function store($inputs)
    {
        return $this->query()->create($inputs);
    }

    public function update($post, $inputs)
    {
        return $post->update($inputs);
    }

    public function destroy($post)
    {
        return $post->delete();
    }

    private function query(): Builder
    {
        return Post::query();
    }
}
