<?php

namespace App\Http\Controllers\ItCity\ServiceAndRepair;

use App\Http\Controllers\Controller;
use App\Models\ItCity\Store\Service;


class ServiceController extends Controller
{
    public function index()
    {
        return view('it-city.service-and-repair.index');
    }

    public function allServices()
    {
        return view('it-city.service-and-repair.all-services');
    }

    public function service(Service $service)
    {
        return view('it-city.service-and-repair.service', compact('service'));
    }

    public function serviceDetail(Service $service)
    {
        return view('it-city.service-and-repair.detail', compact('service'));
    }
}
