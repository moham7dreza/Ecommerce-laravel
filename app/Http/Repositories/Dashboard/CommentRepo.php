<?php

namespace App\Http\Repositories\Dashboard;

use App\Models\Content\Comment;
use Illuminate\Database\Eloquent\Builder;

class CommentRepo
{
    public function index(): Builder
    {
        return $this->query()->latest();
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function changeStatus($id, $status)
    {
//        $comment = $this->findById($id);
//        return $comment->update(['status' => $status]);
        return $this->findById($id)->update(['status' => $status]);
    }

    public function getLatestComments()
    {
        return $this->query()->where('status', Comment::STATUS_ACTIVE)->latest();
    }

    private function query()
    {
        return Comment::query();
    }
}
