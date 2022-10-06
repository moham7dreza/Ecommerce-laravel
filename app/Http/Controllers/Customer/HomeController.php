<?php

namespace App\Http\Controllers\Customer;

use App\Models\Address;
use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Market\AmazingSale;
use App\Models\Market\Brand;
use App\Models\Setting\Setting;
use App\Models\SmartAssemble\System;
use App\Models\SmartAssemble\SystemBrand;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemMenu;
use App\Models\SmartAssemble\SystemType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home()
    {
        Auth::loginUsingId(1);
        // بنرها
        $slideShowImages = Banner::where('position', 0)->where('status', 1)->get();
        $topBanners = Banner::where('position', 1)->where('status', 1)->take(2)->get();
        $middleBanners = Banner::where('position', 2)->where('status', 1)->take(2)->get();
        $bottomMiddleBanners = Banner::where('position', 3)->where('status', 1)->take(2)->get();
        $bottomBanner = Banner::where('position', 4)->where('status', 1)->first();
        $brandsBanner = Banner::where('position', 5)->where('status', 1)->first();
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
            where('percentage', '>=', 10)->take(10)->get();
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
            'newestProducts', 'systemCategories', 'bottomMiddleBanners', 'brandsBanner', 'sampleOfGamingSystemImages'));

    }

    public function myProfile()
    {
        return view('customer.user.profile');
    }

    public function myOrders()
    {
        if (isset(request()->type)) {
            $orders = auth()->user()->orders()->where('order_status', request()->type)->orderBy('id', 'desc')->get();
        } else {
            $orders = auth()->user()->orders()->orderBy('id', 'desc')->get();
        }
        return view('customer.user.orders', compact('orders'));
    }

    public function myAddresses()
    {
        $addresses = auth()->user()->addresses()->orderBy('id', 'desc')->get();
        return view('customer.user.addresses', compact('addresses'));
    }

    public function myFavorites()
    {
        return view('customer.user.favorites');
    }

    public function posts()
    {

    }


}
