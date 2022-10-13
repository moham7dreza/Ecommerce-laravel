<?php

namespace App\Http\Livewire\DigitalWorld\Technology;

use App\Models\Content\Post;
use Livewire\Component;

class PostCard extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.digital-world.technology.post-card');
    }
}
