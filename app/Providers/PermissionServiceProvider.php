<?php

namespace App\Providers;

use App\Models\User\Permission;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {

            Permission::query()->get()->map(function ($permission) {
                Gate::define($permission->name, function ($user) use ($permission){
                    return $user->hasPermissionTo($permission);
                });
            });

        } catch (Exception $e) {
            report($e);
            return false;
        }


        //        Gate::before(function ($user) {
//            $permission = Permission::query()->where([
//                ['name', Permission::PERMISSION_SUPER_ADMIN['name']],
//                ['status', 1]
//            ])->first();
//            if (is_null($permission))
//                return false;
//            if ($user->user_type == 1 && $user->isPermission($permission))
//                return true;
//            return false;
//        });

//        foreach (Permission::all() as $permission) {
//            Gate::define($permission->name, function ($user) use ($permission) {
//                return $user->isPermission($permission);
//            });
//        }
    }
}
