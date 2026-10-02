<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AccountRequestController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| REGISTRATION
|--------------------------------------------------------------------------
*/

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
|
| These routes are available to authenticated users.
|
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | MEMBER SETTINGS
    |--------------------------------------------------------------------------
    */

    Route::get('/settings', [SettingsController::class, 'index'])
        ->name('settings');

    Route::get('/settings/profile', [SettingsController::class, 'profile'])
        ->name('settings.profile');

    Route::patch('/settings/profile', [SettingsController::class, 'updateProfile'])
        ->name('settings.profile.update');

    Route::get('/settings/security', [SettingsController::class, 'security'])
        ->name('settings.security');

    Route::patch('/settings/security', [SettingsController::class, 'updatePassword'])
        ->name('settings.password.update');

    Route::get('/settings/organization', [SettingsController::class, 'organization'])
        ->name('settings.organization');

    Route::get('/settings/account', [SettingsController::class, 'account'])
        ->name('settings.account');


    /*
    |--------------------------------------------------------------------------
    | MEMBER DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/member', function () {
        return view('member.dashboard');
    })->name('member.dashboard');


    /*
    |--------------------------------------------------------------------------
    | MEMBER PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/member/profile', function () {
        return view('member.profile');
    })->name('member.profile');

});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|
| All routes inside this group require:
|
| 1. Authentication
| 2. Admin role
|
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | ADMIN DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/', function () {

            $memberCount = User::where('role', 'member')
                ->where('status', 'approved')
                ->count();

            $pendingCount = User::where('role', 'member')
                ->where('status', 'pending')
                ->count();

            return view(
                'admin.dashboard',
                compact(
                    'memberCount',
                    'pendingCount'
                )
            );

        })->name('admin.dashboard');


        /*
        |--------------------------------------------------------------------------
        | ACCOUNT REQUESTS
        |--------------------------------------------------------------------------
        */

        Route::get('/account-requests', [
            AccountRequestController::class,
            'index'
        ])->name('admin.account-requests.index');

        Route::patch('/account-requests/{user}/approve', [
            AccountRequestController::class,
            'approve'
        ])->name('admin.account-requests.approve');

        Route::delete('/account-requests/{user}/reject', [
            AccountRequestController::class,
            'reject'
        ])->name('admin.account-requests.reject');


        /*
        |--------------------------------------------------------------------------
        | MEMBERS
        |--------------------------------------------------------------------------
        */

        Route::get('/members', function () {

            $members = User::where('role', 'member')
                ->where('status', 'approved')
                ->latest()
                ->get();

            return view(
                'admin.members',
                compact('members')
            );

        })->name('admin.members.index');


        /*
        |--------------------------------------------------------------------------
        | ORGANIZATION
        |--------------------------------------------------------------------------
        */

        Route::get('/organization', [
            OrganizationController::class,
            'index'
        ])->name('admin.organization.index');


        /*
        |--------------------------------------------------------------------------
        | DIOCESAN OFFICERS
        |--------------------------------------------------------------------------
        */

        Route::get('/organization/officers', [
            OrganizationController::class,
            'officers'
        ])->name('admin.organization.officers.index');


        /*
        |--------------------------------------------------------------------------
        | VICARIATES
        |--------------------------------------------------------------------------
        */

        Route::get('/organization/vicariates', [
            OrganizationController::class,
            'vicariates'
        ])->name('admin.organization.vicariates.index');

        Route::get('/organization/vicariates/create', [
            OrganizationController::class,
            'createVicariate'
        ])->name('admin.organization.vicariates.create');

        Route::post('/organization/vicariates', [
            OrganizationController::class,
            'storeVicariate'
        ])->name('admin.organization.vicariates.store');

        Route::get('/organization/vicariates/{vicariate}/edit', [
            OrganizationController::class,
            'editVicariate'
        ])->name('admin.organization.vicariates.edit');

        Route::patch('/organization/vicariates/{vicariate}', [
            OrganizationController::class,
            'updateVicariate'
        ])->name('admin.organization.vicariates.update');


        /*
        |--------------------------------------------------------------------------
        | VICARIATE DELETE CONFIRMATION
        |--------------------------------------------------------------------------
        |
        | This page is reached ONLY from the Edit Vicariate page.
        |
        */

        Route::get('/organization/vicariates/{vicariate}/delete', [
            OrganizationController::class,
            'confirmDeleteVicariate'
        ])->name('admin.organization.vicariates.delete');

        Route::delete('/organization/vicariates/{vicariate}', [
            OrganizationController::class,
            'destroyVicariate'
        ])->name('admin.organization.vicariates.destroy');


        /*
        |--------------------------------------------------------------------------
        | UNITS
        |--------------------------------------------------------------------------
        */

        Route::get('/organization/units', [
            OrganizationController::class,
            'units'
        ])->name('admin.organization.units.index');

        Route::get('/organization/units/create', [
            OrganizationController::class,
            'createUnit'
        ])->name('admin.organization.units.create');

        Route::post('/organization/units', [
            OrganizationController::class,
            'storeUnit'
        ])->name('admin.organization.units.store');

        Route::get('/organization/units/{unit}/edit', [
            OrganizationController::class,
            'editUnit'
        ])->name('admin.organization.units.edit');

        Route::patch('/organization/units/{unit}', [
            OrganizationController::class,
            'updateUnit'
        ])->name('admin.organization.units.update');


        /*
        |--------------------------------------------------------------------------
        | UNIT DELETE CONFIRMATION
        |--------------------------------------------------------------------------
        |
        | This page is reached ONLY from the Edit Unit page.
        |
        */

        Route::get('/organization/units/{unit}/delete', [
            OrganizationController::class,
            'confirmDeleteUnit'
        ])->name('admin.organization.units.delete');

        Route::delete('/organization/units/{unit}', [
            OrganizationController::class,
            'destroyUnit'
        ])->name('admin.organization.units.destroy');


        /*
        |--------------------------------------------------------------------------
        | ADMIN SETTINGS
        |--------------------------------------------------------------------------
        |
        | These routes are protected by both:
        |
        | auth
        | admin
        |
        */

        Route::get('/settings', [
            SettingsController::class,
            'index'
        ])->name('admin.settings');

        Route::get('/settings/profile', [
            SettingsController::class,
            'profile'
        ])->name('admin.settings.profile');

        Route::patch('/settings/profile', [
            SettingsController::class,
            'updateProfile'
        ])->name('admin.settings.profile.update');

        Route::get('/settings/security', [
            SettingsController::class,
            'security'
        ])->name('admin.settings.security');

        Route::patch('/settings/security', [
            SettingsController::class,
            'updatePassword'
        ])->name('admin.settings.password.update');

        Route::get('/settings/organization', [
            SettingsController::class,
            'organization'
        ])->name('admin.settings.organization');

        Route::get('/settings/account', [
            SettingsController::class,
            'account'
        ])->name('admin.settings.account');

    });