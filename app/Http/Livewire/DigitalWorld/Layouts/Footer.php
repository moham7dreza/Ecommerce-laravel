<?php

namespace App\Http\Livewire\DigitalWorld\Layouts;

use App\Models\Content\PostCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

;

class Footer extends Component
{
    public Collection $categories;

    public function mount()
    {
        $this->categories = PostCategory::query()->where([['status', 1], ['parent_id', NULL]])->orderBy('created_at')->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.layouts.footer')->layout('livewire.digital-world.layouts.master');
    }
}
