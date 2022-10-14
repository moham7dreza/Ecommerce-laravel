<?php

namespace App\Http\Controllers\ItCity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('it-city.home');
    }
}
