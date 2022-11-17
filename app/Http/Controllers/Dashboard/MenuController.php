<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\MenuRepo;
use App\Http\Requests\Dashboard\MenuRequest;
use App\Http\Services\Dashboard\MenuService;
use App\Models\Content\Menu;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    private string $class = Menu::class;

    public MenuRepo $repo;
    public MenuService $service;

    public function __construct(MenuRepo $menuRepo, MenuService $menuService)
    {
        $this->repo = $menuRepo;
        $this->service = $menuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $menus = $this->repo->index()->paginate(5);
        return view('adminto.menu.index', compact(['menus']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $menus = $this->repo->index()->whereNull('parent_id')->get();
        return view('adminto.menu.create', compact(['menus']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MenuRequest $request
     * @return RedirectResponse
     */
    public function store(MenuRequest $request): RedirectResponse
    {
        $request->location = $this->class::LOCATION_DIGITAL_WORLD;
        $request->level = $this->service->setLevel($request->parent_id);
        $this->service->store($request);
        return redirect()->route('adminto.menu.index')->with('swal-success', 'منو با موفقیت ذخیره شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $menu = $this->repo->findById($id);
        $menus = $this->repo->index()->whereNull('parent_id')->get()->except($id);
        return view('adminto.menu.edit', compact(['menus', 'menu']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MenuRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(MenuRequest $request, int $id): RedirectResponse
    {
        $request->level = $this->service->setLevel($request->parent_id);
        $this->service->update($request, $id);
        return redirect()->route('adminto.menu.index')->with('swal-success', 'منو با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->repo->delete($id);
        return redirect()->route('adminto.menu.index')->with('swal-success', 'منو با موفقیت حذف شد.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function changeStatus($id): RedirectResponse
    {
//        $this->authorize('index', Category::class);
        $menu = $this->repo->findById($id);
        $this->repo->changeStatus($menu);

        return redirect()->route('adminto.menu.index')->with('swal-success', 'وضعیت منو با موفقیت تغییر کرد.');
    }
}
