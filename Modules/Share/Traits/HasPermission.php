<?php

namespace Share\Traits;

use App\Models\User\Permission;
use App\Models\User\Role;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasPermission
{
    use HasRelationships;

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    // new functions
    protected function hasPermission($permission): bool
    {
        return (bool)$this->permissions->where('name', $permission->name)->count();
    }

    public function hasPermissionTo($permission): bool
    {
        return $this->hasPermission($permission) || $this->hasPermissionThroughRole($permission);
    }

    public function hasPermissionThroughRole($permission): bool
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole(...$roles): bool
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    // old functions
    public function isPermission($permission): bool
    {
        return $this->permissions->contains('name', $permission->name) || $this->isRole($permission->roles);
    }

    /**
     * @param $roles
     * @return bool
     */
    public function isRole($roles): bool
    {
        return !!$roles->intersect($this->roles)->all();
    }
}
