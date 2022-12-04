<?php

namespace App\Http\Livewire\DigitalWorld\Author;

use App\Http\Repositories\DigitalWorld\HomeRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Home extends Component
{
    public Collection $authors;

    public function mount()
    {
        $homeRepo = new HomeRepo();
        $this->authors = $homeRepo->authors()->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.author.home')
            ->layout('livewire.digital-world.layouts.master')
            ->layoutData(['title' => 'نویسندگان']);
    }
}
