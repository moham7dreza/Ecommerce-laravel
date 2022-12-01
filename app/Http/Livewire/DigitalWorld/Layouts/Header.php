<?php

namespace App\Http\Livewire\DigitalWorld\Layouts;

use App\Models\Content\PostCategory;
use App\Models\Setting\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Header extends Component
{
    public Collection $categories;
    public Model $setting;

    public function mount()
    {
        $this->setting = Setting::query()->find(3);
        $this->categories = PostCategory::query()->where([['status', 1], ['parent_id', NULL]])->orderBy('created_at')->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.layouts.header');
    }
}
