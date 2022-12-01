<?php

namespace App\Http\Livewire\DigitalWorld;

use App\Http\Repositories\DigitalWorld\HomeRepo;
use App\Models\Content\Banner;
use App\Models\Content\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Share\Repositories\ShareRepo;

class Home extends Component
{
    protected $listeners = ['sweetAlert'];

    public function mount()
    {

    }

    public function sweetAlert($title)
    {
        ShareRepo::successMessage($title);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.home');
    }
}
