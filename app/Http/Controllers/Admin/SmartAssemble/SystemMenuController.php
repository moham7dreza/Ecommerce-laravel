<?php

namespace App\Http\Controllers\Admin\SmartAssemble;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SmartAssemble\SystemMenuRequest;
use App\Http\Services\Image\ImageService;
use App\Models\SmartAssemble\SystemMenu;

class SystemMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = SystemMenu::all();
        return view('admin.smart-assemble.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = SystemMenu::where('parent_id', null)->get();
        return view('admin.smart-assemble.menu.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemMenuRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-menus');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.menu.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            } else
                $inputs['image'] = $result;
        } else
            $inputs['image'] = null;
        $menu = SystemMenu::create($inputs);
        return redirect()->route('admin.smart-assemble.menu.index')->with('swal-success', 'منوی جدید شما با موفقیت ثبت شد');
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
    public function edit(SystemMenu $systemMenu)
    {
        $parent_menus = SystemMenu::where('parent_id', null)->get()->except($systemMenu->id);
        return view('admin.smart-assemble.menu.edit', compact('systemMenu', 'parent_menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemMenuRequest $request, SystemMenu $systemMenu, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            if (!empty($systemMenu->image)) {
                $imageService->deleteDirectoryAndFiles($systemMenu->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'system-menus');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.smart-assemble.system.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($systemMenu->image)) {
                $image = $systemMenu->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            } else $inputs['image'] = null;
        }
        $systemMenu->update($inputs);
        return redirect()->route('admin.smart-assemble.menu.index')->with('swal-success', 'منوی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemMenu $systemMenu)
    {
        $result = $systemMenu->delete();
        return redirect()->route('admin.smart-assemble.menu.index')->with('swal-success', ' منو شما با موفقیت حذف شد');
    }


    public function status(SystemMenu $systemMenu)
    {

        $systemMenu->status = $systemMenu->status == 0 ? 1 : 0;
        $result = $systemMenu->save();
        if ($result) {
            if ($systemMenu->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }

    }
}
