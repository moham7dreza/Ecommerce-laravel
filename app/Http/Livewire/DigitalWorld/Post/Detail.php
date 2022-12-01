<?php

namespace App\Http\Livewire\DigitalWorld\Post;

use App\Models\Content\Banner;
use App\Models\Content\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Share\Repositories\ShareRepo;

class Detail extends Component
{
    public Post $post;
    public Model $banner;

    protected $listeners = ['sweetAlert'];

    public function mount(Post $post)
    {
        $this->banner = Banner::query()->where([
            ['position', 9], ['status', 1]
        ])->first();
        $this->post = $post;
    }

    public function sweetAlert($title)
    {
        ShareRepo::successMessage($title);
    }

    public function render(): Factory|View|Application
    {
        $comments = $this->post->activeComments()->latest()->get();
        return view('livewire.digital-world.post.detail', ['comments' => $comments]);
    }
}
