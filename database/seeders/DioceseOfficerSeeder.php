<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DioceseOfficerSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | FIND CURRENT DIOCESAN TERM
        |--------------------------------------------------------------------------
        */

        $term = DB::table('terms')
            ->where('start_year', 2025)
            ->where('end_year', 2027)
            ->first();

        if (!$term) {
            throw new \Exception('FY 2025–2027 term was not found.');
        }


        /*
        |--------------------------------------------------------------------------
        | DIOCESE SENIOR OFFICERS
        |--------------------------------------------------------------------------
        */

        $seniorOfficers = [

            [
                'name' => 'MARIA LUZ M. LABUNTOG',
                'email' => 'labuntogmarialuz@gmail.com',
                'position' => 'President',
                'contact_number' => '9420701081',
            ],

            [
                'name' => 'LORNA B. ESCOBAL',
                'email' => 'lornaescobal@gmail.com',
                'position' => '1st Vice President',
                'contact_number' => '9690964976',
            ],

            [
                'name' => 'NORA I. ALARCON',
                'email' => 'noraalrcon02@gmail.com',
                'position' => '2nd Vice President',
                'contact_number' => '9424545417',
            ],

            [
                'name' => 'JENENA F. SUPAT',
                'email' => 'jenena.fernando02@gmail.com',
                'position' => 'Secretary',
                'contact_number' => '9976651600',
            ],

            [
                'name' => 'CARMELITA D. GABRIEL',
                'email' => 'carmengabriel48@gmail.com',
                'position' => 'Assistant Secretary',
                'contact_number' => '9953345073',
            ],

            [
                'name' => 'VANGELITA V. DE TORRES',
                'email' => 'detorresvangelita@gmail.com',
                'position' => 'Treasurer',
                'contact_number' => '9219856677',
            ],

            [
                'name' => 'JOSEFINA A. SICUAN',
                'email' => 'jova.sicuan@yahoo.com',
                'position' => 'Assistant Treasurer',
                'contact_number' => '9560166367',
            ],

            [
                'name' => 'MARIETA S. FLORES',
                'email' => 'marieta.flores@gmail.com',
                'position' => 'Auditor',
                'contact_number' => '9084550033',
            ],

        ];


        foreach ($seniorOfficers as $officer) {

            $this->createOfficer(
                $officer,
                $term->id,
                'diocesan',
                'Senior'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | DIOCESAN BOARD MEMBERS
        |--------------------------------------------------------------------------
        |
        | These emails are taken from the provided CWL Diocese data.
        |
        */

        $boardMembers = [

            [
                'name' => 'AMELIA J. PERENA',
                'email' => 'ameliajperena1950@gmail.com',
                'position' => 'Diocesan Board Member',
                'contact_number' => '9611955160',
            ],

            [
                'name' => 'DOLORES Y. DOGILLO',
                'email' => 'dottydogillo@gmail.com',
                'position' => 'Diocesan Board Member',
                'contact_number' => '9212299579',
            ],

            [
                'name' => 'FRANCES LEI BARTOLAY',
                'email' => 'franceslie64@gmail.com',
                'position' => 'Diocesan Board Member',
                'contact_number' => '9457417930',
            ],

            [
                'name' => 'MA. GUADALUPE S. LOPEZ',
                'email' => 'malousevillolopez@gmail.com',
                'position' => 'Diocesan Board Member',
                'contact_number' => '9083049811',
            ],

            [
                'name' => 'ROSALIA RUMBINES',
                'email' => 'roserumbines082455@gmail.com',
                'position' => 'Diocesan Board Member',
                'contact_number' => '9977383537',
            ],

            [
                'name' => 'VIRGIE ALVAREZ',
                'email' => 'valvarez101252@gmail.com',
                'position' => 'Diocesan Board Member',
                'contact_number' => '9999838027',
            ],

            /*
            |--------------------------------------------------------------------------
            | SIMPLE ILOG
            |--------------------------------------------------------------------------
            |
            | The provided screenshot cuts off the email address.
            | Leave it NULL until the complete email is available.
            |
            */

            [
                'name' => 'SIMPLE ILOG',
                'email' => null,
                'position' => 'Diocesan Board Member',
                'contact_number' => '09175791911',
            ],

        ];


        foreach ($boardMembers as $officer) {

            $this->createOfficer(
                $officer,
                $term->id,
                'diocesan',
                'Senior'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | DIOCESE JUNIOR OFFICERS
        |--------------------------------------------------------------------------
        */

        $juniorOfficers = [

            [
                'name' => 'Chlouie De Torres',
                'email' => null,
                'position' => 'President',
                'contact_number' => null,
            ],

            [
                'name' => 'Abiella Atienza',
                'email' => null,
                'position' => '1st Vice President - Internal',
                'contact_number' => null,
            ],

            [
                'name' => 'Shena Sebastian',
                'email' => null,
                'position' => '2nd Vice President - External',
                'contact_number' => null,
            ],

            [
                'name' => 'Davie Lagdaan',
                'email' => null,
                'position' => 'Secretary',
                'contact_number' => null,
            ],

            [
                'name' => 'Shine Espinelli',
                'email' => null,
                'position' => 'Treasurer',
                'contact_number' => null,
            ],

            [
                'name' => 'Cassandra Miras',
                'email' => null,
                'position' => 'Board Member',
                'contact_number' => null,
            ],

            [
                'name' => 'Cha De Torres',
                'email' => null,
                'position' => 'Board Member',
                'contact_number' => null,
            ],

            [
                'name' => 'Ayla Jean P. Delector',
                'email' => null,
                'position' => 'Board Member',
                'contact_number' => null,
            ],

            [
                'name' => 'Vella Alexandra R. Espinelli',
                'email' => null,
                'position' => 'Board Member',
                'contact_number' => null,
            ],

            [
                'name' => 'Krissa Ramos',
                'email' => null,
                'position' => 'Board Member',
                'contact_number' => null,
            ],

        ];


        foreach ($juniorOfficers as $officer) {

            $this->createOfficer(
                $officer,
                $term->id,
                'diocesan',
                'Junior'
            );

        }
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE / UPDATE OFFICER
    |--------------------------------------------------------------------------
    */

    private function createOfficer(
        array $data,
        int $termId,
        string $organizationLevel,
        string $memberType
    ): void {

        $user = User::updateOrCreate(

            [
                'name' => $data['name'],
                'organization_level' => $organizationLevel,
            ],

            [
                'email' => $data['email'] ?? null,

                /*
                |--------------------------------------------------------------------------
                | Temporary Password
                |--------------------------------------------------------------------------
                |
                | Password is now properly hashed.
                |
                */

                'password' => Hash::make('12345678'),

                'role' => 'member',

                'status' => 'approved',

                'organization_level' => $organizationLevel,

                'member_type' => $memberType,

                'position' => $data['position'],

                'vicariate_id' => null,

                'unit_id' => null,

                'contact_number' => $data['contact_number'] ?? null,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | OFFICER ASSIGNMENT
        |--------------------------------------------------------------------------
        */

        DB::table('officer_assignments')->updateOrInsert(

            [
                'user_id' => $user->id,

                'term_id' => $termId,

                'organization_level' => $organizationLevel,

                'position' => $data['position'],

                'vicariate_id' => null,

                'unit_id' => null,
            ],

            [
                'updated_at' => now(),

                'created_at' => now(),
            ]
        );
    }
}