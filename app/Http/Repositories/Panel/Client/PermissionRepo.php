<?php

namespace App\Http\Repositories\Panel\Client;

use App\Models\User\Permission;

class PermissionRepo
{
    public function all()
    {
        return Permission::all();
    }
}
