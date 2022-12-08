<?php

namespace Database\Seeders\admin;

use App\Models\User;
use App\Models\User\Permission;
use App\Models\User\Role;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // all system permissions
        foreach (Permission::$permissions as $permission) {
            Permission::query()->updateOrCreate(['name' => $permission['name'], 'description' => $permission['description'], 'status' => 1]);
        }

        // all system roles
        foreach (Role::$roles as $role) {
            Role::query()->updateOrCreate(['name' => $role['name'], 'description' => $role['description'],'status' => 1]);
        }

        // primary role and permission
        $role_super_admin = Role::query()->where('name', Role::ROLE_SUPER_ADMIN['name'])->first();
        $permission_super_admin = Permission::query()->where('name', Permission::PERMISSION_SUPER_ADMIN['name'])->first();

        // assign primary permission to role
        $role_super_admin->permissions()->sync($permission_super_admin);

        // find admin
        $super_admin = User::query()->first();
        // if user not found then create
        if (is_null($super_admin)){
            User::query()->create([
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'activation' => 1,
                'status' => 1,
                'user_type' => 1
            ]);
        }

        // assign primary role and permission to super admin
        $super_admin->roles()->sync($role_super_admin);
        $super_admin->permissions()->sync($permission_super_admin);


//        DB::table('permissions')->insert([
//            'name' => 'بخش فروش',
//            'description' => 'دسترسی به تمام بخش های قسمت فروش در پنل ادمین',
//            'status' => 1,
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' =>  Carbon::now()->toDateTimeString()
//        ]);
//        DB::table('permissions')->insert([
//            'name' => 'بخش محتوا',
//            'description' => 'دسترسی به تمام بخش های قسمت محتوا در پنل ادمین',
//            'status' => 1,
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' =>  Carbon::now()->toDateTimeString()
//        ]);
//        DB::table('permissions')->insert([
//            'name' => 'اسمبل هوشمند',
//            'description' => 'دسترسی به تمام بخش های قسمت اسمبل هوشمند در پنل ادمین',
//            'status' => 1,
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' =>  Carbon::now()->toDateTimeString()
//        ]);
//        DB::table('permissions')->insert([
//            'name' => 'بخش کاربران',
//            'description' => 'دسترسی به تمام بخش های قسمت کاربران در پنل ادمین',
//            'status' => 1,
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' =>  Carbon::now()->toDateTimeString()
//        ]);
//        DB::table('permissions')->insert([
//            'name' => 'بخش تیکت ها',
//            'description' => 'دسترسی به تمام بخش های قسمت تیکت ها در پنل ادمین',
//            'status' => 1,
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' =>  Carbon::now()->toDateTimeString()
//        ]);
//        DB::table('permissions')->insert([
//            'name' => 'بخش اطلاع رسانی',
//            'description' => 'دسترسی به تمام بخش های قسمت اطلاع رسانی در پنل ادمین',
//            'status' => 1,
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' =>  Carbon::now()->toDateTimeString()
//        ]);
//        DB::table('permissions')->insert([
//            'name' => 'بخش تنظیمات',
//            'description' => 'دسترسی به تمام بخش های قسمت تنظیمات در پنل ادمین',
//            'status' => 1,
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' =>  Carbon::now()->toDateTimeString()
//        ]);
    }
}
