<?php

namespace App\Http\Controllers\DigitalWorld;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('digital-world.home');
    }

    public function post(Post $post)
    {
        return view('digital-world.post', compact('post'));
    }

    public function category(PostCategory $postCategory)
    {
        return view('digital-world.category', compact('postCategory'));
    }

    public function addComment(Post $post, Request $request)
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

    public function addToFavorite(Post $post)
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
