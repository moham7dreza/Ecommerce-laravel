<?php

namespace App\Http\Livewire\Techno;

use App\Models\Content\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.techno.post-detail', ['post' => $this->post])->extends('customer.layouts.master-one-col');
    }
}
