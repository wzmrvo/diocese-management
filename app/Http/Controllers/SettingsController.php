<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SETTINGS INDEX
    |--------------------------------------------------------------------------
    */

    public function index(): RedirectResponse
    {
        return redirect()->route('settings.profile');
    }


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    public function profile(Request $request): View
    {
        $user = $request->user();

        return view('settings.profile', [
            'user' => $user,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFILE
    |--------------------------------------------------------------------------
    */

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],

            'last_name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update first name / last name / email
        |--------------------------------------------------------------------------
        */

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];

        /*
        |--------------------------------------------------------------------------
        | Keep the normal Laravel `name` column synchronized.
        |--------------------------------------------------------------------------
        |
        | This prevents older parts of the system that still display
        | $user->name from showing an outdated name.
        |
        */

        $user->name = trim(
            $validated['first_name'] . ' ' . $validated['last_name']
        );

        /*
        |--------------------------------------------------------------------------
        | If email changed, require verification again.
        |--------------------------------------------------------------------------
        */

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()
            ->route('settings.profile')
            ->with(
                'success',
                'Your personal information has been updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SECURITY
    |--------------------------------------------------------------------------
    */

    public function security(Request $request): View
    {
        return view('settings.security', [
            'user' => $request->user(),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PASSWORD
    |--------------------------------------------------------------------------
    */

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
        ]);

        $request->user()->update([
            'password' => Hash::make(
                $validated['password']
            ),
        ]);

        return redirect()
            ->route('settings.security')
            ->with(
                'success',
                'Your password has been updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ORGANIZATION
    |--------------------------------------------------------------------------
    */

    public function organization(Request $request): View
    {
        $user = $request->user();

        $vicariate = null;
        $unit = null;

        /*
        |--------------------------------------------------------------------------
        | Check that the organization tables exist.
        |--------------------------------------------------------------------------
        */

        if (
            Schema::hasTable('vicariates') &&
            Schema::hasTable('units')
        ) {

            /*
            |--------------------------------------------------------------------------
            | UNIT / PARISH
            |--------------------------------------------------------------------------
            |
            | The user's unit_id identifies their actual Unit / Parish.
            |
            */

            if (
                Schema::hasColumn('users', 'unit_id') &&
                !empty($user->unit_id)
            ) {

                $unit = DB::table('units')
                    ->where('id', $user->unit_id)
                    ->first();
            }


            /*
            |--------------------------------------------------------------------------
            | VICARIATE
            |--------------------------------------------------------------------------
            |
            | Prefer the Vicariate belonging to the Unit.
            |
            | This guarantees that:
            |
            | Unit = Silang
            |
            | automatically gives the Vicariate that owns Silang.
            |
            */

            if (
                $unit &&
                isset($unit->vicariate_id) &&
                !empty($unit->vicariate_id)
            ) {

                $vicariate = DB::table('vicariates')
                    ->where('id', $unit->vicariate_id)
                    ->first();

            } elseif (
                Schema::hasColumn('users', 'vicariate_id') &&
                !empty($user->vicariate_id)
            ) {

                /*
                |--------------------------------------------------------------------------
                | Fallback for users who are directly assigned to a Vicariate.
                |--------------------------------------------------------------------------
                */

                $vicariate = DB::table('vicariates')
                    ->where('id', $user->vicariate_id)
                    ->first();
            }
        }


        return view('settings.organization', [
            'user' => $user,
            'vicariate' => $vicariate,
            'unit' => $unit,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | ACCOUNT
    |--------------------------------------------------------------------------
    */

    public function account(Request $request): View
    {
        return view('settings.account', [
            'user' => $request->user(),
        ]);
    }
}