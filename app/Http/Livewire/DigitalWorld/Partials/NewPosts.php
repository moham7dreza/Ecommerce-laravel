<?php

namespace App\Http\Livewire\DigitalWorld\Partials;

use App\Http\Repositories\DigitalWorld\HomeRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class NewPosts extends Component
{
    public Collection $newPosts;

    public function mount()
    {
        $homeRepo = new HomeRepo();
        $this->newPosts = $homeRepo->getNewPosts();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.partials.new-posts');
    }
}
