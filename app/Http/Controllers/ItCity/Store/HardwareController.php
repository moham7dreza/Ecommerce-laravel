<?php

namespace App\Http\Controllers\ItCity\Store;

use App\Http\Controllers\Controller;
use App\Models\ItCity\Store\Hardware;
use App\Models\ItCity\Store\HardwareCategory;
use App\Models\Market\AmazingSale;
use App\Models\Market\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HardwareController extends Controller
{
    public function hardware(Hardware $hardware)
    {
        $relatedProducts = ProductCategory::query()->where('name', $hardware->category->name)->first()->products->take(3);
        return view('it-city.store.hardware.product', compact('hardware', 'relatedProducts'));
    }

    public function specialSale()
    {
        $productsWithActiveAmazingSales = AmazingSale::query()->where('start_date', '<', Carbon::now())
            ->where('end_date', '>', Carbon::now())->where('status', 1)->
            where('percentage', '>=', 1)->get();

        return view('it-city.store.hardware.special-sale', compact('productsWithActiveAmazingSales'));
    }

    public function categoryComponents(ProductCategory $productCategory)
    {
        $products = $productCategory->products()->orderBy('id', 'desc')->get();
        return view('it-city.store.hardware.category-components', compact('products', 'productCategory'));
    }
}
