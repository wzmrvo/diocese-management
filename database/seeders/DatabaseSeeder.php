<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ORGANIZATIONAL STRUCTURE
        |--------------------------------------------------------------------------
        */

        $this->call([
            TermSeeder::class,
            VicariateSeeder::class,
            UnitSeeder::class,
            AdminUserSeeder::class,
        ]);

        /*
        |--------------------------------------------------------------------------
        | OFFICERS
        |--------------------------------------------------------------------------
        */

        $this->call([
            DioceseOfficerSeeder::class,
            VicariateOfficerSeeder::class,
            UnitOfficerSeeder::class,
        ]);
    }
}