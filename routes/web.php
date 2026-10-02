<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AccountRequestController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| Registration
|--------------------------------------------------------------------------
*/

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile
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
    | SETTINGS DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/settings', [SettingsController::class, 'index'])
        ->name('settings');


    /*
    |--------------------------------------------------------------------------
    | SETTINGS - PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/profile', [SettingsController::class, 'profile'])
        ->name('settings.profile');


    Route::patch('/settings/profile', [SettingsController::class, 'updateProfile'])
        ->name('settings.profile.update');


    /*
    |--------------------------------------------------------------------------
    | SETTINGS - SECURITY
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/security', [SettingsController::class, 'security'])
        ->name('settings.security');


    Route::patch('/settings/security', [SettingsController::class, 'updatePassword'])
        ->name('settings.password.update');


    /*
    |--------------------------------------------------------------------------
    | SETTINGS - ORGANIZATION
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/organization', [SettingsController::class, 'organization'])
        ->name('settings.organization');


    /*
    |--------------------------------------------------------------------------
    | SETTINGS - ACCOUNT
    |--------------------------------------------------------------------------
    */

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

});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/admin', function () {

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
    | Account Requests
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/account-requests', [
        AccountRequestController::class,
        'index'
    ])->name('admin.account-requests.index');


    Route::patch('/admin/account-requests/{user}/approve', [
        AccountRequestController::class,
        'approve'
    ])->name('admin.account-requests.approve');


    Route::delete('/admin/account-requests/{user}/reject', [
        AccountRequestController::class,
        'reject'
    ])->name('admin.account-requests.reject');


    /*
    |--------------------------------------------------------------------------
    | Members
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/members', function () {

        $members = User::where('role', 'member')
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view(
            'admin.members',
            compact('members')
        );

    })->name('admin.members.index');

     Route::get('/member/profile', function () {
     return view('member.profile');
    })->middleware(['auth'])->name('member.profile');

});