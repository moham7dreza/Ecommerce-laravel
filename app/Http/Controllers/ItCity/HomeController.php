<?php

namespace App\Http\Controllers\ItCity;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ItCity\HomeRepo;
use App\Models\Content\Post;
use App\Models\ItCity\Store\Hardware;
use App\Models\Market\Brand;
use App\Models\Setting\Setting;
use App\Models\SmartAssemble\System;
use App\Models\SmartAssemble\SystemBrand;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\User;
use Illuminate\Http\Request;

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
