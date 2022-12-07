<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SmartAssemble\SystemTypeRequest;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemMeta;
use App\Models\SmartAssemble\SystemType;
use Illuminate\Support\Facades\DB;

class SystemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemTypes = SystemType::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.smart-assemble.type.index', compact('systemTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SystemCategory::all();
        return view('admin.smart-assemble.type.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemTypeRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-type');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if ($result === false) {
            return redirect()->route('admin.smart-assemble.type.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;

        DB::transaction(function () use ($request, $inputs) {

            $systemType = SystemType::create($inputs);
            $metas = array_combine($request->meta_key, $request->meta_value);
            foreach ($metas as $key => $value) {
                $meta = SystemMeta::create([
                    'meta_key' => $key,
                    'meta_value' => $value,
                    'system_category_id' => $request->system_category_id,
                    'system_type_id' => $systemType->id
                ]);
            }
        });
        return redirect()->route('admin.smart-assemble.type.index')->with('swal-success', 'کلاس سیستم جدید شما با موفقیت ثبت شد');
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
    public function edit(SystemType $systemType)
    {
        $categories = SystemCategory::all();
        return view('admin.smart-assemble.type.edit', compact('systemType', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemTypeRequest $request, SystemType $systemType, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($systemCategory->image)) {
                $imageService->deleteDirectoryAndFiles($systemCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-type');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.type.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($systemType->image)) {
                $image = $systemType->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        DB::transaction(function () use ($request, $inputs, $systemType) {
            $systemType->update($inputs);
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
        return redirect()->route('admin.smart-assemble.type.index')->with('swal-success', 'کلاس سیستم شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemType $systemType)
    {
        $result = $systemType->delete();
        return redirect()->route('admin.smart-assemble.type.index')->with('swal-success', 'کلاس سیستم شما با موفقیت حذف شد');
    }

    public function status(SystemType $systemType)
    {

        $systemType->status = $systemType->status == 0 ? 1 : 0;
        $result = $systemType->save();
        if ($result) {
            if ($systemType->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }

    }
}
