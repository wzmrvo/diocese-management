<?php

namespace Database\Seeders;

use App\Models\Vicariate;
use Illuminate\Database\Seeder;

class VicariateSeeder extends Seeder
{
    /**
     * Seed the vicariates.
     */
    public function run(): void
    {
        $vicariates = [
            [
                'name' => 'St. Michael de Archangel, Sto. Niño de Molino & St. Mary Magdalene',
                'code' => 'VIC-001',
            ],
            [
                'name' => 'Our Lady of the Pillar',
                'code' => 'VIC-002',
            ],
            [
                'name' => 'Our Lady of Assumption',
                'code' => 'VIC-003',
            ],
            [
                'name' => 'Immaculate Conception & St. Francis de Assisi',
                'code' => 'VIC-004',
            ],
            [
                'name' => 'Our Mother of Perpetual Help',
                'code' => 'VIC-005',
            ],
            [
                'name' => 'Our Lady of Candelaria & St. Joseph',
                'code' => 'VIC-006',
            ],
            [
                'name' => 'The 7th Archangels and St. Rafael',
                'code' => 'VIC-007',
            ],
        ];

        foreach ($vicariates as $vicariate) {
            Vicariate::updateOrCreate(
                ['name' => $vicariate['name']],
                [
                    'code' => $vicariate['code'],
                    'is_active' => true,
                ]
            );
        }
    }
}