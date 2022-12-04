<?php

namespace App\Http\Livewire\DigitalWorld\Category;

use App\Http\Repositories\Admin\Content\PostCategoryRepo;
use App\Http\Repositories\Admin\Content\PostRepo;
use App\Models\Content\PostCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Home extends Component
{
    public Collection $posts;
    public Collection $categories;
    public Model $postCategory;

    public function mount(PostCategory $postCategory)
    {
        $postRepo = new PostRepo();
        $postCategoryRepo = new PostCategoryRepo();
        $this->postCategory = $postCategory;
        $this->posts = $postRepo->getPostsByCategoryId($postCategory->id)->get();
        $this->categories = $postCategoryRepo->getActiveCategories()->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.digital-world.category.home')
            ->layout('livewire.digital-world.layouts.master')
            ->layoutData(['title' => $this->postCategory->name]);
    }
}
