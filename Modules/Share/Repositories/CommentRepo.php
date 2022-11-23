<?php

namespace Share\Repositories;

use App\Models\Content\Comment;
use Illuminate\Database\Eloquent\Builder;

class CommentRepo
{
    private string $class = Comment::class;

    private string $productModelPath = 'App\Models\Market\Product';
    private string $serviceModelPath = 'App\Models\ItCity\Office\Service';
    private string $postModelPath = 'App\Models\Content\Post';

    public function productComments(): Builder
    {
        return $this->query()->where('commentable_type', $this->productModelPath)->latest();
    }

    public function postsComments(): Builder
    {
        return $this->query()->where('commentable_type', $this->postModelPath)->latest();
    }

    public function serviceComments(): Builder
    {
        return $this->query()->where('commentable_type', $this->serviceModelPath)->latest();
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
            ['commentable_type', $this->postModelPath]
        ])->latest();
    }

    public function getLatestProductComments(): Builder
    {
        return $this->query()->where([
            ['status', $this->class::STATUS_ACTIVE],
            ['commentable_type', $this->productModelPath]
        ])->latest();
    }

    public function getLatestServiceComments(): Builder
    {
        return $this->query()->where([
            ['status', $this->class::STATUS_ACTIVE],
            ['commentable_type', $this->serviceModelPath]
        ])->latest();
    }

    private function query(): Builder
    {
        return Comment::query();
    }
}
