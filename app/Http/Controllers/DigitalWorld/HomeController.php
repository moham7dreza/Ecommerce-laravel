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
use App\Models\Setting\Setting;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
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
        $setting = Setting::query()->findOrFail(3);
        SEOTools::setTitle($setting->title);
        SEOTools::setDescription(strip_tags($setting->description));
        SEOMeta::addKeyword($setting->keywords);
        SEOTools::opengraph()->setUrl('http://current.url.com');
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

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

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription(strip_tags($post->summary));
        SEOMeta::addMeta('article:published_time', $post->published_at, 'property');
        SEOMeta::addMeta('article:section', $post->category->name, 'property');
        SEOMeta::addKeyword($post->tags);

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
        SEOTools::setTitle('لیست پست ها');
        SEOTools::setDescription('لیست پست های اخیر سایت');
        SEOMeta::addKeyword('پست های اخیر', 'همه ی پست ها');

        $posts = $this->postRepo->home()->withCount('likers')->paginate(6);
        $viewsPosts = $this->postRepo->getPostsByViews()->latest()->limit(5)->get();
        $latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
        return view('digital-world.post.home', compact(['posts', 'latestComments', 'viewsPosts', 'homeRepo']));
    }

    public function category(PostCategory $postCategory, PostCategoryRepo $postCategoryRepo): Factory|View|Application
    {
        SEOTools::setTitle($postCategory->name);
        SEOTools::setDescription(strip_tags($postCategory->description));
        SEOMeta::addKeyword($postCategory->tags);

        $categories = $postCategoryRepo->getActiveCategories()->get();
        $posts = $this->postRepo->getPostsByCategoryId($postCategory->id)->paginate(10);
        return view('digital-world.category', compact(['postCategory', 'posts', 'categories']));
    }

    public function authors(HomeRepo $homeRepo): Factory|View|Application
    {
        SEOTools::setTitle('لیست نویسندگان');
        SEOTools::setDescription('لیست نویسندگان اخیر سایت');
        SEOMeta::addKeyword('نویسندگان اخیر', 'همه ی نویسندگان');

        $authors = $homeRepo->getAuthorUsers()->take(50);
        return view('digital-world.user.authors', compact(['authors']));
    }

    public function author(User $user): Factory|View|Application
    {
        SEOTools::setTitle($user->fullName);
        SEOTools::setDescription('بیوگرافی نویسنده');
        SEOMeta::addKeyword('نویسنده');

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
                $details = [
                    'message' => $user->fullName . ' پست شما با نام ' . $post->limitedTitle() . ' را لایک کرد.',
                    'created_at' => now()
                ];
                return response()->json(['status' => 1, 'likesCount' => $user->likesCount(), 'details' => $details]);
            } else {
                $details = [
                    'message' => $user->fullName . ' پست شما با نام ' . $post->limitedTitle() . ' را آن لایک کرد.',
                    'created_at' => now()
                ];
                return response()->json(['status' => 2, 'likesCount' => $user->likesCount(), 'details' => $details]);
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
                $details = [
                    'message' => $follower->fullName . ' شما را دنبال می کند ',
                    'created_at' => now()
                ];
                return response()->json(['status' => 1, 'followersCount' => $author->followersCount(), 'details' => $details]);
            } else {
                $details = [
                    'message' => $follower->fullName . ' شما را دنبال نمی کند ',
                    'created_at' => now()
                ];
                return response()->json(['status' => 2, 'followersCount' => $author->followersCount(), 'details' => $details]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }

    public function authorFollowers(User $author): Factory|View|Application
    {
        SEOTools::setTitle($author->fullName);
        SEOTools::setDescription('دنبال کننده های نویسنده');
        SEOMeta::addKeyword('نویسنده');

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
                $details = [
                    'message' => $user->fullName . ' پست شما با نام ' . $post->limitedTitle() . ' را به علاقه مندی های خود اضافه کرد.',
                    'created_at' => now()
                ];
                return response()->json(['status' => 1, 'details' => $details]);
            } else {
                $details = [
                    'message' => $user->fullName . ' پست شما با نام ' . $post->limitedTitle() . ' را از علاقه مندی های خود حذف کرد.',
                    'created_at' => now()
                ];
                return response()->json(['status' => 2, 'details' => $details]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }

    public function userFavorites(HomeRepo $homeRepo): Factory|View|Application
    {
        $user = auth()->user();

        SEOTools::setTitle($user->fullName);
        SEOTools::setDescription('علاقه مندی های کاربر');
        SEOMeta::addKeyword('کاربر');

        $posts = $user->getFavoriteItems(Post::class)->paginate(6);
        $viewsPosts = $this->postRepo->getPostsByViews()->latest()->limit(5)->get();
        $latestComments = Comment::query()->where('commentable_type', 'App\Models\Content\Post')->limit(3)->get();
        return view('digital-world.user.favorites', compact(['posts', 'latestComments', 'viewsPosts', 'homeRepo']));
    }
}
