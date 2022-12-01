<?php

namespace App\Http\Livewire\DigitalWorld\Post;

use App\Models\Content\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Card extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.post.card');
    }
}
