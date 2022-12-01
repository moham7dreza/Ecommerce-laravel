<?php

namespace App\Http\Livewire\DigitalWorld\Post;

use App\Models\Content\Comment;
use App\Models\Content\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use App\Http\Repositories\Admin\Content\PostRepo;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $posts;
    public Collection $viewsPosts;

    public function mount()
    {
        $postRepo = new PostRepo();
        $this->posts = Post::query()->where('status', Post::STATUS_ACTIVE)->latest()->get();
        $this->viewsPosts = $postRepo->getPostsByViews()->latest()->limit(5)->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.post.home');
    }
}
