<?php

namespace App\Providers;

use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use App\Models\User;
use App\Models\User\Permission;
use App\Models\User\Role;
use App\Policies\Admin\Content\PostCategoryPolicy;
use App\Policies\Admin\Content\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        PostCategory::class => PostCategoryPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

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

        foreach (Permission::all() as $permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return $user->isPermission($permission);
            });
        }
    }
}
