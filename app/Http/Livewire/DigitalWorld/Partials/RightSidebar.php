<?php

namespace App\Http\Livewire\DigitalWorld\Partials;

use App\Http\Repositories\DigitalWorld\HomeRepo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class RightSidebar extends Component
{
    public Collection $activeCategories;

    public function mount()
    {
        $homeRepo = new HomeRepo();
        $this->activeCategories = $homeRepo->getActiveCategories();
    }
    public function render()
    {
        return view('livewire.digital-world.partials.right-sidebar')->layout('livewire.digital-world.layouts.master');
    }
}
