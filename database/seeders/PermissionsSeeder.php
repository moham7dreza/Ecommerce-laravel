<?php

namespace Database\Seeders;

use App\Models\User\Permission;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Permission::$permissions as $permission) {
            Permission::query()->updateOrCreate(['name' => $permission['name'], 'description' => $permission['description'], 'status' => 1]);
        }
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
