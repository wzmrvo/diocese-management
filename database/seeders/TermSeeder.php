<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    public function run(): void
    {
        Term::updateOrCreate(
            [
                'start_year' => 2025,
                'end_year' => 2027,
            ],
            [
                'name' => 'FY 2025–2027',
                'is_active' => true,
            ]
        );
    }
}
