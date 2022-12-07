<?php

namespace App\Http\Livewire\DigitalWorld;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Home extends Component
{
    public function mount()
    {

    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.home')
            ->layout('livewire.digital-world.layouts.master')
            ->layoutData(['title' => 'دنیای دیجیتالی']);
    }
}
