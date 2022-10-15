<?php

namespace App\Http\Controllers\ItCity;

use App\Http\Controllers\Controller;
use App\Models\Market\Brand;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // تنطیمات سایت
        $siteSetting = Setting::find(2);

        // برندها
        $brands = Brand::all();


        return view('it-city.home');
    }
}
