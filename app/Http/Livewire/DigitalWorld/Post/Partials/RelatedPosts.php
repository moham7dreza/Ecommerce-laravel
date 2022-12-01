<?php

namespace App\Http\Livewire\DigitalWorld\Post\Partials;

use App\Http\Repositories\Admin\Content\PostRepo;
use App\Models\Content\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class RelatedPosts extends Component
{
    public Collection $relatedPosts;

    public function mount(Post $post)
    {
        $postRepo = new PostRepo();
        $this->relatedPosts = $postRepo->relatedPosts($post->category->id, $post->id)->latest()->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.post.partials.related-posts');
    }
}
