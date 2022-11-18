<?php

namespace App\Http\Repositories\Panel;

use App\Models\Content\Comment;
use Illuminate\Database\Eloquent\Builder;

class CommentRepo
{
    private string $class = Comment::class;

    public function index(): Builder
    {
        return $this->query()->where('commentable_type', 'App\Models\Content\Post')->latest();
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function changeStatus($comment)
    {
        if ($comment->status === $this->class::STATUS_ACTIVE) {
            return $comment->update(['status' => $this->class::STATUS_INACTIVE]);
        }
        return $comment->update(['status' => $this->class::STATUS_ACTIVE]);
    }

    public function getLatestComments(): Builder
    {
        return $this->query()->where([
            ['status', $this->class::STATUS_ACTIVE],
            ['commentable_type', 'App\Models\Content\Post']
        ])->latest();
    }

    private function query(): Builder
    {
        return Comment::query();
    }
}
