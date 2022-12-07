<?php

namespace App\Http\Controllers\ItCity;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ItCity\HomeRepo;

class HomeController extends Controller
{
    public function home(HomeRepo $homeRepo)
    {
        return view('it-city.home', compact(['homeRepo']));
    }

    public function error404()
    {
        return view('it-city.error.404-error');
    }
}
