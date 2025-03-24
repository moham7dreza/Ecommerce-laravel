<?php

namespace Database\Seeders;

use Database\Seeders\admin\SettingSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public static array $seeders = [];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        foreach (self::$seeders as $seeder) {
            $this->call($seeder);
        }
//        $this->call([
//            PermissionsSeeder::class
//        ]);
        // \App\Models\User::factory(10)->create();
    }
}
