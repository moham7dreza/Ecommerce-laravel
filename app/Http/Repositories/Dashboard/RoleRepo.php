<?php

namespace App\Http\Repositories\Dashboard;

use App\Models\User\Role;
use Illuminate\Database\Eloquent\Builder;

class RoleRepo
{
    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function index(): Builder
    {
        return $this->query()->latest();
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function changeStatus($role)
    {
        if ($role->status === Role::STATUS_ACTIVE) {
            return $role->update(['status' => Role::STATUS_INACTIVE]);
        }
        return $role->update(['status' => Role::STATUS_ACTIVE]);
    }

    private function query()
    {
        return Role::query();
    }
}
