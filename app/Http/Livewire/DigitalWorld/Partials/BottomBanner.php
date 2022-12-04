<?php

namespace App\Http\Livewire\DigitalWorld\Partials;

use App\Models\Content\Banner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class BottomBanner extends Component
{
    public Model $bottomBanner;

    public function mount()
    {
        $this->bottomBanner = Banner::query()->where([
            ['position', 8], ['status', 1]
        ])->first();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.partials.bottom-banner')
            ->layout('livewire.digital-world.layouts.master');
    }
}
