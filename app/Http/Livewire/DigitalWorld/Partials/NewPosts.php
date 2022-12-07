<?php

namespace App\Http\Livewire\DigitalWorld\Partials;

use App\Http\Repositories\DigitalWorld\HomeRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class NewPosts extends Component
{
    use WithPagination;

    public function paginationView(): string
    {
        return 'livewire.digital-world.utils.pagination-links';
    }

    public function render(): Factory|View|Application
    {
        $homeRepo = new HomeRepo();
        $newPosts = $homeRepo->getNewPosts2()->paginate(4);
        return view('livewire.digital-world.partials.new-posts', ['newPosts' => $newPosts])
            ->layout('livewire.digital-world.layouts.master');
    }
}
