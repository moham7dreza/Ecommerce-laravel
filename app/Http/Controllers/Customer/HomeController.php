<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Content\Banner;
use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Market\AmazingSale;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\Setting\Setting;
use App\Models\SmartAssemble\System;
use App\Models\SmartAssemble\SystemBrand;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // بنرها
        $slideShowImages = Banner::where('position', 0)->where('status', 1)->get();
        $topBanners = Banner::where('position', 1)->where('status', 1)->take(2)->get();
        $middleBanners = Banner::where('position', 2)->where('status', 1)->take(2)->get();
        $bottomMiddleBanners = Banner::where('position', 3)->where('status', 1)->take(2)->get();
        $bottomBanner = Banner::where('position', 4)->where('status', 1)->first();
        $brandsBanner = Banner::where('position', 5)->where('status', 1)->first();
        $fourColumnBanners = Banner::where('position', 6)->where('status', 1)->take(4)->get();
        // برندها
        $brands = Brand::all();
        $systemBrands = SystemBrand::all();

        // پربازدید ترین کالاها
        $mostVisitedProducts = Product::latest()->take(10)->get();
        // کالاهای پیشنهادی
        $offerProducts = Product::latest()->take(10)->get();
        // فروش ویژه هفته
        $weeklyAmazingSales = AmazingSale::where('start_date', '<', Carbon::now())
            ->where('end_date', '>', Carbon::now())->where('status', 1)->
            where('percentage', '>=', 10)->take(10)->get();
        // جدید ترین کالاها
        $newestProducts = Product::latest()->take(10)->get();
        // جدیدترین قطعات جانبی

        // سیستم های اسمبل شده
        $systemCategories = SystemCategory::all();
        // نظرات کاربران
        $comments = Comment::where('parent_id', null)->where('status', 1)->take(10)->get();
        // جدید ترین ویديوها

        // جدید ترین مقالات
        $posts = Post::where('status', 1)->take(5)->get();
        // جدید ترین ارسال های انجمن

        // محصولات فروش ویژه
        $productsWithActiveAmazingSales = AmazingSale::where('start_date', '<', Carbon::now())
            ->where('end_date', '>', Carbon::now())->where('status', 1)->
            where('percentage', '>=', 1)->take(10)->get();
        // جدید ترین مادربرد پردازنده کارت گرافیک

        // پرفروش ترین محصولات
        $bestSellerProducts = Product::where('sold_number', '>=', 100)->take(10)->get();
        // محبوب ترین سیستم ها
        $popularSystems = System::where('system_rating', '>=', 4)->where('status', 1)->where('system_view_number', '>=', 99)->take(10)->get();
        // نمونه سیستم های اسمبل شده
        $sampleOfGamingSystemImages = SystemType::where('name', 'like', '%کولاک مینی%')->first()->images;
        $sampleOfAssembledSystems = System::latest()->take(10)->get();
        // تنطیمات سایت
        $siteSetting = Setting::find(1);

        return view('customer.home', compact('slideShowImages', 'topBanners', 'middleBanners', 'bottomBanner',
            'brands', 'mostVisitedProducts', 'offerProducts', 'systemBrands', 'siteSetting', 'productsWithActiveAmazingSales',
            'newestProducts', 'systemCategories', 'bottomMiddleBanners', 'brandsBanner', 'sampleOfGamingSystemImages',
            'fourColumnBanners'));

    }

    public function posts()
    {

    }

    public function liveSearch(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->search;
            if (isset($name) && strlen($name) > 0) {
                $results = collect();
                $productResults = Product::query()->where('name', 'like', '%' . $name . '%')->get();
                if (count($productResults) > 0) {
                    $results->put('products', $productResults);
                }
                $productCategoryResults = ProductCategory::query()->where('name', 'like', '%' . $name . '%')->get();
                if (count($productCategoryResults) > 0) {
                    $results->put('categories', $productCategoryResults);
                }
                $brandResults = Brand::query()->where('persian_name', 'like', '%' . $name . '%')->get();
                if (count($brandResults) > 0) {
                    $results->put('brands', $brandResults);
                }
                $results = $results->unique();
                if (count($results) > 0) {
                    return response()->json(['status' => true, 'results' => $results, 'key' => $name]);
                } else {
                    return response()->json(['status' => false, 'results' => null, 'key' => $name]);
                }
            }
        }
    }
}
