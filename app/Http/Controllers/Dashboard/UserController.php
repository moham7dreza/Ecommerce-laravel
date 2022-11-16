<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\RoleRepo;
use App\Http\Repositories\Dashboard\UserRepo;
use App\Http\Services\Dashboard\UserService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public UserRepo $repo;
    public UserService $service;

    public function __construct(UserRepo $userRepo, UserService $userService)
    {
        $this->repo = $userRepo;
        $this->service = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = $this->repo->index()->paginate(5);
        return view('adminto.user.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('adminto.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('adminto.user.index')->with(['swal-success' => 'کاربر با موفقیت ذخیره شد.']);
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
        $user = $this->repo->findById($id);
        return view('adminto.user.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, int $id): RedirectResponse
    {
        $this->service->update($request, $id);
        return redirect()->route('adminto.user.index')->with(['swal-success' => 'کاربر با موفقیت ویرایش شد.']);
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
        return redirect()->route('adminto.user.index')->with(['swal-success' => 'کاربر با موفقیت حذف شد.']);
    }

    // Role

    /**
     * @param $user_id
     * @param RoleRepo $roleRepo
     * @return Application|Factory|View
     */
    public function addRoles($user_id, RoleRepo $roleRepo)
    {
        $roles = $roleRepo->index()->get();
        return view('adminto.user.add-roles', compact(['user_id', 'roles']));
    }

    /**
     * @param AddRoleRequest $request
     * @param $userId
     * @return mixed
     * @throws AuthorizationException
     */
    public function addRoleStore(AddRoleRequest $request, $userId)
    {
        $this->authorize('index', User::class);
        $user = $this->repo->findById($userId);
        $this->service->addRole($request->role, $user);

        alert()->success('اد کردن مقام به کاربر', 'عملیات با موفقیت انجام شد');
        return to_route('users.index');
    }

    public function removeRole($userId, $roleId, RoleRepo $roleRepo)
    {
        $this->authorize('index', User::class);
        $user = $this->repo->findById($userId);
        $role = $roleRepo->findById($roleId);
        $this->service->deleteRole($user, $role->name);

        alert()->success('حذف کردن مقام', 'عملیات با موفقیت انجام شد');
        return to_route('users.index');
    }
}
