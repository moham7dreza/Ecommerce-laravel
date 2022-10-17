<?php

namespace App\Http\Controllers\ItCity\ServiceAndRepair;

use App\Http\Controllers\Controller;
use App\Models\Content\Post;
use App\Models\ItCity\Store\Service;


class ServiceController extends Controller
{
    // main services = parent = without child or sub services
    public function index()
    {
        $services = Service::query()->where([['status', 1], ['service_availability', 1], ['parent_id', null]])->get();
        return view('it-city.service-and-repair.index', compact('services'));
    }
    // all sub services without parents
    public function allServices()
    {
        $services = Service::query()->where([['status', 1], ['parent_id', '!=', null], ['service_availability', 1]])->get();
        return view('it-city.service-and-repair.all-services', compact('services'));
    }
    // sub services of special parent service
    public function service(Service $service)
    {
        $posts = Post::query()->where('status', 1)->take(3)->get();
        $services = Service::query()->where([['status', 1], ['parent_id', null], ['service_availability', 1]])->get();
        $subServices = $service->children;
        return view('it-city.service-and-repair.service', compact('service', 'subServices', 'services', 'posts'));
    }
    // details of one service
    public function serviceDetail(Service $service)
    {
        $posts = Post::query()->where('status', 1)->take(3)->get();
        $services = Service::query()->where([['status', 1], ['parent_id', null], ['service_availability', 1]])->get();
        $relatedServices = Service::query()->where([['status', 1], ['service_availability', 1], ['parent_id', null]])->take(2)->get();
        return view('it-city.service-and-repair.detail', compact('service', 'relatedServices', 'posts', 'services'));
    }
}
