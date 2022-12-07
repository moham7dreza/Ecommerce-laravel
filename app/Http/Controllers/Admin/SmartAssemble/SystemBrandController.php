<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SmartAssemble\SystemBrandRequest;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemBrand;

class SystemBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = SystemBrand::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.smart-assemble.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.smart-assemble.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemBrandRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('logo')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-brand');
            $result = $imageService->createIndexAndSave($request->file('logo'));
        }
        if ($result === false) {
            return redirect()->route('admin.smart-assemble.brand.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['logo'] = $result;
        $brand = SystemBrand::create($inputs);
        return redirect()->route('admin.smart-assemble.brand.index')->with('swal-success', 'برند جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SmartAssemble\SystemBrand $systemBrand
     * @return \Illuminate\Http\Response
     */
    public function show(SystemBrand $systemBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SmartAssemble\SystemBrand $systemBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemBrand $systemBrand)
    {
        return view('admin.smart-assemble.brand.edit', compact('systemBrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SmartAssemble\SystemBrand $systemBrand
     * @return \Illuminate\Http\Response
     */
    public function update(SystemBrandRequest $request, SystemBrand $systemBrand, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('logo')) {
            if (!empty($systemBrand->logo)) {
                $imageService->deleteDirectoryAndFiles($systemBrand->logo['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-brand');
            $result = $imageService->createIndexAndSave($request->file('logo'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.brand.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($systemBrand->logo)) {
                $image = $systemBrand->logo;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['logo'] = $image;
            }
        }
        $systemBrand->update($inputs);
        return redirect()->route('admin.smart-assemble.brand.index')->with('swal-success', 'برند شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SmartAssemble\SystemBrand $systemBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemBrand $systemBrand)
    {
        $result = $systemBrand->delete();
        return redirect()->route('admin.smart-assemble.brand.index')->with('swal-success', 'برند شما با موفقیت حذف شد');
    }
}
