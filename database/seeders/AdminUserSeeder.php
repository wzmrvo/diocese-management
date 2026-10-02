<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@diocese.test',
            ],
            [
                'name' => 'System Administrator',
                'password' => 'Admin123!',
                'role' => 'admin',
                'status' => 'approved',

                'member_type' => 'Admin',
                'organization_level' => 'Admin',
                'position' => 'Admin',
                'contact_number' => null,
                'vicariate_id' => null,
                'unit_id' => null,
            ]
        );
    }
}