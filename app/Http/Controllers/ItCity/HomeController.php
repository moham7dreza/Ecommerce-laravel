<?php

namespace App\Http\Controllers\ItCity;

use App\Http\Controllers\Controller;
use App\Models\Content\Post;
use App\Models\ItCity\Store\Hardware;
use App\Models\Market\Brand;
use App\Models\Setting\Setting;
use App\Models\SmartAssemble\System;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // تنطیمات سایت
        $siteSetting = Setting::find(2);

        // برندها
        $brands = Brand::all();

        // پربازدید ترین کالاها
        $mostVisitedHardwares = Hardware::query()->latest()->take(4)->get();

        $sampleOfAssembledSystems = System::query()->latest()->take(4)->get();

        // جدید ترین مقالات
        $posts = Post::query()->where('status', 1)->take(3)->get();

        return view('it-city.home', compact('siteSetting', 'brands', 'mostVisitedHardwares',
        'sampleOfAssembledSystems', 'posts'));
    }
}
