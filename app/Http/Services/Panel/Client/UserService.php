<?php

namespace App\Http\Services\Panel\Client;

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

    public function addRole($role, $user)
    {
        return $user->roles()->sync($role);
    }

    public function deleteRole($user, $role)
    {
        return $user->removeRole($role);
    }

    private function query(): Builder
    {
        return User::query();
    }
}
