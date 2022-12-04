<?php

namespace App\Http\Livewire\DigitalWorld\Partials;

use App\Models\Content\Banner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class TopBanner extends Component
{
    public Model $topBanner;

    public function mount()
    {
        $this->topBanner = Banner::query()->where([
            ['position', 7], ['status', 1]
        ])->first();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.partials.top-banner')->layout('livewire.digital-world.layouts.master');
    }
}
