<?php

namespace App\Http\Controllers\ItCity\PC;

use App\Http\Controllers\Controller;
use App\Models\Content\Post;
use App\Models\ItCity\Office\Service;
use App\Models\SmartAssemble\System;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemType;

class PcSmartAssembleController extends Controller
{
    public function systemTypes(SystemCategory $systemCategory)
    {
        $posts = Post::query()->where('status', 1)->latest()->take(4)->get();
        $services = Service::query()->where([['status', 1], ['service_availability', 1], ['parent_id', null]])->get();
        $offeredSystems = System::query()->where([['system_rating', '>=', 4], ['status', 1], ['system_marketable', 1], ['system_view_number', '>=', 10]])->take(5)->get();
        $systemTypes = SystemType::query()->where('system_category_id', $systemCategory->id)->get();
        return view('it-city.pc.smart-assemble.system-types', compact('systemCategory', 'systemTypes', 'offeredSystems', 'posts', 'services'));
    }
}
