<?php

namespace App\Http\Livewire\DigitalWorld\Post;

use App\Http\Repositories\Admin\Content\PostRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public function paginationView(): string
    {
        return 'livewire.digital-world.utils.pagination-links';
    }

    public Collection $viewsPosts;

    public function mount()
    {
        $postRepo = new PostRepo();
        $this->viewsPosts = $postRepo->getPostsByViews()->latest()->limit(5)->get();
    }

    public function render(): Factory|View|Application
    {
        $postRepo = new PostRepo();
        $posts = $postRepo->home()->paginate(4);
        return view('livewire.digital-world.post.home', ['posts' => $posts])
            ->layout('livewire.digital-world.layouts.master')
            ->layoutData(['title' => 'پست ها']);
    }
}
