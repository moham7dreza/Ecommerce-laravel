<?php

namespace App\Http\Repositories\ItCity;

use App\Models\Content\Banner;
use App\Models\Content\Post;
use App\Models\ItCity\Store\Hardware;
use App\Models\Setting\Setting;
use App\Models\SmartAssemble\System;
use App\Models\SmartAssemble\SystemBrand;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\User;

class HomeRepo
{
    public function setting()
    {
        return Setting::query()->findOrFail(2);
    }

    public function brands()
    {
        return SystemBrand::query()->latest()->take(5)->get();
    }

    public function mostVisitedHardware()
    {
        return Hardware::query()->latest()->orderBy('sold_number', 'desc')->take(4)->get();
    }

    public function sampleOfAssembledSystems()
    {
        return System::query()->latest()->take(4)->get();
    }

    public function systemCategories()
    {
        return SystemCategory::query()->take(4)->get();
    }

    public function posts()
    {
        return Post::query()->where('status', 1)->take(3)->get();
    }

    public function personnel()
    {
        return User::query()->latest()->take(4)->get();
    }

    public function slideShowImages()
    {
        return Banner::query()->where('position', 0)->where('status', 1)->get();
    }
}
