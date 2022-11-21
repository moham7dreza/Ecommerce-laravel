<?php

namespace App\Http\Controllers\ItCity\Store;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ItCity\Blog\PostRepo;
use App\Http\Repositories\ItCity\Office\ServiceRepo;
use App\Http\Repositories\ItCity\Store\HardwareRepo;
use App\Models\Content\Post;
use App\Models\ItCity\Office\Service;
use App\Models\ItCity\Store\Hardware;
use App\Models\Market\AmazingSale;
use App\Models\Market\ProductCategory;
use Carbon\Carbon;

class HardwareController extends Controller
{
    private string $class = Hardware::class;

    public HardwareRepo $repo;

    public function __construct(HardwareRepo $hardwareRepo)
    {
        $this->repo = $hardwareRepo;
    }

    public function hardware(Hardware $hardware, PostRepo $postRepo, ServiceRepo $serviceRepo)
    {
        $posts = $posts = $postRepo->home()->take(4)->get();
        $services = $services = $serviceRepo->parentServices()->get();
        $relatedProducts = $this->repo->relatedHardware($hardware->category->id)->take(3)->get()->except($hardware->id);
        return view('it-city.store.hardware.product', compact('hardware', 'relatedProducts', 'posts', 'services'));
    }

    public function specialSale(PostRepo $postRepo, ServiceRepo $serviceRepo)
    {
        $posts = $posts = $postRepo->home()->take(4)->get();
        $services = $services = $serviceRepo->parentServices()->get();
        $productsWithActiveAmazingSales = $this->repo->amazingSales()->paginate(9);

        return view('it-city.store.hardware.special-sale', compact('productsWithActiveAmazingSales',
            'services', 'posts'));
    }

    public function categoryComponents(ProductCategory $productCategory, PostRepo $postRepo, ServiceRepo $serviceRepo)
    {
        $posts = $posts = $postRepo->home()->take(4)->get();
        $services = $services = $serviceRepo->parentServices()->get();
        $products = $this->repo->relatedHardware($productCategory->id)->paginate(9);
        return view('it-city.store.hardware.category-components', compact('products', 'productCategory', 'posts', 'services'));
    }
}
