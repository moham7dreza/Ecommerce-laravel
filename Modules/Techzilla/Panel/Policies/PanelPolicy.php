<?php

namespace Modules\Techzilla\Panel\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PanelPolicy
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

    /**
     * Check user have permission.
     *
     * @param  User $user
     * @return bool
     */
    public function manage(User $user): bool
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_PANEL)) {
            return true;
        }

        return false;
    }
}
