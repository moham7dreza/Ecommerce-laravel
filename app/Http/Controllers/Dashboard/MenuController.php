<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\MenuRepo;
use App\Http\Services\Dashboard\MenuService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuController extends Controller
{
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
        return view('adminto.menu.create', compact(['']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return redirect()->route('adminto.menu.index')->with(['swal-success' => 'منو با موفقیت حذف شد.']);
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
        return view('adminto.menu.edit', compact(['']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MenuRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(MenuRequest $request, $id): RedirectResponse
    {
        return redirect()->route('adminto.menu.index')->with(['swal-success' => 'منو با موفقیت حذف شد.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        return redirect()->route('adminto.menu.index')->with(['swal-success' => 'منو با موفقیت حذف شد.']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function changeStatus($id): RedirectResponse
    {
//        $this->authorize('index', Category::class);
        $menu = $this->repo->findById($id);
        $this->repo->changeStatus($menu);

        return redirect()->route('adminto.menu.index')->with(['swal-success' => 'وضعیت منو با موفقیت تغییر کرد.']);
    }
}
