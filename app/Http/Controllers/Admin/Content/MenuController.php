<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;
use App\Models\Content\Menu;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission-menus')->only(['index']);
        $this->middleware('can:permission-menu-create')->only(['create', 'store']);
        $this->middleware('can:permission-menu-edit')->only(['edit', 'update']);
        $this->middleware('can:permission-menu-delete')->only(['destroy']);
        $this->middleware('can:permission-menu-status')->only(['status']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $menus = Menu::query()->orderBy('created_at', 'desc')->paginate(5);
        // dd($menus[2]->children);
        return view('admin.content.menu.index', compact(['menus']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.content.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MenuRequest $request
     * @return RedirectResponse
     */
    public function store(MenuRequest $request): RedirectResponse
    {
        $inputs = $request->all();
        if ($request->level == 3) {
            $inputs['parent_id'] = $request->sub_menu_id;
        }
        $menu = Menu::query()->create($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منوی جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     * @return Application|Factory|View
     */
    public function edit(Menu $menu)
    {
        $parent_menus = Menu::query()->where([
            ['parent_id', null],
            ['status', 1],
//            ['location', $menu->location]
        ])->get()->except($menu->id);
        return view('admin.content.menu.edit', compact('menu', 'parent_menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MenuRequest $request
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function update(MenuRequest $request, Menu $menu): RedirectResponse
    {
        $inputs = $request->all();
        $menu->update($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منوی  شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        $result = $menu->delete();
        return redirect()->route('admin.content.menu.index')->with('swal-success', ' منو شما با موفقیت حذف شد');
    }


    public function status(Menu $menu): JsonResponse
    {

        $menu->status = $menu->status == 0 ? 1 : 0;
        $result = $menu->save();
        if ($result) {
            if ($menu->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }

    }

    public function getSubMenus(Menu $menu): JsonResponse
    {
        $subMenus = $menu->children;
        if ($subMenus != null) {
            return response()->json(['status' => true, 'subMenus' => $subMenus]);
        } else {
            return response()->json(['status' => false, 'subMenus' => null]);
        }
    }

    public function getMenus($location): JsonResponse
    {
        $menus = Menu::query()->where('status', 1)->where('location', $location)->where('parent_id', null)->get();

        if ($menus != null) {
            return response()->json(['status' => true, 'menus' => $menus]);
        } else {
            return response()->json(['status' => false, 'menus' => null]);
        }
    }
}
