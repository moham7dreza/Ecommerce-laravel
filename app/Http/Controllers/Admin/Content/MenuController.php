<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'desc')->simplePaginate(15);
        // dd($menus[2]->children);
        return view('admin.content.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::where('parent_id', null)->get();
        $levels = Menu::$levels;
        $locations = Menu::$locations;
        return view('admin.content.menu.create', compact('menus', 'levels', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $inputs = $request->all();
        if ($request->menu_level == 3)
        {
            $inputs['parent_id'] = $request->sub_menu_id;
        }
        $menu = Menu::create($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منوی  جدید شما با موفقیت ثبت شد');
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
    public function edit(Menu $menu)
    {
        $parent_menus = Menu::where('parent_id', null)->where('status', 1)->where('location', $menu->location)->get()->except($menu->id);
        $levels = Menu::$levels;
        $locations = Menu::$locations;
        return view('admin.content.menu.edit', compact('menu' ,'parent_menus', 'levels', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $inputs = $request->all();
        $menu->update($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منوی  شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $result = $menu->delete();
        return redirect()->route('admin.content.menu.index')->with('swal-success', ' منو شما با موفقیت حذف شد');
    }


    public function status(Menu $menu){

        $menu->status = $menu->status == 0 ? 1 : 0;
        $result = $menu->save();
        if($result){
                if($menu->status == 0){
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

    public function getSubMenus(Menu $menu)
    {
        $subMenus = $menu->children;
        if($subMenus != null)
        {
            return response()->json(['status' => true, 'subMenus' => $subMenus]);
        }
        else{
            return response()->json(['status' => false, 'subMenus' => null]);
        }
    }

    public function getMenus($location)
    {
        $menus = Menu::where('status', 1)->where('location', $location)->where('parent_id', null)->get();

        if($menus != null)
        {
            return response()->json(['status' => true, 'menus' => $menus]);
        }
        else{
            return response()->json(['status' => false, 'menus' => null]);
        }
    }
}
