<?php

namespace App\Http\Livewire\Techno;

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
        return view('livewire.techno.post-card');
    }
}
