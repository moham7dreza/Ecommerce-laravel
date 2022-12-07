<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SmartAssemble\SystemConfigRequest;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemConfig;
use App\Models\SmartAssemble\SystemCpu;
use App\Models\SmartAssemble\SystemMeta;
use App\Models\SmartAssemble\SystemType;
use Illuminate\Support\Facades\DB;

class SystemConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemConfigs = SystemConfig::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.smart-assemble.config.index', compact('systemConfigs'));
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
        $cpus = SystemCpu::all();
        return view('admin.smart-assemble.config.create', compact('categories', 'types', 'cpus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemConfigRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-config');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if ($result === false) {
            return redirect()->route('admin.smart-assemble.config.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;

        DB::transaction(function () use ($request, $inputs) {

            $systemConfig = SystemConfig::create($inputs);
            $metas = array_combine($request->meta_key, $request->meta_value);
            foreach ($metas as $key => $value) {
                $meta = SystemMeta::create([
                    'meta_key' => $key,
                    'meta_value' => $value,
                    'system_category_id' => $request->system_category_id,
                    'system_type_id' => $request->system_type_id,
                    'system_gen_id' => $request->system_gen_id,
                    'system_config_id' => $systemConfig->id
                ]);
            }
        });
        return redirect()->route('admin.smart-assemble.config.index')->with('swal-success', 'کانفیگ جدید شما با موفقیت ثبت شد');
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
    public function edit(SystemConfig $systemConfig)
    {
        $categories = SystemCategory::all();
        $types = SystemType::all();
        $gens = SystemCpu::all();
        return view('admin.smart-assemble.config.edit', compact('systemConfig', 'categories', 'types', 'gens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemConfigRequest $request, SystemConfig $systemConfig, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($systemConfig->image)) {
                $imageService->deleteDirectoryAndFiles($systemConfig->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-config');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.config.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($systemConfig->image)) {
                $image = $systemConfig->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        DB::transaction(function () use ($request, $inputs, $systemConfig) {
            $systemConfig->update($inputs);
            if ($request->meta_key != null) {
                $meta_keys = $request->meta_key;
                $meta_values = $request->meta_value;
                $meta_ids = array_keys($request->meta_key);
                $metas = array_map(function ($meta_id, $meta_key, $meta_value) {
                    return array_combine(
                        ['meta_id', 'meta_key', 'meta_value'],
                        [$meta_id, $meta_key, $meta_value]
                    );
                }, $meta_ids, $meta_keys, $meta_values);
                foreach ($metas as $meta) {
                    SystemMeta::where('id', $meta['meta_id'])->update(
                        ['meta_key' => $meta['meta_key'], 'meta_value' => $meta['meta_value']]
                    );
                }
            }
        });
        return redirect()->route('admin.smart-assemble.config.index')->with('swal-success', 'کانفیگ شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemConfig $systemConfig)
    {
        $result = $systemConfig->delete();
        return redirect()->route('admin.smart-assemble.config.index')->with('swal-success', 'کانفیگ شما با موفقیت حذف شد');
    }

    public function status(SystemConfig $systemConfig)
    {

        $systemConfig->status = $systemConfig->status == 0 ? 1 : 0;
        $result = $systemConfig->save();
        if ($result) {
            if ($systemConfig->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }

    }
}
