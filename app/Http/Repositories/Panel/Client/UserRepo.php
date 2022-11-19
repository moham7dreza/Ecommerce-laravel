<?php

namespace App\Http\Repositories\Panel\Client;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepo
{
    public function index(): Builder
    {
        return $this->query()->latest();
        // ->where('id', '!=', auth()->id())
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
        return User::query();
    }
}
