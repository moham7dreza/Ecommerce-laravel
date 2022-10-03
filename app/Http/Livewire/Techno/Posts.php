<?php

namespace App\Http\Livewire\Techno;

use App\Models\Content\Banner;
use App\Models\Content\Post;
use Livewire\Component;

class Posts extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::query()->where('status', 1)->get();
    }

    public function render()
    {
        return view('livewire.techno.posts', [
            'posts' => $this->posts,
            ])
            ->extends('customer.layouts.master-one-col');
    }
}

