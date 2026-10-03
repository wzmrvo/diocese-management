<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display approved active members.
     */
    public function index()
    {
        $members = User::with(['cwlUnit', 'vicariate'])
            ->where('role', 'member')
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view(
            'admin.members.members',
            compact('members')
        );
    }

    /**
     * Display inactive members.
     */
    public function inactive()
    {
        $members = User::with(['cwlUnit', 'vicariate'])
            ->where('role', 'member')
            ->where('status', 'inactive')
            ->latest()
            ->get();

        return view(
            'admin.members.inactive',
            compact('members')
        );
    }

    /**
     * Deactivate / kick a member.
     *
     * The account is NOT permanently deleted.
     */
    public function deactivate(User $user): RedirectResponse
    {
        if ($user->role !== 'member') {
            abort(403);
        }

        $user->update([
            'status' => 'inactive',
        ]);

        return redirect()
            ->route('admin.members.index')
            ->with(
                'success',
                "{$user->name} has been deactivated."
            );
    }

    /**
     * Reactivate an inactive member.
     */
    public function reactivate(User $user): RedirectResponse
    {
        if ($user->role !== 'member') {
            abort(403);
        }

        if ($user->status !== 'inactive') {
            abort(403);
        }

        $user->update([
            'status' => 'approved',
        ]);

        return redirect()
            ->route('admin.members.inactive')
            ->with(
                'success',
                "{$user->name} has been reactivated."
            );
    }

    /**
     * Permanently delete an inactive member.
     *
     * Only inactive member accounts can be permanently deleted.
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->role !== 'member') {
            abort(403);
        }

        if ($user->status !== 'inactive') {
            abort(403);
        }

        $memberName = $user->name;

        $user->delete();

        return redirect()
            ->route('admin.members.inactive')
            ->with(
                'success',
                "{$memberName} has been permanently deleted."
            );
    }
}