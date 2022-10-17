<?php

namespace App\Http\Controllers\SinglePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ultraProfile()
    {
        return view('single-pages.ultra-profile');
    }

    public function letter()
    {
        return view('single-pages.letter');
    }

    public function app()
    {
        return view('single-pages.app');
    }

    public function astroMotion()
    {
        return view('single-pages.motion');
    }
}
