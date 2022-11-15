<?php

namespace App\Http\Controllers\DigitalWorld;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\Content\PostCategoryRepo;
use App\Http\Repositories\Admin\Content\PostRepo;
use App\Http\Repositories\DigitalWorld\HomeRepo;
use App\Models\Content\Banner;
use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public PostRepo $postRepo;

    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function home(HomeRepo $homeRepo)
    {
        $topBanner = Banner::query()->where([
            ['position', 7], ['status', 1]
        ])->first();
        $bottomBanner = Banner::query()->where([
            ['position', 8], ['status', 1]
        ])->first();;
        $latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
        return view('digital-world.home', compact(['homeRepo', 'topBanner', 'bottomBanner', 'latestComments']));
    }

    public function post(Post $post, HomeRepo $homeRepo)
    {
        $banner = Banner::query()->where([
            ['position', 9], ['status', 1]
        ])->first();
        $latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
        $relatedPosts = $this->postRepo->relatedPosts($post->category->id, $post->id)->latest()->get();
        return view('digital-world.post.details', compact(['post', 'relatedPosts', 'homeRepo', 'latestComments', 'banner']));
    }

    public function posts(HomeRepo $homeRepo)
    {
        $posts = $this->postRepo->home()->paginate(6);
        $viewsPosts = $this->postRepo->getPostsByViews()->latest()->limit(5)->get();
        $latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
        return view('digital-world.post.home', compact(['posts', 'latestComments', 'viewsPosts', 'homeRepo']));
    }

    public function category(PostCategory $postCategory, PostCategoryRepo $postCategoryRepo)
    {
        $categories = $postCategoryRepo->getActiveCategories()->get();
        $posts = $this->postRepo->getPostsByCategoryId($postCategory->id)->paginate(10);
        return view('digital-world.category', compact(['postCategory', 'posts', 'categories']));
    }

    public function authors(HomeRepo $homeRepo)
    {
        $authors = $homeRepo->authors()->paginate(50);
        return view('digital-world.user.authors', compact(['authors']));
    }

    public function author(User $user)
    {
        $posts = $this->postRepo->getPostsByUserID($user->id)->latest()->paginate(10);
        return view('digital-world.user.author', compact(['user', 'posts']));
    }

    public function addComment(Post $post, Request $request): RedirectResponse
    {
        if (Auth::check()) {
            $request->validate([
                'body' => 'required|max:2000'
            ]);

            $inputs['body'] = str_replace(PHP_EOL, '<br/>', $request->body);
            $inputs['author_id'] = Auth::user()->id;
            $inputs['commentable_id'] = $post->id;
            $inputs['commentable_type'] = Post::class;
            Comment::create($inputs);
            return back();
        } else {
            return back();
        }
    }

    public function addToFavorite(Post $post): JsonResponse
    {
        if (Auth::check()) {
            $post->user()->toggle([Auth::user()->id]);
            if ($post->user->contains(Auth::user()->id)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }
}
