<?php

namespace App\Http\Repositories\Dashboard;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class UserRepo
{
    public function index(): Builder
    {
        return $this->query()->where('id', '!=', auth()->id())->latest();
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
