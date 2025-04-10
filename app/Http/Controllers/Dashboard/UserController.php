<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\RoleRepo;
use App\Http\Repositories\Dashboard\UserRepo;
use App\Http\Requests\Dashboard\UserRequest;
use App\Http\Services\Dashboard\UserService;
use App\Http\Services\Image\ImageService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Share\Services\ShareService;

class UserController extends Controller
{
    private string $class = User::class;

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
    public function store(UserRequest $request, ImageService $imageService): RedirectResponse
    {
        if ($request->hasFile('profile_photo_path')) {
            $result = ShareService::saveImage($request->file('profile_photo_path'), 'adminto-user',
                null, $imageService);
            if ($result === false) {
                return redirect()->route('adminto.user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->profile_photo_path = $result;
        }
        $request->password = Hash::make($request->password);
        $request->user_type = 0;
        $this->service->store($request);
        return redirect()->route('adminto.user.index')->with('swal-success', 'کاربر با موفقیت ذخیره شد.');
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
     * @param int $id
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
     * @param UserRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, ImageService $imageService, int $id): RedirectResponse
    {
        $user = $this->repo->findById($id);
        if ($request->hasFile('profile_photo_path')) {
            $result = ShareService::saveImage($request->file('profile_photo_path'), 'adminto-user',
                $user->profile_photo_path, $imageService);
            if ($result === false) {
                return redirect()->route('adminto.user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->profile_photo_path = $result;
        }
        $this->service->update($request, $id);
        return redirect()->route('adminto.user.index')->with('swal-success', 'کاربر با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->repo->delete($id);
        return redirect()->route('adminto.user.index')->with('swal-success', 'کاربر با موفقیت حذف شد.');
    }

    // Role

    /**
     * @param int $userId
     * @param RoleRepo $roleRepo
     * @return Application|Factory|View
     */
    public function addRoles(int $userId, RoleRepo $roleRepo)
    {
        $roles = $roleRepo->index()->get();
        return view('adminto.user.add-roles', compact(['userId', 'roles']));
    }

    /**
     * @param Request $request
     * @param $userId
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function roleStore(Request $request, $userId): RedirectResponse
    {
        $this->validate($request, [
            'role' => 'required|string|exists:roles,name',
        ]);
//        $this->authorize('index', User::class);
        $user = $this->repo->findById($userId);
        $this->service->addRole($request->role, $user);

        return redirect()->route('adminto.user.index')->with('swal-success', 'نقش با موفقیت به کاربر افزوده شد.');
    }

    public function removeRole($userId, $roleId, RoleRepo $roleRepo): RedirectResponse
    {
//        $this->authorize('index', User::class);
        $user = $this->repo->findById($userId);
        $role = $roleRepo->findById($roleId);
        $this->service->deleteRole($user, $role->name);

        return redirect()->route('adminto.user.index')->with('swal-success', 'نقش با موفقیت از کاربر گرفته شد.');
    }
}
