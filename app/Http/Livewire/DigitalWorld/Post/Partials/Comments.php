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

    protected $listeners = ['sweetAlert' => '$refresh'];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function deleteComment($id)
    {
        Comment::find($id)->delete();
        $this->emit('showAlert', "نظر با موفقیت حذف شد");
    }

    public function render(): Factory|View|Application
    {
        $comments = $this->post->activeComments()->latest()->get();
        return view('livewire.digital-world.post.partials.comments', ['comments' => $comments]);
    }
}
