<?php

namespace App\Http\Livewire\DigitalWorld\Post\Partials;

use App\Models\Content\Comment;
use App\Models\Content\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Comments extends Component
{
    public Post $post;
    public Collection $comments;

    public function mount(Post $post, Collection $comments)
    {
        $this->post = $post;
        $this->comments = $comments;
    }

    public function render(): Factory|View|Application
    {
//        $comments = Comment::query()->where([
//            ['approved', Comment::APPROVED],
//            ['status', Comment::STATUS_ACTIVE],
//            ['commentable_id', $this->post->id],
//            ['commentable_type', get_class($this->post)],
//        ])->whereNull('parent_id')->latest()->get();
        return view('livewire.digital-world.post.partials.comments', ['comments' => $this->comments]);
    }
}
