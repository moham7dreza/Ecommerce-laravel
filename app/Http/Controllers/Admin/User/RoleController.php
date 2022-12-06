<?php

namespace App\Http\Controllers\admin\user;

use App\Exports\User\PermissionsExport;
use App\Imports\User\PermissionsImport;
use App\Models\User\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\RoleRequest;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission-user-roles')->only(['index']);
        $this->middleware('can:permission-user-role-create')->only(['create', 'store']);
        $this->middleware('can:permission-user-role-edit')->only(['edit', 'update']);
        $this->middleware('can:permission-user-role-delete')->only(['destroy']);
        $this->middleware('can:permission-user-role-status')->only(['status']);
        $this->middleware('can:permission-user-role-permissions')->only(['permissionForm', 'permissionUpdate']);
        $this->middleware('can:permission-user-permissions-import')->only(['permissionImport']);
        $this->middleware('can:permission-user-permissions-export')->only(['permissionExport']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.user.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.user.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $user = \auth()->user();
        $inputs = $request->all();
        $role = Role::create($inputs);
        $inputs['permissions'] = $inputs['permissions'] ?? [];
        $role->permissions()->sync($inputs['permissions']);
        $user->permissions()->sync($inputs['permissions']);
        return redirect()->route('admin.user.role.index')->with('swal-success', 'نقش جدید با موفقیت ثبت شد');
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
    public function edit(Role $role)
    {
        return view('admin.user.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $inputs = $request->all();
        $role->update($inputs);
        return redirect()->route('admin.user.role.index')->with('swal-success', 'نقش شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $result = $role->delete();
        return redirect()->route('admin.user.role.index')->with('swal-success', 'نقش شما با موفقیت حذف شد');
    }


    public function permissionForm(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.user.role.set-permission', compact('role', 'permissions'));
    }


    public function permissionUpdate(RoleRequest $request, Role $role)
    {
        $user = Auth::user();
        $inputs = $request->all();
        $inputs['permissions'] = $inputs['permissions'] ?? [];
        $role->permissions()->sync($inputs['permissions']);
        $user->permissions()->sync($inputs['permissions']);
        return redirect()->route('admin.user.role.index')->with('swal-success', 'نقش جدید با موفقیت ویرایش شد');
    }

    public function permissionsImport(Request $request): RedirectResponse
    {
        Excel::import(new PermissionsImport(), $request->file('permissions'));
        return redirect()->route('admin.user.role.index')->with('swal-success', 'سطوح دسترسی با موفقیت بارگذاری شد.');
    }

    public function permissionsExport(): BinaryFileResponse
    {
        return Excel::download(new PermissionsExport() , "export_user_permissions.xlsx");
    }
}
