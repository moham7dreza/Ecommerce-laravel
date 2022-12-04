<?php

namespace App\Http\Livewire\DigitalWorld\Partials;

use App\Models\Content\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Comments extends Component
{
    public Collection $latestComments;

    public function mount()
    {
        $this->latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.partials.comments')->layout('livewire.digital-world.layouts.master');
    }
}
