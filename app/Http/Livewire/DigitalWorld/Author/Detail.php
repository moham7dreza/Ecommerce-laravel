<?php

namespace App\Http\Livewire\DigitalWorld\Author;

use App\Http\Repositories\Admin\Content\PostRepo;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Detail extends Component
{
    public User $author;
    public Collection $posts;

    public function mount(User $user)
    {
        $this->author = $user;
        $postRepo = new PostRepo();
        $this->posts = $postRepo->getPostsByUserID($user->id)->latest()->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.author.detail')
            ->layout('livewire.digital-world.layouts.master')
            ->layoutData(['title' => $this->author->fullName]);
    }
}
