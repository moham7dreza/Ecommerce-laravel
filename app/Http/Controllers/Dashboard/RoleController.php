<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\RoleRepo;
use App\Http\Services\Dashboard\RoleService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public RoleRepo $repo;
    public RoleService $service;

    public function __construct(RoleRepo $roleRepo, RoleService $roleService)
    {
        $this->repo = $roleRepo;
        $this->service = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $roles = $this->repo->index()->paginate(5);
        return view('adminto.role.index', compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('adminto.role.create', compact(['']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return redirect()->route('adminto.role.index')->with(['swal-success' => 'نقش با موفقیت ذخیره شد.']);
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
        $role = $this->repo->findById($id);
        return view('adminto.role.edit', compact(['role']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        return redirect()->route('adminto.role.index')->with(['swal-success' => 'نقش با موفقیت ویرایش شد.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        return redirect()->route('adminto.role.index')->with(['swal-success' => 'نقش با موفقیت حذف شد.']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function changeStatus($id): RedirectResponse
    {
//        $this->authorize('index', Category::class);
        $role = $this->repo->findById($id);
        $this->repo->changeStatus($role);

        return redirect()->route('adminto.role.index')->with(['swal-success' => 'وضعیت نقش با موفقیت تغییر کرد.']);
    }
}
