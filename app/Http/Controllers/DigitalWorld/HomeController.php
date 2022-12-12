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
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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

    public function home(HomeRepo $homeRepo): Factory|View|Application
    {
        $topBanner = Banner::query()->where([
            ['position', 7], ['status', 1]
        ])->first();
        $bottomBanner = Banner::query()->where([
            ['position', 8], ['status', 1]
        ])->first();
        $latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
        return view('digital-world.home', compact(['homeRepo', 'topBanner', 'bottomBanner', 'latestComments']));
    }

    public function post(Post $post, HomeRepo $homeRepo): Factory|View|Application
    {
        $banner = Banner::query()->where([
            ['position', 9], ['status', 1]
        ])->first();
        $latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
        $relatedPosts = $this->postRepo->relatedPosts($post->category->id, $post->id)->latest()->get();
        views($post)->unique()->record();
        return view('digital-world.post.details', compact(['post', 'relatedPosts', 'homeRepo', 'latestComments', 'banner']));
    }

    public function posts(HomeRepo $homeRepo): Factory|View|Application
    {
        $posts = $this->postRepo->home()->withCount('likers')->paginate(6);
        $viewsPosts = $this->postRepo->getPostsByViews()->latest()->limit(5)->get();
        $latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
        return view('digital-world.post.home', compact(['posts', 'latestComments', 'viewsPosts', 'homeRepo']));
    }

    public function category(PostCategory $postCategory, PostCategoryRepo $postCategoryRepo): Factory|View|Application
    {
        $categories = $postCategoryRepo->getActiveCategories()->get();
        $posts = $this->postRepo->getPostsByCategoryId($postCategory->id)->paginate(10);
        return view('digital-world.category', compact(['postCategory', 'posts', 'categories']));
    }

    public function authors(HomeRepo $homeRepo): Factory|View|Application
    {
        $authors = $homeRepo->getAuthorUsers()->take(50);
        return view('digital-world.user.authors', compact(['authors']));
    }

    public function author(User $user): Factory|View|Application
    {
        $posts = $this->postRepo->getPostsByUserID($user->id)->latest()->withCount('likers')->paginate(10);
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
        }
        return back();
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

    public function likePost(Post $post): JsonResponse
    {
        if (Auth::check()) {
            $user = auth()->user();
            $user->toggleLike($post);
            if ($user->hasLiked($post)) {
                return response()->json(['status' => 1, 'likesCount' => $user->likesCount()]);
            } else {
                return response()->json(['status' => 2, 'likesCount' => $user->likesCount()]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }

    public function follow(User $user): JsonResponse
    {
        if (Auth::check()) {
            $author = $user;
            $follower = auth()->user();
            $follower->toggleFollow($author);
            if ($follower->isFollowing($author)) {
                return response()->json(['status' => 1, 'followersCount' => $author->followersCount()]);
            } else {
                return response()->json(['status' => 2, 'followersCount' => $author->followersCount()]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }

    public function authorFollowers(User $author): Factory|View|Application
    {
        $followers = $author->followers;
        $followings = $author->followings;
        return view('digital-world.user.followers', compact(['followings', 'followers']));
    }

    public function favoritePost(Post $post): JsonResponse
    {
        if (Auth::check()) {
            $user = auth()->user();
            $user->toggleFavorite($post);
            if ($user->hasFavorited($post)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }

    public function userFavorites(HomeRepo $homeRepo): Factory|View|Application
    {
        $user = auth()->user();
        $posts = $user->getFavoriteItems(Post::class)->paginate(6);
        $viewsPosts = $this->postRepo->getPostsByViews()->latest()->limit(5)->get();
        $latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
        return view('digital-world.user.favorites', compact(['posts', 'latestComments', 'viewsPosts', 'homeRepo']));
    }
}
