<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(RoleAndPermissionSeeder::class);
        //$this->call(AirportSeeder::class);
        $this->call(AirLinesSeeder::class);
    }
}
