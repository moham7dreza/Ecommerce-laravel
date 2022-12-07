<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemGallery;
use App\Models\SmartAssemble\SystemType;
use Illuminate\Http\Request;

class SystemClassGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SystemCategory $systemCategory, SystemType $systemType)
    {
        return view('admin.smart-assemble.type.gallery.index', compact('systemCategory', 'systemType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SystemCategory $systemCategory, SystemType $systemType)
    {
        return view('admin.smart-assemble.type.gallery.create', compact('systemCategory', 'systemType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SystemCategory $systemCategory, SystemType $systemType, ImageService $imageService)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-type-gallery');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.type.gallery.index', [$systemCategory, $systemType])->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
            $inputs['system_category_id'] = $systemCategory->id;
            $inputs['system_type_id'] = $systemType->id;
            $gallery = SystemGallery::create($inputs);
            return redirect()->route('admin.smart-assemble.type.gallery.index', [$systemCategory, $systemType])->with('swal-success', 'عکس شما با موفقیت ثبت شد');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SmartAssemble\SystemGallery $systemGallery
     * @return \Illuminate\Http\Response
     */
    public function show(SystemGallery $systemGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SmartAssemble\SystemGallery $systemGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemGallery $systemGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SmartAssemble\SystemGallery $systemGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SystemGallery $systemGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SmartAssemble\SystemGallery $systemGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemCategory $systemCategory, SystemType $systemType, SystemGallery $systemGallery)
    {
        $result = $systemGallery->delete();
        return redirect()->route('admin.smart-assemble.type.gallery.index', [$systemCategory, $systemType])->with('swal-success', 'عکس شما با موفقیت حذف شد');
    }
}
