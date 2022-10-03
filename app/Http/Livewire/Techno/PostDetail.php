<?php

namespace App\Http\Livewire\Techno;

use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostDetail extends Component
{
    public $post_id;
    public $title;
    public $body;
    public $comment_body;
    public $post;

    protected $rules = [
        'comment_body' => 'required|max:2000',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->post_id = $post->id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addComment()
    {
//        $this->validate();
        $inputs['body'] = str_replace(PHP_EOL, '<br/>', $this->comment_body);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['commentable_id'] = $this->post_id;
        $inputs['commentable_type'] = Post::class;
        Comment::create($inputs);
        $this->emit('comment-added', $this->post_id);
    }

    protected $listeners = ['comment-added' => 'commentAdded'];

    public function commentAdded($post_id)
    {
        $this->post = Post::query()->find($this->post_id);
        $this->reset();
//        $this->post
    }

    public function render()
    {
        return view('livewire.techno.post-detail', [
            'post' => $this->post
        ])->extends('customer.layouts.master-one-col');
    }
}
