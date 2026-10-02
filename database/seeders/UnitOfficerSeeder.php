<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitOfficerSeeder extends Seeder
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

        $unitPresidents = [

            /*
            |--------------------------------------------------------------------------
            | ST. MICHAEL DE ARCHANGEL,
            | STO. NINO DE MOLINO & ST. MARY MAGDALENE
            |--------------------------------------------------------------------------
            */

            [
                'unit' => 'SAN LORENZO RUIZ, ANIBAN BACOOR',
                'president' => 'CONCEPTION BARTOLOME',
            ],

            [
                'unit' => 'ST. MICHAEL DE ARCHANGEL, BACOOR',
                'president' => 'SHIRLEY ANNE GOMEZ',
            ],

            [
                'unit' => 'HOLY TRINITY, SAN NICOLAS 2 BACOOR',
                'president' => 'CORAZON CLAUDIO',
            ],

            [
                'unit' => 'STO. NINO DE MOLINO',
                'president' => 'ROSEMARIE LAVADA',
            ],

            [
                'unit' => 'SAN PEDRO APOSTOL, CAVITY CITY',
                'president' => null,
            ],

            [
                'unit' => 'THE HOLY CROSS, NOVELETA',
                'president' => 'CONSELO R. ARENAS',
            ],

            /*
            |--------------------------------------------------------------------------
            | OUR LADY OF THE PILLAR
            |--------------------------------------------------------------------------
            */

            [
                'unit' => 'OUR LADY OF THE PILLAR CATHEDRAL, POBLACION IMUS',
                'president' => 'FRANCISCA O. MARTINEZ',
            ],

            [
                'unit' => 'IMMACULATE HEART OF MARY, BUCANDALA IMUS',
                'president' => 'FELY GERON',
            ],

            [
                'unit' => 'ST. JOSEPH THE HUMBLE WORKER, GOLDEN CITY 3,4&5',
                'president' => 'JOSIE RAMOS',
            ],

            [
                'unit' => 'ST. JOSEPH THE HUMBLE HEART, GOLDEN CITY 1&2',
                'president' => null,
            ],

            [
                'unit' => 'MARY MOTHER OF GOD, MALAGASANG II-D IMUS',
                'president' => 'FLOR T. REYES',
            ],

            /*
            |--------------------------------------------------------------------------
            | OUR LADY OF ASSUMPTION
            |--------------------------------------------------------------------------
            */

            [
                'unit' => 'DIOCESAN SHRINE OF IMMACULATE CONCEPTION, NAIC',
                'president' => 'ELIZA DE OCAMPO',
            ],

            [
                'unit' => 'STO. NINO DE BANCAAN, BANCAAN NAIC CAVITE',
                'president' => 'OFELIA MILAY',
            ],

            [
                'unit' => 'SAN ISIDRO LABRADOR, SAN ROQUES NAIC CAVITE',
                'president' => 'LESLIE HINTAY',
            ],

            [
                'unit' => 'STO. NINO DE TERNATE, TERNATE CAVITE',
                'president' => 'FLORIE DUCOLAN',
            ],

            [
                'unit' => 'LADY OF OUR ASSUMPTION, MARAGONDON',
                'president' => 'JOSEPHINE RIEL',
            ],

            /*
            |--------------------------------------------------------------------------
            | IMMACULATE CONCEPTION & ST. FRANCIS DE ASSISI
            |--------------------------------------------------------------------------
            */

            [
                'unit' => 'IMMACULATE CONCEPTION, POBLACION DASMA',
                'president' => 'SIS MICHELE CAPISTRANO',
            ],

            [
                'unit' => 'ANG MABUTING PASTOL, PALA-PALA',
                'president' => 'OIC ELLIE TULIO',
            ],

            [
                'unit' => 'OUR LADY OF MERACULOUS MEDAL, AMUNTAY',
                'president' => 'OIC JULIET TOLENTINO',
            ],

            [
                'unit' => 'ST. PAUL DE APOSTLE',
                'president' => 'SIS LOUELLA ODTUHAN',
            ],

            [
                'unit' => 'OUR LADY OF FATIMA, SALITRAN',
                'president' => 'SIS REGINA AGRAMON',
            ],

            [
                'unit' => 'ST. JUDE THADDEUS, TRECE MARTIRES',
                'president' => 'AURORA VILLALOBOS',
            ],

            /*
            |--------------------------------------------------------------------------
            | OUR MOTHER OF PERPETUAL HELP
            |--------------------------------------------------------------------------
            */

            [
                'unit' => 'MARY IMMACULATE, SALAWAG',
                'president' => 'DARLENE ALIPIO',
            ],

            [
                'unit' => 'OUR MOTHER OF PERPETUAL HELP, DBB-A',
                'president' => 'DELILAH PEROCHO',
            ],

            [
                'unit' => 'SACRED HEART OF JESUS',
                'president' => 'ANDREA TASAN',
            ],

            [
                'unit' => 'ST. MARY EUPHRASIA',
                'president' => 'SUSANA LAPAZ',
            ],

            /*
            |--------------------------------------------------------------------------
            | OUR LADY OF CANDELARIA & ST. JOSEPH
            |--------------------------------------------------------------------------
            */

            [
                'unit' => 'OUR LADY OF CANDELARIA, SILANG',
                'president' => 'RAFAELA TOLEDO',
            ],

            [
                'unit' => 'ST JOSEPH, CARMONA',
                'president' => 'LUCILA LEVARDO',
            ],

            [
                'unit' => 'OUR LADY OF PEACE & GOOD VOYAGE, GMA',
                'president' => 'DELIA NOTORIO',
            ],

            [
                'unit' => 'ST. JOHN DE BAPTIST, KALUBKOB LIT-LIT',
                'president' => 'NENE TIMOTEO',
            ],

            [
                'unit' => 'SAN ANTONIO DE PADUA PARISH, POOC SILANG',
                'president' => 'NENITA BELAMIDE',
            ],

            /*
            |--------------------------------------------------------------------------
            | THE 7TH ARCHANGELS AND ST. RAFAEL
            |--------------------------------------------------------------------------
            */

            [
                'unit' => 'ST. AUGUSTINE, MENDEZ',
                'president' => 'SARAH LEONDIS',
            ],

            [
                'unit' => 'ST. GREGORY THE GREAT, INDANG',
                'president' => 'JOY SANIEL',
            ],
        ];

        foreach ($unitPresidents as $data) {

            if (!$data['president']) {
                $this->command?->warn(
                    "No unit president recorded for: {$data['unit']}"
                );

                continue;
            }

            $unit = DB::table('units')
                ->where('name', $data['unit'])
                ->first();

            if (!$unit) {
                $this->command?->warn(
                    "Unit not found: {$data['unit']}"
                );

                continue;
            }

            $user = User::updateOrCreate(
                [
                    'name' => $data['president'],
                    'organization_level' => 'unit',
                ],
                [
                    'email' => null,
                    'password' => '12345678',
                    'role' => 'member',
                    'status' => 'approved',
                    'organization_level' => 'unit',
                    'member_type' => 'Senior',
                    'position' => 'Unit President',
                    'vicariate_id' => $unit->vicariate_id,
                    'unit_id' => $unit->id,
                    'contact_number' => null,
                ]
            );

            DB::table('officer_assignments')->updateOrInsert(
                [
                    'user_id' => $user->id,
                    'term_id' => $term->id,
                    'organization_level' => 'unit',
                    'position' => 'Unit President',
                    'vicariate_id' => $unit->vicariate_id,
                    'unit_id' => $unit->id,
                ],
                [
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}