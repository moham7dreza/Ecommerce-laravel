<?php

namespace App\Http\Repositories\Dashboard;

use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Builder;

class SettingRepo
{
    public function index(): Builder
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    private function query(): Builder
    {
        return Setting::query();
    }
}
