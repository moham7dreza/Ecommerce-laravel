<?php

namespace App\Http\Controllers\Assemble;

use App\Http\Controllers\Controller;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemConfig;
use App\Models\SmartAssemble\SystemConfigItems;
use App\Models\SmartAssemble\SystemGen;
use App\Models\SmartAssemble\SystemType;
use Illuminate\Http\Request;

class SmartAssembleController extends Controller
{
//    public function index(SystemCategory $systemCategory, SystemType $systemType, SystemGen $systemGen, SystemConfig $systemConfig)
//    {
//        return view('smart-assemble.index', compact('systemCategory', 'systemType', 'systemGen', 'systemConfig'));
//    }
    public function index()
    {
        $case_category = ProductCategory::where('name', 'like', '%case%')
            ->orWhere('name', 'like', '%کیس%')->orWhere('description', 'like', '%کیس%')->orWhere('description', 'like', '%case%')->first();
        $cpu_category = ProductCategory::where('name', 'like', '%cpu%')
            ->orWhere('name', 'like', '%پردازنده%')->orWhere('description', 'like', '%پردازنده%')->orWhere('description', 'like', '%cpu%')->first();
        $mb_category = ProductCategory::where('name', 'like', '%motherboard%')
            ->orWhere('name', 'like', '%مادربرد%')->orWhere('description', 'like', '%مادربرد%')->orWhere('description', 'like', '%motherboard%')->first();
        $gpu_category = ProductCategory::where('name', 'like', '%کارت گرافیک%')
            ->orWhere('name', 'like', '%کارت گرافیک%')->orWhere('description', 'like', '%کارت گرافیک%')->orWhere('description', 'like', '%gpu%')->first();
        $psu_category = ProductCategory::where('name', 'like', '%power supply unit%')
            ->orWhere('name', 'like', '%منبع تغذیه%')->orWhere('description', 'like', '%منبع تغذیه%')->orWhere('description', 'like', '%power supply unit%')->first();
        $hdd_category = ProductCategory::where('name', 'like', '%hard disk drive%')
            ->orWhere('name', 'like', '%هارد%')->orWhere('description', 'like', '%هارد%')->orWhere('description', 'like', '%hard disk drive%')->first();
        $ssd_category = ProductCategory::where('name', 'like', '%solid state drive%')
            ->orWhere('name', 'like', '%حافظه جامد%')->orWhere('description', 'like', '%حافظه جامد%')->orWhere('description', 'like', '%solid state drive%')->first();
        $ram_category = ProductCategory::where('name', 'like', '%ram%')
            ->orWhere('name', 'like', '%حافظه رم%')->orWhere('description', 'like', '%حافظه رم%')->orWhere('description', 'like', '%ram%')->first();
        $cooler_category = ProductCategory::where('name', 'like', '%cpu cooler%')
            ->orWhere('name', 'like', '%خنک کننده پردازنده%')->orWhere('description', 'like', '%خنک کننده پردازنده%')->orWhere('description', 'like', '%cpu cooler%')->first();
        $fan_category = ProductCategory::where('name', 'like', '%fan%')
            ->orWhere('name', 'like', '%فن های جانبی کیس%')->orWhere('description', 'like', '%فن های جانبی کیس%')->orWhere('description', 'like', '%fan%')->first();
        return view('smart-assemble.index', compact('case_category', 'mb_category', 'cpu_category', 'gpu_category',
            'psu_category', 'fan_category', 'cooler_category', 'ram_category', 'hdd_category', 'ssd_category'));
    }

    public function systemCategories()
    {
        $brands = Brand::all();
        $offeredSystems = Product::all();
        $systemCategories = SystemCategory::all();
        return view('smart-assemble.category', compact('systemCategories', 'offeredSystems', 'brands'));
    }

    public function systemTypes(SystemCategory $systemCategory)
    {
        $systemTypes = SystemType::where('system_category_id', $systemCategory->id)->get();
        return view('smart-assemble.type', compact('systemCategory', 'systemTypes'));
    }

    public function systemGens(SystemCategory $systemCategory, SystemType $systemType)
    {
        $systemGens = SystemGen::where('system_category_id', $systemCategory->id)->where('system_type_id', $systemType->id)->get();
        return view('smart-assemble.gen', compact('systemCategory', 'systemType', 'systemGens'));
    }

    public function systemConfigs(SystemCategory $systemCategory, SystemType $systemType, SystemGen $systemGen)
    {
        $systemConfigs = SystemConfig::where('system_category_id', $systemCategory->id)
            ->where('system_type_id', $systemType->id)->where('system_gen_id', $systemGen->id)->get();
        return view('smart-assemble.config', compact('systemCategory', 'systemType', 'systemGen', 'systemConfigs'));
    }

    public function offeredSystems(SystemCategory $systemCategory, SystemType $systemType, SystemGen $systemGen, SystemConfig $systemConfig)
    {
        return view('smart-assemble.build', compact('systemCategory', 'systemType', 'systemGen', 'systemConfig'));
    }
}
