<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AccountRequestController extends Controller
{
    /**
     * Display pending account requests.
     */
    public function index(): View
    {
        $requests = User::where('role', 'member')
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('admin.account-requests', compact('requests'));
    }

    /**
     * Approve an account request.
     */
    public function approve(User $user): RedirectResponse
    {
        // Only pending member accounts can be approved.
        if ($user->role !== 'member' || $user->status !== 'pending') {
            return redirect()
                ->route('admin.account-requests.index')
                ->with('error', 'This account request is no longer available.');
        }

        $user->status = 'approved';
        $user->save();

        return redirect()
            ->route('admin.account-requests.index')
            ->with('success', 'Account approved successfully.');
    }

    /**
     * Reject an account request.
     */
    public function reject(User $user): RedirectResponse
    {
        // Only pending member accounts can be rejected.
        if ($user->role !== 'member' || $user->status !== 'pending') {
            return redirect()
                ->route('admin.account-requests.index')
                ->with('error', 'This account request is no longer available.');
        }

        // Rejected accounts are permanently removed.
        $user->delete();

        return redirect()
            ->route('admin.account-requests.index')
            ->with('success', 'Account request rejected.');
    }
}