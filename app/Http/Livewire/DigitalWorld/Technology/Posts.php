<?php

namespace App\Http\Livewire\DigitalWorld\Technology;

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
        return view('livewire.digital-world.technology.posts', [
            'posts' => $this->posts,
            ])
            ->extends('customer.layouts.master-one-col');
    }
}

