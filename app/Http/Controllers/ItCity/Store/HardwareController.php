<?php

namespace App\Http\Controllers\ItCity\Store;

use App\Http\Controllers\Controller;
use App\Models\Content\Post;
use App\Models\ItCity\Store\Hardware;
use App\Models\ItCity\Store\HardwareCategory;
use App\Models\ItCity\Store\Service;
use App\Models\Market\AmazingSale;
use App\Models\Market\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HardwareController extends Controller
{
    public function hardware(Hardware $hardware)
    {
        $posts = Post::query()->where('status', 1)->latest()->take(4)->get();
        $services = Service::query()->where([['status', 1], ['service_availability', 1], ['parent_id', null]])->get();
        $relatedProducts = ProductCategory::query()->where('name', $hardware->category->name)->first()->products->take(3);
        return view('it-city.store.hardware.product', compact('hardware', 'relatedProducts', 'posts', 'services'));
    }

    public function specialSale()
    {
        $posts = Post::query()->where('status', 1)->latest()->take(4)->get();
        $services = Service::query()->where([['status', 1], ['service_availability', 1], ['parent_id', null]])->get();
        $productsWithActiveAmazingSales = AmazingSale::query()->where('start_date', '<', Carbon::now())
            ->where('end_date', '>', Carbon::now())->where('status', 1)->
            where('percentage', '>=', 1)->get();

        return view('it-city.store.hardware.special-sale', compact('productsWithActiveAmazingSales',
            'services', 'posts'));
    }

    public function categoryComponents(ProductCategory $productCategory)
    {
        $posts = Post::query()->where('status', 1)->latest()->take(4)->get();
        $services = Service::query()->where([['status', 1], ['service_availability', 1], ['parent_id', null]])->get();
        $products = $productCategory->products()->orderBy('id', 'desc')->get();
        return view('it-city.store.hardware.category-components', compact('products', 'productCategory', 'posts', 'services'));
    }
}
