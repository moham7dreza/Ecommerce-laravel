<?php

namespace App\Http\Livewire\DigitalWorld\Partials;

use App\Http\Repositories\DigitalWorld\HomeRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class LeftSidebar extends Component
{
    public Collection $postsOrderByView;
    public Collection $authorUsers;
    public Collection $vipPostsOrderByView;

    public function mount()
    {
        $homeRepo = new HomeRepo();
        $this->postsOrderByView = $homeRepo->getPostsOrderByView();
        $this->vipPostsOrderByView = $homeRepo->getVipPostsOrderByView();
        $this->authorUsers = $homeRepo->getAuthorUsers();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.partials.left-sidebar');
    }
}
