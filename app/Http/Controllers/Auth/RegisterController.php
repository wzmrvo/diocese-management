<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use App\Models\Vicariate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    /**
     * Display the registration page.
     */
    public function create()
    {
        $vicariates = Vicariate::query()
            ->where('is_active', true)
            ->with([
                'units' => function ($query) {
                    $query
                        ->where('is_active', true)
                        ->orderBy('name');
                },
            ])
            ->orderBy('name')
            ->get();

        $units = Unit::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('auth.register', compact(
            'vicariates',
            'units'
        ));
    }

    /**
     * Handle registration request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'contact_number' => [
                'nullable',
                'string',
                'max:30',
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],

            'member_type' => [
                'required',
                'in:senior,junior',
            ],

            'organization_level' => [
                'required',
                'in:diocesan,vicariate,unit',
            ],

            'position' => [
                'required',
                'string',
            ],

            'vicariate_id' => [
                'nullable',
                'integer',
                'exists:vicariates,id',
            ],

            'unit_id' => [
                'nullable',
                'integer',
                'exists:units,id',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Allowed Positions
        |--------------------------------------------------------------------------
        |
        | These represent the actual organizational structure.
        |
        */

        $allowedPositions = [
            'diocesan' => [
                'president',
                'first_vice_president',
                'second_vice_president',
                'secretary',
                'assistant_secretary',
                'treasurer',
                'assistant_treasurer',
                'auditor',
                'dbm',
            ],

            'vicariate' => [
                'president',
                'supervisor',
            ],

            'unit' => [
                'president',
                'vice_president',
                'secretary',
                'assistant_secretary',
                'treasurer',
                'auditor',
                'board_member',
                'member',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Validate Position Against Organizational Level
        |--------------------------------------------------------------------------
        */

        if (
            ! in_array(
                $validated['position'],
                $allowedPositions[$validated['organization_level']],
                true
            )
        ) {
            return back()
                ->withErrors([
                    'position' => 'The selected position is not valid for the selected organizational level.',
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Diocesan
        |--------------------------------------------------------------------------
        |
        | Diocese-level members do not belong to a specific Vicariate or Unit.
        |
        */

        if ($validated['organization_level'] === 'diocesan') {
            $validated['vicariate_id'] = null;
            $validated['unit_id'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Vicariate
        |--------------------------------------------------------------------------
        |
        | Vicariate members must belong to a Vicariate,
        | but not to a specific Unit.
        |
        */

        if ($validated['organization_level'] === 'vicariate') {
            $request->validate([
                'vicariate_id' => [
                    'required',
                    'integer',
                    'exists:vicariates,id',
                ],
            ]);

            $validated['unit_id'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Unit
        |--------------------------------------------------------------------------
        |
        | Unit members must have both a Vicariate and Unit.
        |
        */

        if ($validated['organization_level'] === 'unit') {
            $request->validate([
                'vicariate_id' => [
                    'required',
                    'integer',
                    'exists:vicariates,id',
                ],

                'unit_id' => [
                    'required',
                    'integer',
                    'exists:units,id',
                ],
            ]);

            /*
            | Make sure the selected Unit actually belongs
            | to the selected Vicariate.
            */

            $unitBelongsToVicariate = Unit::query()
                ->where('id', $validated['unit_id'])
                ->where('vicariate_id', $validated['vicariate_id'])
                ->exists();

            if (! $unitBelongsToVicariate) {
                return back()
                    ->withErrors([
                        'unit_id' => 'The selected Unit / Parish does not belong to the selected Vicariate.',
                    ])
                    ->withInput();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Create Account
        |--------------------------------------------------------------------------
        */

        $user = User::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make(
                $validated['password']
            ),

            'contact_number' => $validated['contact_number'] ?? null,

            'member_type' => $validated['member_type'],

            'organization_level' => $validated['organization_level'],

            'position' => $validated['position'],

            'vicariate_id' => $validated['vicariate_id'] ?? null,

            'unit_id' => $validated['unit_id'] ?? null,

            /*
            | Public registration always creates
            | a normal member account.
            |
            | Admin accounts are created separately.
            */

            'role' => 'member',

            /*
            | New registrations require administrator approval.
            */

            'status' => 'pending',
        ]);

        return redirect()
            ->route('login')
            ->with(
                'status',
                'Your account request has been submitted and is awaiting administrator approval.'
            );
    }
}