<?php

namespace App\Http\Repositories\Dashboard;

use App\Models\User\Permission;

class PermissionRepo
{
    public function all()
    {
        return Permission::all();
    }
}
