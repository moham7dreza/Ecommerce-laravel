<?php

namespace App\Http\Livewire\DigitalWorld\Partials;

use App\Http\Repositories\DigitalWorld\HomeRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class VipPosts extends Component
{
    public Collection $vipPosts;

    public function mount()
    {
        $homeRepo = new HomeRepo();
        $this->vipPosts = $homeRepo->vip_posts()->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.partials.vip-posts');
    }
}
