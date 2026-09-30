<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AccountRequestController;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Registration
|--------------------------------------------------------------------------
*/

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store']);


/*
|--------------------------------------------------------------------------
| User Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Normal Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})
->middleware(['auth', 'verified'])
->name('dashboard');


/*
|--------------------------------------------------------------------------
| MEMBER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/member', function () {
        return view('member.dashboard');
    })->name('member.dashboard');

});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
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

        return view('admin.dashboard', compact(
            'memberCount',
            'pendingCount'
        ));

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

        return view('admin.members', compact('members'));

    })->name('admin.members.index');

});