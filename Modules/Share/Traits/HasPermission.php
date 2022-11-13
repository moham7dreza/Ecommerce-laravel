<?php

namespace Share\Traits;

use App\Models\User\Permission;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasPermission
{
    use HasRelationships;

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function isPermission($permission): bool
    {
        return $this->permissions->contains('name', $permission->name) || $this->isRole($permission->roles);
    }

    public function isRole($roles): bool
    {
        return !!$roles->intersect($this->roles)->all();
    }
}
