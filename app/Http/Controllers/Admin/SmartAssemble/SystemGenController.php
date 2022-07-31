<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SmartAssemble\SystemGenRequest;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemGen;
use App\Models\SmartAssemble\SystemType;
use Illuminate\Http\Request;

class SystemGenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemGens = SystemGen::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.smart-assemble.gen.index', compact('systemGens'));
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
        return view('admin.smart-assemble.gen.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemGenRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-gen');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if ($result === false) {
            return redirect()->route('admin.smart-assemble.gen.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        $systemGen = SystemGen::create($inputs);
        return redirect()->route('admin.smart-assemble.gen.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
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
    public function edit(SystemGen $systemGen)
    {
        $categories = SystemCategory::all();
        $types = SystemType::all();
        return view('admin.smart-assemble.gen.edit', compact('systemGen', 'categories', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemGenRequest $request, SystemGen $systemGen, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($systemGen->image)) {
                $imageService->deleteDirectoryAndFiles($systemGen->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-gen');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.gen.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($systemGen->image)) {
                $image = $systemGen->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $systemGen->update($inputs);
        return redirect()->route('admin.smart-assemble.gen.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemGen $systemGen)
    {
        $result = $systemGen->delete();
        return redirect()->route('admin.smart-assemble.gen.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }

    public function status(SystemGen $systemGen)
    {

        $systemGen->status = $systemGen->status == 0 ? 1 : 0;
        $result = $systemGen->save();
        if ($result) {
            if ($systemGen->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }

    }
}
