<?php

namespace App\Http\Controllers\SinglePage;

use App\Http\Controllers\Controller;

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

    public function hydrogen()
    {
        return view('single-pages.hydrogen');
    }
}
