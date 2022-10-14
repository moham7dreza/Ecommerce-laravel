<?php

namespace App\Http\Controllers\ItCity\Store;

use App\Http\Controllers\Controller;
use App\Models\ItCity\Store\Hardware;
use App\Models\ItCity\Store\HardwareCategory;
use Illuminate\Http\Request;

class HardwareController extends Controller
{
    public function hardware(Hardware $hardware)
    {
        return view('it-city.store.product', compact('hardware'));
    }

    public function specialSale()
    {
        return view('it-city.store.product');
    }

    public function categoryComponents(HardwareCategory $hardwareCategory)
    {
        return view('it-city.store.product', compact('hardwareCategory'));
    }
}
