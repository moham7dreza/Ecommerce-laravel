<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\System;
use App\Models\SmartAssemble\SystemGallery;
use Illuminate\Http\Request;

class SystemGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(System $system)
    {
        // TODO implement method
        // add method
        return view('admin.smart-assemble.system.gallery.index', compact('system'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(System $system)
    {
        return view('admin.smart-assemble.system.gallery.create', compact('system'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, System $system, ImageService $imageService)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-gallery');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.system.gallery.index', $system->id)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
            $inputs['system_id'] = $system->id;
            $gallery = SystemGallery::create($inputs);
            return redirect()->route('admin.smart-assemble.system.gallery.index', $system->id)->with('swal-success', 'عکس شما با موفقیت ثبت شد');
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
    public function destroy(SystemGallery $systemGallery, System $system)
    {
        $result = $systemGallery->delete();
        return redirect()->route('admin.smart-assemble.system.gallery.index', $system->id)->with('swal-success', 'عکس شما با موفقیت حذف شد');
    }
}
