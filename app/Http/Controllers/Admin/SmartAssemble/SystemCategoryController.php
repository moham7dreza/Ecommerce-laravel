<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SmartAssemble\SystemCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemCategory;
use App\Models\SmartAssemble\SystemMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemCategories = SystemCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.smart-assemble.category.index', compact('systemCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SystemCategory::where('parent_id', null)->get();
        return view('admin.smart-assemble.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemCategoryRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if($result === false)
        {
            return redirect()->route('admin.smart-assemble.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;

        DB::transaction(function () use ($request, $inputs) {

            $systemCategory = SystemCategory::create($inputs);
            $metas = array_combine($request->meta_key, $request->meta_value);
            foreach ($metas as $key => $value){
                $meta = SystemMeta::create([
                    'meta_key' => $key,
                    'meta_value' => $value,
                    'system_category_id' => $systemCategory->id
                ]);
            }
        });


        return redirect()->route('admin.smart-assemble.category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemCategory $systemCategory)
    {
        $parent_categories = SystemCategory::where('parent_id', null)->get()->except($systemCategory->id);
        return view('admin.smart-assemble.category.edit', compact('systemCategory', 'parent_categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemCategoryRequest $request, SystemCategory $systemCategory, ImageService $imageService)
    {
        $inputs = $request->all();

        if($request->hasFile('image'))
        {
            if(!empty($systemCategory->image))
            {
                $imageService->deleteDirectoryAndFiles($systemCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.smart-assemble.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else{
            if(isset($inputs['currentImage']) && !empty($systemCategory->image))
            {
                $image = $systemCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $systemCategory->update($inputs);
        return redirect()->route('admin.smart-assemble.category.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemCategory $systemCategory)
    {
        $result = $systemCategory->delete();
        return redirect()->route('admin.smart-assemble.category.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }

    public function status(SystemCategory $systemCategory){

        $systemCategory->status = $systemCategory->status == 0 ? 1 : 0;
        $result = $systemCategory->save();
        if($result){
            if($systemCategory->status == 0){
                return response()->json(['status' => true, 'checked' => false]);
            }
            else{
                return response()->json(['status' => true, 'checked' => true]);
            }
        }
        else{
            return response()->json(['status' => false]);
        }

    }
}
