<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SmartAssemble\SystemConfigRequest;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemConfig;
use App\Models\SmartAssemble\SystemGen;
use App\Models\SmartAssemble\SystemType;
use Illuminate\Http\Request;

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
        $gens = SystemGen::all();
        return view('admin.smart-assemble.config.create', compact('categories', 'types', 'gens'));
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
        $systemConfig = SystemConfig::create($inputs);
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
        $gens = SystemGen::all();
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
        $systemConfig->update($inputs);
        return redirect()->route('admin.smart-assemble.config.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
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
        return redirect()->route('admin.smart-assemble.config.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
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
