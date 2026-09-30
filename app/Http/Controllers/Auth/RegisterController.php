<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a new account request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'contact_number' => ['nullable', 'string', 'max:30'],

            'organization_level' => [
                'required',
                'in:diocesan,vicariate,unit',
            ],

            'position' => [
                'required',
                'string',
                'max:100',
            ],

            'vicariate' => [
                'nullable',
                'string',
                'max:255',
            ],

            'unit' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],

            // The user does NOT get to choose admin.
            'role' => 'member',

            // Requires admin verification.
            'status' => 'pending',

            'organization_level' => $validated['organization_level'],
            'position' => $validated['position'],
            'vicariate' => $validated['vicariate'] ?? null,
            'unit' => $validated['unit'] ?? null,
            'contact_number' => $validated['contact_number'] ?? null,
        ]);

        return redirect()
            ->route('login')
            ->with(
                'status',
                'Your account request has been submitted. Please wait for administrator approval.'
            );
    }
}