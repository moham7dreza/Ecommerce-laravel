<?php

namespace App\Imports\User;

use App\Models\User\Permission;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PermissionsImport implements ToModel, WithChunkReading, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Permission
     */
    public function model(array $row): Permission
    {
        return new Permission([
            'name' => $row['name'],
            'description' => $row['description'],
            'status' => $row['status'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
