<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRule;

class SettingsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Settings Dashboard
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('settings.index');
    }


    /*
    |--------------------------------------------------------------------------
    | Profile Settings
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        return view('settings.profile');
    }


    /*
    |--------------------------------------------------------------------------
    | Update Profile
    |--------------------------------------------------------------------------
    */

    public function updateProfile(Request $request)
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
                'string',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],
        ]);

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];

        $user->save();

        return redirect()
            ->route('settings.profile')
            ->with('success', 'Your personal information has been updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Security Settings
    |--------------------------------------------------------------------------
    */

    public function security()
    {
        return view('settings.security');
    }


    /*
    |--------------------------------------------------------------------------
    | Update Password
    |--------------------------------------------------------------------------
    */

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'confirmed',
                PasswordRule::defaults(),
            ],
        ]);

        $user = $request->user();

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()
            ->route('settings.security')
            ->with('success', 'Your password has been updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Organization Information
    |--------------------------------------------------------------------------
    */

    public function organization()
    {
        return view('settings.organization');
    }


    /*
    |--------------------------------------------------------------------------
    | Account Information
    |--------------------------------------------------------------------------
    */

    public function account()
    {
        return view('settings.account');
    }
}