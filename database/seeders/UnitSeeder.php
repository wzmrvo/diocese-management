<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\Vicariate;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Seed the units and attach them to their vicariates.
     */
    public function run(): void
    {
        $data = [
            [
                'vicariate' => 'St. Michael de Archangel, Sto. Niño de Molino & St. Mary Magdalene',
                'units' => [
                    'San Lorenzo Ruiz, Aniban Bacoor',
                    'St. Michael de Archangel, Bacoor',
                    'Holy Trinity, San Nicolas 2 Bacoor',
                    'Sto. Niño de Molino',
                    'San Pedro Apostol, Cavite City',
                    'The Holy Cross, Noveleta',
                ],
            ],

            [
                'vicariate' => 'Our Lady of the Pillar',
                'units' => [
                    'Our Lady of the Pillar Cathedral, Poblacion Imus',
                    'Immaculate Heart of Mary, Bucandala Imus',
                    'St. Joseph the Humble Worker, Golden City 3,4&5',
                    'St. Joseph the Humble Heart, Golden City 1&2',
                    'Mary Mother of God, Malagasang II-D Imus',
                ],
            ],

            [
                'vicariate' => 'Our Lady of Assumption',
                'units' => [
                    'Diocesan Shrine of Immaculate Conception, Naic',
                    'Sto. Niño de Bancaan, Bancaan Naic Cavite',
                    'San Isidro Labrador, San Roques Naic Cavite',
                    'Sto. Niño de Ternate, Ternate Cavite',
                    'Lady of Our Assumption, Maragondon',
                ],
            ],

            [
                'vicariate' => 'Immaculate Conception & St. Francis de Assisi',
                'units' => [
                    'Immaculate Conception, Poblacion Dasma',
                    'Ang Mabuting Pastol, Pala-Pala',
                    'Our Lady of Miraculous Medal, Amuntay',
                    'St. Paul de Apostle',
                    'Our Lady of Fatima, Salitran',
                    'St. Jude Thaddeus, Trece Martires',
                ],
            ],

            [
                'vicariate' => 'Our Mother of Perpetual Help',
                'units' => [
                    'Mary Immaculate, Salawag',
                    'Our Mother of Perpetual Help, DBB-A',
                    'Sacred Heart of Jesus',
                    'St. Mary Euphrasia',
                ],
            ],

            [
                'vicariate' => 'Our Lady of Candelaria & St. Joseph',
                'units' => [
                    'Our Lady of Candelaria, Silang',
                    'St. Joseph, Carmona',
                    'Our Lady of Peace & Good Voyage, GMA',
                    'St. John de Baptist, Kalubkob Lit-Lit',
                    'San Antonio de Padua Parish, Pooc Silang',
                ],
            ],

            [
                'vicariate' => 'The 7th Archangels and St. Rafael',
                'units' => [
                    'St. Augustine, Mendez',
                    'St. Gregory the Great, Indang',
                ],
            ],
        ];

        foreach ($data as $group) {
            $vicariate = Vicariate::where(
                'name',
                $group['vicariate']
            )->firstOrFail();

            foreach ($group['units'] as $unitName) {
                Unit::updateOrCreate(
                    [
                        'vicariate_id' => $vicariate->id,
                        'name' => $unitName,
                    ],
                    [
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}