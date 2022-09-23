<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SmartAssemble\SystemCpuRequest;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemCpu;
use App\Models\SmartAssemble\SystemMeta;
use App\Models\SmartAssemble\SystemType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemCpuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemCpus = SystemCpu::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.smart-assemble.cpu.index', compact('systemCpus'));
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
        return view('admin.smart-assemble.cpu.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemCpuRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-cpu');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if ($result === false) {
            return redirect()->route('admin.smart-assemble.cpu.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;

        DB::transaction(function () use ($request, $inputs) {

            $systemCpu = SystemCpu::create($inputs);
            $metas = array_combine($request->meta_key, $request->meta_value);
            foreach ($metas as $key => $value){
                $meta = SystemMeta::create([
                    'meta_key' => $key,
                    'meta_value' => $value,
                    'system_category_id' => $request->system_category_id,
                    'system_type_id' =>$request->system_type_id,
                    'system_gen_id' => $systemCpu->id
                ]);
            }
        });
        return redirect()->route('admin.smart-assemble.cpu.index')->with('swal-success', 'پردازنده جدید شما با موفقیت ثبت شد');
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
    public function edit(SystemCpu $systemCpu)
    {
        $categories = SystemCategory::all();
        $types = SystemType::all();
        return view('admin.smart-assemble.cpu.edit', compact('systemCpu', 'categories', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemCpuRequest $request, SystemCpu $systemCpu, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($systemCpu->image)) {
                $imageService->deleteDirectoryAndFiles($systemCpu->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-cpu');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.cpu.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($systemCpu->image)) {
                $image = $systemCpu->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        DB::transaction(function () use ($request, $inputs, $systemCpu) {
            $systemCpu->update($inputs);
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
        return redirect()->route('admin.smart-assemble.cpu.index')->with('swal-success', 'پردازنده شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Systemژحع $systemCpu)
    {
        $result = $systemCpu->delete();
        return redirect()->route('admin.smart-assemble.cpu.index')->with('swal-success', 'پردازنده شما با موفقیت حذف شد');
    }

    public function status(SystemCpu $systemCpu)
    {

        $systemCpu->status = $systemCpu->status == 0 ? 1 : 0;
        $result = $systemCpu->save();
        if ($result) {
            if ($systemCpu->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }

    }
}
