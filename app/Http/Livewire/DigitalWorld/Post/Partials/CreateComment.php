<?php

namespace App\Http\Livewire\DigitalWorld\Post\Partials;

use App\Http\Repositories\Admin\Content\PostRepo;
use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\User\Permission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Share\Repositories\ShareRepo;
use Share\Services\CommentService;

class CreateComment extends Component
{
    public Post $post;
    public string $body = "";

    protected array $rules = [
        'body' => 'required|string|min:3|max:1000',
//        'comment_text' => 'required | regex:/^[ا-یa-zA-Z0-9 ? : - . ، * ! ]+$/u'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function addComment()
    {
        $this->validate();
        Comment::query()->create([
            'author_id' => auth()->id(),
            'parent_id' => null,
            'commentable_id' => $this->post->id,
            'commentable_type' => get_class($this->post),
            'body' => str_replace(PHP_EOL, '<br/>', $this->body),
            'status' => $this->setStatus(),
            'approved' => $this->setStatus(),
        ]);
        $this->reset(['body']);

        $this->emit('sweetAlert', "نظر با موفقیت ثبت شد");
//        $this->emit('showAlert', "نظر با موفقیت ثبت شد");
    }

    private function setStatus(): int
    {
        $permission = Permission::query()->where('name', Permission::PERMISSION_SUPER_ADMIN['name'])->first();
        if (auth()->user()->hasPermissionTo($permission)) {
            return Comment::STATUS_ACTIVE;
        }

        return Comment::STATUS_INACTIVE;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.post.partials.create-comment');
    }
}
