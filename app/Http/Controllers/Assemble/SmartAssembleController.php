<?php

namespace App\Http\Controllers\Assemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assemble\SystemItemsRequest;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use App\Models\SmartAssemble\System;
use App\Models\SmartAssemble\SystemBrand;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemConfig;
use App\Models\SmartAssemble\SystemCpu;
use App\Models\SmartAssemble\SystemItem;
use App\Models\SmartAssemble\SystemMenu;
use App\Models\SmartAssemble\SystemType;
use Illuminate\Support\Facades\Auth;

class SmartAssembleController extends Controller
{
//    public function index(SystemCategory $systemCategory, SystemType $systemType, systemCpu $systemCpu, SystemConfig $systemConfig)
//    {
//        return view('smart-assemble.index', compact('systemCategory', 'systemType', 'systemCpu', 'systemConfig'));
//    }
    public function index()
    {
//        $case_category = ProductCategory::where('name', 'like', '%case%')
//            ->orWhere('name', 'like', '%کیس%')->orWhere('description', 'like', '%کیس%')->orWhere('description', 'like', '%case%')->first();
//        $cpu_category = ProductCategory::where('name', 'like', '%cpu%')
//            ->orWhere('name', 'like', '%پردازنده%')->orWhere('description', 'like', '%پردازنده%')->orWhere('description', 'like', '%cpu%')->first();
//        $mb_category = ProductCategory::where('name', 'like', '%motherboard%')
//            ->orWhere('name', 'like', '%مادربرد%')->orWhere('description', 'like', '%مادربرد%')->orWhere('description', 'like', '%motherboard%')->first();
//        $gpu_category = ProductCategory::where('name', 'like', '%کارت گرافیک%')
//            ->orWhere('name', 'like', '%کارت گرافیک%')->orWhere('description', 'like', '%کارت گرافیک%')->orWhere('description', 'like', '%gpu%')->first();
//        $psu_category = ProductCategory::where('name', 'like', '%power supply unit%')
//            ->orWhere('name', 'like', '%منبع تغذیه%')->orWhere('description', 'like', '%منبع تغذیه%')->orWhere('description', 'like', '%power supply unit%')->first();
//        $hdd_category = ProductCategory::where('name', 'like', '%hard disk drive%')
//            ->orWhere('name', 'like', '%هارد%')->orWhere('description', 'like', '%هارد%')->orWhere('description', 'like', '%hard disk drive%')->first();
//        $ssd_category = ProductCategory::where('name', 'like', '%solid state drive%')
//            ->orWhere('name', 'like', '%حافظه جامد%')->orWhere('description', 'like', '%حافظه جامد%')->orWhere('description', 'like', '%solid state drive%')->first();
//        $ram_category = ProductCategory::where('name', 'like', '%ram%')
//            ->orWhere('name', 'like', '%حافظه رم%')->orWhere('description', 'like', '%حافظه رم%')->orWhere('description', 'like', '%ram%')->first();
//        $cooler_category = ProductCategory::where('name', 'like', '%cpu cooler%')
//            ->orWhere('name', 'like', '%خنک کننده پردازنده%')->orWhere('description', 'like', '%خنک کننده پردازنده%')->orWhere('description', 'like', '%cpu cooler%')->first();
//        $fan_category = ProductCategory::where('name', 'like', '%fan%')
//            ->orWhere('name', 'like', '%فن های جانبی کیس%')->orWhere('description', 'like', '%فن های جانبی کیس%')->orWhere('description', 'like', '%fan%')->first();
//        return view('smart-assemble.index', compact('case_category', 'mb_category', 'cpu_category', 'gpu_category',
//            'psu_category', 'fan_category', 'cooler_category', 'ram_category', 'hdd_category', 'ssd_category'));
    }

    public function systemCategories()
    {
        $brands = SystemBrand::all();
        $offeredSystems = System::where('system_rating', 5)->where('status', 1)->take(5)->get();
        $sampleOfGamingSystemImages = SystemType::where('name', 'like', '%کولاک مینی%')->first()->images;
        $systemCategories = SystemCategory::all();
        return view('smart-assemble.category', compact('systemCategories', 'offeredSystems', 'brands', 'sampleOfGamingSystemImages'));
    }

    public function systemTypes(SystemCategory $systemCategory)
    {
        $offeredSystems = System::where('system_rating', 5)->where('status', 1)->take(5)->get();
        $systemTypes = SystemType::where('system_category_id', $systemCategory->id)->get();
        return view('smart-assemble.type', compact('systemCategory', 'systemTypes', 'offeredSystems'));
    }

    public function systemCpus(SystemCategory $systemCategory, SystemType $systemType)
    {
        $offeredSystems = System::where('system_rating', 5)->where('status', 1)->take(5)->get();
        $systemCpus = SystemCpu::where('system_category_id', $systemCategory->id)->where('system_type_id', $systemType->id)->get();
        return view('smart-assemble.cpu', compact('systemCategory', 'systemType', 'systemCpus', 'offeredSystems'));
    }

    public function systemConfigs(SystemCategory $systemCategory, SystemType $systemType, SystemCpu $systemCpu)
    {
        $offeredSystems = System::where('system_rating', 5)->where('status', 1)->take(5)->get();
        $systemConfigs = SystemConfig::where(
            ['system_category_id' => $systemCategory->id],
            ['system_type_id' => $systemType->id],
            ['system_gen_id' => $systemCpu->id]
        )->get();
        return view('smart-assemble.config', compact('systemCategory', 'systemType', 'systemCpu', 'systemConfigs', 'offeredSystems'));
    }

    public function build(SystemCategory $systemCategory, SystemType $systemType, SystemCpu $systemCpu, SystemConfig $systemConfig)
    {
        $system = System::where('system_category_id', $systemCategory->id)->where('system_type_id', $systemType->id)->where('system_gen_id', $systemCpu->id)->where('system_config_id', $systemConfig->id)->first();
//        $system_items = SystemItem::where(['system_id' => $system->id])->get();
        $menus = SystemMenu::where('status', 1)->get();
        $relatedProducts = Product::all();
        return view('smart-assemble.build', compact('menus', 'system', 'relatedProducts'));
    }

    public function builder(SystemItemsRequest $request)
    {
        ///
    }

    public function addSystemToCart(System $system, SystemItemsRequest $request)
    {
        if (Auth::check()) {
            $system_items = SystemItem::where('system_id', $system->id)->get();
            foreach ($system_items as $system_item) {
                $inputs = [];
//                $inputs['color_id'] = $request->color;
                if (!empty($system_item->product->guarantees[0])) {
                    $inputs['guarantee_id'] = $system_item->product->guarantees[0]->id;
                }
                $inputs['user_id'] = auth()->user()->id;
                $inputs['product_id'] = $system_item->product->id;
                CartItem::create($inputs);
            }
            return redirect()->route('customer.home')->with('alert-section-success', 'سیستم مورد نظر با موفقیت به سبد خرید اضافه شد');

        } else {
            return redirect()->route('auth.customer.login-register-form');
        }
    }
}
