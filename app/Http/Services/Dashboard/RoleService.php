<?php

namespace App\Http\Services\Dashboard;

use App\Http\Repositories\Dashboard\RoleRepo;
use App\Models\User\Role;

class RoleService
{
    public function store($request)
    {
        return Role::query()->create([
            'name' => $request->name,
            'status' => $request->status,
        ])->permissions()->sync($request->permissions);
    }

    public function update($request, $id)
    {
        $roleRepo = new RoleRepo;
        $role = $roleRepo->findById($id);

        return $role->permissions->sync($request->permissions)->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
    }
}
