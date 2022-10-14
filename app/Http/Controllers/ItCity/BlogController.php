<?php

namespace App\Http\Controllers\ItCity;

use App\Http\Controllers\Controller;
use App\Models\Content\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('it-city.blog.index');
    }

    public function news()
    {
        return view('it-city.blog.news');
    }

    public function postDetail(Post $post)
    {
        return view('it-city.blog.detail', compact('post'));
    }
}
