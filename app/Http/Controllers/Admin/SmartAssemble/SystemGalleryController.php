<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemGallery;
use Illuminate\Http\Request;

class SystemGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SystemCategory $systemCategory)
    {
        return view('admin.smart-assemble.category.gallery.index', compact('systemCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SystemCategory $systemCategory)
    {
        return view('admin.smart-assemble.category.gallery.create', compact('systemCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SystemCategory $systemCategory, ImageService $imageService)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-category-gallery');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.category.gallery.index', $systemCategory->id)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
            $inputs['system_category_id'] = $systemCategory->id;
            $gallery = SystemGallery::create($inputs);
            return redirect()->route('admin.smart-assemble.category.gallery.index', $systemCategory->id)->with('swal-success', 'عکس شما با موفقیت ثبت شد');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SmartAssemble\SystemGallery  $systemGallery
     * @return \Illuminate\Http\Response
     */
    public function show(SystemGallery $systemGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SmartAssemble\SystemGallery  $systemGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemGallery $systemGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SmartAssemble\SystemGallery  $systemGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SystemGallery $systemGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SmartAssemble\SystemGallery  $systemGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemGallery $systemGallery, SystemCategory $systemCategory)
    {
        $result = $systemGallery->delete();
        return redirect()->route('admin.market.gallery.index', $systemCategory->id)->with('swal-success', 'عکس شما با موفقیت حذف شد');
    }
}
