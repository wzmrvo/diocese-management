<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VicariateOfficerSeeder extends Seeder
{
    public function run(): void
    {
        $term = DB::table('terms')
            ->where('start_year', 2025)
            ->where('end_year', 2027)
            ->first();

        if (!$term) {
            throw new \Exception('FY 2025–2027 term was not found.');
        }

        /*
        |--------------------------------------------------------------------------
        | VICARIATE OFFICERS
        |--------------------------------------------------------------------------
        |
        | We will populate this using the official FY 2025–2027
        | vicariate list.
        |
        */

        $officers = [
            /*
            |--------------------------------------------------------------------------
            | ST. MICHAEL DE ARCHANGEL,
            | STO. NINO DE MOLINO & ST. MARY MAGDALENE
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'SHIRLEY ANNE GOMEZ',
                'position' => 'Vicariate President',
                'vicariate' => 'ST. MICHAEL DE ARCHANGEL, STO. NINO DE MOLINO & ST. MARY MAGDALENE',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS CARMEN GABRIEL',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'ST. MICHAEL DE ARCHANGEL, STO. NINO DE MOLINO & ST. MARY MAGDALENE',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS MALOU LOPEZ',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'ST. MICHAEL DE ARCHANGEL, STO. NINO DE MOLINO & ST. MARY MAGDALENE',
                'member_type' => 'Senior',
            ],

            /*
            |--------------------------------------------------------------------------
            | OUR LADY OF THE PILLAR
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'SIS MARITES M. FIDELSON',
                'position' => 'Vicariate President',
                'vicariate' => 'OUR LADY OF THE PILLAR',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS NORA ALARCON',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR LADY OF THE PILLAR',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS FRANCES LEI BARTOLY',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR LADY OF THE PILLAR',
                'member_type' => 'Senior',
            ],

            /*
            |--------------------------------------------------------------------------
            | OUR LADY OF ASSUMPTION
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'SIS LILIA P. NER',
                'position' => 'Vicariate President',
                'vicariate' => 'OUR LADY OF ASSUMPTION',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'AMBASSADOR SIS SOFIA M. POBLETE',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR LADY OF ASSUMPTION',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS SIMPLE ILOG',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR LADY OF ASSUMPTION',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS VANGIE DE TORRES',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR LADY OF ASSUMPTION',
                'member_type' => 'Senior',
            ],

            /*
            |--------------------------------------------------------------------------
            | IMMACULATE CONCEPTION & ST. FRANCIS DE ASSISI
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'SIS ROSE L. ORTIZ',
                'position' => 'Vicariate President',
                'vicariate' => 'IMMACULATE CONCEPTION & ST. FRANCIS DE ASSISI',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS LORNA ESCOBAL',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'IMMACULATE CONCEPTION & ST. FRANCIS DE ASSISI',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS ROSALIA RUMBINES',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'IMMACULATE CONCEPTION & ST. FRANCIS DE ASSISI',
                'member_type' => 'Senior',
            ],

            /*
            |--------------------------------------------------------------------------
            | OUR MOTHER OF PERPETUAL HELP
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'SIS ANDREA TASAN',
                'position' => 'Vicariate President',
                'vicariate' => 'OUR MOTHER OF PERPETUAL HELP',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS JOSIE SICUAN',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR MOTHER OF PERPETUAL HELP',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS DOLLY DOGILLO',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR MOTHER OF PERPETUAL HELP',
                'member_type' => 'Senior',
            ],

            /*
            |--------------------------------------------------------------------------
            | OUR LADY OF CANDELARIA & ST. JOSEPH
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'EMMA L. OSTONAL',
                'position' => 'Vicariate President',
                'vicariate' => 'OUR LADY OF CANDELARIA & ST. JOSEPH',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'CWL AMBASSADOR MS. ROSALINDA SALUDO-GMA',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR LADY OF CANDELARIA & ST. JOSEPH',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS MAYET FLORES',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR LADY OF CANDELARIA & ST. JOSEPH',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS VIRGIE ALVAREZ',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'OUR LADY OF CANDELARIA & ST. JOSEPH',
                'member_type' => 'Senior',
            ],

            /*
            |--------------------------------------------------------------------------
            | THE 7TH ARCHANGELS AND ST. RAFAEL
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'JOSEFINA C. VIDA',
                'position' => 'Vicariate President',
                'vicariate' => 'THE 7TH ARCHANGELS AND ST. RAFAEL',
                'member_type' => 'Senior',
            ],

            [
                'name' => 'SIS AMELIA PERENA',
                'position' => 'Vicariate Supervisor',
                'vicariate' => 'THE 7TH ARCHANGELS AND ST. RAFAEL',
                'member_type' => 'Senior',
            ],
        ];

        foreach ($officers as $officer) {
            $vicariate = DB::table('vicariates')
                ->where('name', $officer['vicariate'])
                ->first();

            if (!$vicariate) {
                $this->command?->warn(
                    "Vicariate not found: {$officer['vicariate']}"
                );

                continue;
            }

            $user = User::updateOrCreate(
                [
                    'name' => $officer['name'],
                    'organization_level' => 'vicariate',
                ],
                [
                    'email' => null,
                    'password' => '12345678',
                    'role' => 'member',
                    'status' => 'approved',
                    'organization_level' => 'vicariate',
                    'member_type' => $officer['member_type'],
                    'position' => $officer['position'],
                    'vicariate_id' => $vicariate->id,
                    'unit_id' => null,
                    'contact_number' => null,
                ]
            );

            DB::table('officer_assignments')->updateOrInsert(
                [
                    'user_id' => $user->id,
                    'term_id' => $term->id,
                    'organization_level' => 'vicariate',
                    'position' => $officer['position'],
                    'vicariate_id' => $vicariate->id,
                    'unit_id' => null,
                ],
                [
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}