<?php

namespace App\Http\Livewire\DigitalWorld\Post;

use App\Http\Repositories\Admin\Content\PostCategoryRepo;
use App\Http\Repositories\Admin\Content\PostRepo;
use App\Models\Content\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public Collection $viewsPosts;
    public Collection $categories;
    public int $categoryId;
    public $char = "";

    public function paginationView(): string
    {
        return 'livewire.digital-world.utils.pagination-links';
    }

    public function mount($catId, $char = "")
    {
        $categoryRepo = new PostCategoryRepo();
        $this->categories = $categoryRepo->getActiveCategories()->get();
        $this->categoryId = $catId;
        $this->char = $char;
        $postRepo = new PostRepo();
        $this->viewsPosts = $postRepo->getPostsByViews()->latest()->limit(5)->get();
    }

    public function render()
    {
        if ($this->categoryId == 0) {
            $result = Post::query()->where('title', 'like', '%' . $this->char . '%')
                ->orWhere('summary', 'like', '%' . $this->char . '%')
                ->orWhere('body', 'like', '%' . $this->char . '%')
                ->paginate(4);
        } else {
            $result = Post::query()->where([
                ['category_id', $this->categoryId],
                ['title', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['category_id', $this->categoryId],
                ['body', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['category_id', $this->categoryId],
                ['summary', 'like', '%' . $this->char . '%'],
            ])->paginate(4);
        }

        return view('livewire.digital-world.post.search', ['posts' => $result])
            ->layout('livewire.digital-world.layouts.master')
            ->layoutData(['title' => 'جست و جو ' . $this->char]);
    }
}
