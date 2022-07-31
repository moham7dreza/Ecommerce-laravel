<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SmartAssemble\SystemComponentsRequest;
use App\Http\Requests\Admin\SmartAssemble\SystemRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\SmartAssemble\System;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemConfig;
use App\Models\SmartAssemble\SystemGen;
use App\Models\SmartAssemble\SystemItem;
use App\Models\SmartAssemble\SystemMenu;
use App\Models\SmartAssemble\SystemType;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = System::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.smart-assemble.system.index', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SystemCategory::all();
        $types = SystemType::all();
        $gens = SystemGen::all();
        $configs = SystemConfig::all();
        return view('admin.smart-assemble.system.create', compact('categories', 'types', 'gens', 'configs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'offered-systems');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if ($result === false) {
            return redirect()->route('admin.smart-assemble.system.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        $inputs['name'] = SystemCategory::where('id', $request->system_category_id)->pluck('name')->first() . '-' .
            SystemType::where('id', $request->system_type_id)->pluck('name')->first() . '-' .
            SystemGen::where('id', $request->system_gen_id)->pluck('name')->first() . '-' .
            SystemConfig::where('id', $request->system_config_id)->pluck('name')->first();
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $system = System::create($inputs);
        return redirect()->route('admin.smart-assemble.system.index')->with('swal-success', 'سیستم پیشنهادی شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        $categories = SystemCategory::all();
        $types = SystemType::all();
        $gens = SystemGen::all();
        $configs = SystemConfig::all();
        return view('admin.smart-assemble.system.edit', compact('system', 'categories', 'types', 'gens', 'configs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemRequest $request, System $system, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($system->image)) {
                $imageService->deleteDirectoryAndFiles($system->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'offered-systems');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.system.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($system->image)) {
                $image = $system->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $inputs['name'] = SystemCategory::where('id', $request->system_category_id)->pluck('name')->first() . '-' .
            SystemType::where('id', $request->system_type_id)->pluck('name')->first() . '-' .
            SystemGen::where('id', $request->system_gen_id)->pluck('name')->first() . '-' .
            SystemConfig::where('id', $request->system_config_id)->pluck('name')->first();
        $system->update($inputs);
        return redirect()->route('admin.smart-assemble.system.index')->with('swal-success', 'سیستم پیشنهادی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        $result = $system->delete();
        return redirect()->route('admin.smart-assemble.system.index')->with('swal-success', 'سیستم پیشنهادی با موفقیت حذف شد');
    }

    public function status(System $system)
    {

        $system->status = $system->status == 0 ? 1 : 0;
        $result = $system->save();
        if ($result) {
            if ($system->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }

    }

    public function componentsCreate(System $system)
    {
        $menus = SystemMenu::all();
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
        return view('admin.smart-assemble.system.components.create', compact('menus', 'system', 'case_category', 'mb_category', 'cpu_category', 'gpu_category',
            'psu_category', 'fan_category', 'cooler_category', 'ram_category', 'hdd_category', 'ssd_category'));
    }

    public function componentsStore(System $system, SystemComponentsRequest $request)
    {
        $system_price = 0;
        $inputs = $request->all();
        foreach ($inputs as $key => $value) {
            if ($key != '_token') {
                $item = SystemItem::create([
                    'name' => $key,
                    'user_id' => '1',
                    'system_id' => $system->id,
                    'product_id' => $value,
                    'price' => Product::where('id', $value)->pluck('price')->first()
                ]);
                $system_price += $item->price;
            }
        }
        $system = System::where('id', $system->id)->update(['system_price' => $system_price]);
        return redirect()->route('admin.smart-assemble.system.index')->with('swal-success', 'کانفیگ جدید با موفقیت ثبت شد');
    }

    public function componentsEdit(System $system)
    {
        $items = SystemItem::where('system_id', $system->id)->get();
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
        return view('admin.smart-assemble.system.components.edit', compact('system', 'case_category', 'mb_category', 'cpu_category', 'gpu_category',
            'psu_category', 'fan_category', 'cooler_category', 'ram_category', 'hdd_category', 'ssd_category', 'items'));
    }


    public function componentsUpdate(System $system, SystemComponentsRequest $request)
    {
        $inputs = $request->all();
        foreach ($inputs as $key => $value) {
            if ($key != '_token') {
                $item = SystemItem::update([
                    'name' => $key,
                    'user_id' => '1',
                    'system_id' => $system->id,
                    'product_id' => $value,
                    'price' => Product::where('id', $value)->pluck('price')->first()
                ]);
            }
        }
        return redirect()->route('admin.smart-assemble.system.index')->with('swal-success', 'کانفیگ جدید با موفقیت ویرایش شد');
    }

    public function components(System $system)
    {
        $items = SystemItem::where('system_id', $system->id)->get();
        return view('admin.smart-assemble.system.components.index', compact('system', 'items'));
    }
}
