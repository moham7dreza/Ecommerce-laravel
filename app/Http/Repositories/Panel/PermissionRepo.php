<?php

namespace App\Http\Repositories\Panel;

use App\Models\User\Permission;

class PermissionRepo
{
    public function all()
    {
        return Permission::all();
    }
}
