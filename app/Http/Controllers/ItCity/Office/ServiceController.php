<?php

namespace App\Http\Controllers\ItCity\Office;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ItCity\Blog\PostRepo;
use App\Http\Repositories\ItCity\Office\ServiceRepo;
use App\Models\ItCity\Office\Service;


class ServiceController extends Controller
{

    private string $class = Service::class;

    public ServiceRepo $repo;

    public function __construct(ServiceRepo $serviceRepo)
    {
        $this->repo = $serviceRepo;
    }

    // main services = parent = without child or sub services
    public function index()
    {
        $services = $this->repo->parentServices()->get();
        return view('it-city.office.service.index', compact('services'));
    }

    // all sub services without parents
    public function allServices()
    {
        $services = $this->repo->services()->get();
        return view('it-city.office.service.all-services', compact('services'));
    }

    // sub services of special parent service
    public function service(Service $service, PostRepo $postRepo)
    {
        $posts = $postRepo->home()->take(3)->get();
        $services = $this->repo->parentServices()->get();
        $subServices = $service->children;
        return view('it-city.office.service.service', compact('service', 'subServices', 'services', 'posts'));
    }

    // details of one service
    public function serviceDetail(Service $service, PostRepo $postRepo)
    {
        $posts = $postRepo->home()->take(3)->get();
        $services = $this->repo->parentServices()->get();
        $relatedServices = $this->repo->relatedServices($service)->take(2)->get();
        views($service)->unique()->record();
        return view('it-city.office.service.detail', compact('service', 'relatedServices', 'posts', 'services'));
    }
}
