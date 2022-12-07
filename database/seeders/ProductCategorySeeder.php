<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'ایجاد دسته بندی محصول',
            'description' => 'ایجاد دسته بندی محصول',
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('permissions')->insert([
            'name' => 'ویرایش دسته بندی محصول',
            'description' => 'ویرایش دسته بندی محصول',
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('permissions')->insert([
            'name' => 'حذف دسته بندی محصول',
            'description' => 'حذف دسته بندی محصول',
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('permissions')->insert([
            'name' => 'نمایش دسته بندی محصول',
            'description' => 'نمایش دسته بندی محصول',
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
