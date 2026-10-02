<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use App\Models\Vicariate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $vicariates = Vicariate::query()
            ->where('is_active', true)
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
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
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
                'lowercase',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],

            'contact_number' => [
                'nullable',
                'string',
                'max:30',
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
                'max:100',
            ],

            'vicariate_id' => [
                'nullable',
                'exists:vicariates,id',
            ],

            'unit_id' => [
                'nullable',
                'exists:units,id',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Validate organization relationships
        |--------------------------------------------------------------------------
        */

        if ($validated['organization_level'] === 'diocesan') {
            $validated['vicariate_id'] = null;
            $validated['unit_id'] = null;
        }

        if ($validated['organization_level'] === 'vicariate') {
            if (!$validated['vicariate_id']) {
                return back()
                    ->withErrors([
                        'vicariate_id' => 'Please select your Vicariate.',
                    ])
                    ->withInput();
            }

            $validated['unit_id'] = null;
        }

        if ($validated['organization_level'] === 'unit') {
            if (!$validated['unit_id']) {
                return back()
                    ->withErrors([
                        'unit_id' => 'Please select your Unit / Parish.',
                    ])
                    ->withInput();
            }

            $unit = Unit::find($validated['unit_id']);

            if (!$unit) {
                return back()
                    ->withErrors([
                        'unit_id' => 'The selected unit does not exist.',
                    ])
                    ->withInput();
            }

            /*
            |--------------------------------------------------------------------------
            | Automatically determine the Vicariate from the selected Unit
            |--------------------------------------------------------------------------
            */

            $validated['vicariate_id'] = $unit->vicariate_id;
        }

        /*
        |--------------------------------------------------------------------------
        | Create account request
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],

            // Applicant can NEVER choose admin.
            'role' => 'member',

            // Account must be approved.
            'status' => 'pending',

            'member_type' => $validated['member_type'],

            'organization_level' => $validated['organization_level'],

            'position' => $validated['position'],

            'vicariate_id' => $validated['vicariate_id'] ?? null,

            'unit_id' => $validated['unit_id'] ?? null,

            'contact_number' => $validated['contact_number'] ?? null,

            // Keep these legacy text fields empty.
            'vicariate' => null,
            'unit' => null,
        ]);

        return redirect()
            ->route('login')
            ->with(
                'status',
                'Your account request has been submitted. Please wait for administrator approval.'
            );
    }
}