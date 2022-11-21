<?php

namespace App\Http\Repositories\Panel\Market;

use App\Models\Content\Comment;
use Illuminate\Database\Eloquent\Builder;

class CommentRepo
{
    private string $class = Comment::class;

    public function productComments(): Builder
    {
        return $this->query()->where('commentable_type', 'App\Models\Market\Product')->latest();
    }

    public function postsComments(): Builder
    {
        return $this->query()->where('commentable_type', 'App\Models\Content\Post')->latest();
    }

    public function serviceComments(): Builder
    {
        return $this->query()->where('commentable_type', 'App\Models\ItCity\Office\Service')->latest();
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

    public function changeApprove($comment)
    {
        if ($comment->approved === $this->class::APPROVED) {
            return $comment->update(['approved' => $this->class::NOT_APPROVED]);
        }
        return $comment->update(['approved' => $this->class::APPROVED]);
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
