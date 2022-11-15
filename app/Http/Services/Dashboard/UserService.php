<?php

namespace App\Http\Services\Dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserService
{
    public function store($request)
    {
        return $this->query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
//            'password' => Hash::make($request->password),
        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    private function query(): Builder
    {
        return User::query();
    }
}
