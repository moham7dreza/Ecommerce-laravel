<?php

namespace App\Http\Controllers\ItCity;

use App\Http\Controllers\Controller;
use App\Models\Content\Post;

class BlogController extends Controller
{
    public function index()
    {
        // جدید ترین مقالات
        $posts = Post::query()->where('status', 1)->latest()->take(5)->get();
        return view('it-city.blog.index', compact('posts'));
    }

    public function news()
    {
        $posts = Post::query()->where('status', 1)->get();
        return view('it-city.blog.news', compact('posts'));
    }

    public function postDetail(Post $post)
    {
        $relatedPosts = Post::query()->where('status', 1)->latest()->take(5)->get();
        return view('it-city.blog.detail', compact('post', 'relatedPosts'));
    }
}
