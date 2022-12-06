<?php

namespace App\Exports\User;

use App\Models\User\Permission;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class PermissionsExport implements FromCollection
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Permission::all();
    }
}
