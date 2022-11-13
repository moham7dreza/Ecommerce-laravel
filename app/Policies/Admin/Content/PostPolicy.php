<?php

namespace App\Policies\Admin\Content;

use App\Models\User;
use App\Models\User\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function postSectionAccess(User $user): bool
    {
        $permission = Permission::query()->where([
            ['name', Permission::PERMISSION_POSTS['name']],
            ['status', 1]
        ])->first();
        if ($user->isPermission($permission)) {
            return true;
        }
        return false;
    }
}
