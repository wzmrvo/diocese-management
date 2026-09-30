<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        // Admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // User must be approved before accessing the system
        if ($user->status !== 'approved') {
            Auth::guard('web')->logout();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Your account is still waiting for administrator approval.',
                ]);
        }

        // Diocesan positions
        if ($user->organization_level === 'diocesan') {

            return match ($user->position) {

                'president' =>
                    redirect()->route('diocesan.president.dashboard'),

                'vice_president_1' =>
                    redirect()->route('diocesan.vice-president-1.dashboard'),

                'vice_president_2' =>
                    redirect()->route('diocesan.vice-president-2.dashboard'),

                'secretary' =>
                    redirect()->route('diocesan.secretary.dashboard'),

                'assistant_secretary' =>
                    redirect()->route('diocesan.assistant-secretary.dashboard'),

                'treasurer' =>
                    redirect()->route('diocesan.treasurer.dashboard'),

                'auditor' =>
                    redirect()->route('diocesan.auditor.dashboard'),

                'board_member' =>
                    redirect()->route('diocesan.board-member.dashboard'),

                default =>
                    redirect()->route('dashboard'),
            };
        }

        // Vicariate positions
        if ($user->organization_level === 'vicariate') {

            return match ($user->position) {

                'president' =>
                    redirect()->route('vicariate.president.dashboard'),

                'board_member' =>
                    redirect()->route('vicariate.board-member.dashboard'),

                default =>
                    redirect()->route('dashboard'),
            };
        }

        // Unit positions
        if ($user->organization_level === 'unit') {

            return match ($user->position) {

                'president' =>
                    redirect()->route('unit.president.dashboard'),

                'board_member' =>
                    redirect()->route('unit.board-member.dashboard'),

                'member' =>
                    redirect()->route('member.dashboard'),

                default =>
                    redirect()->route('dashboard'),
            };
        }

        return redirect()->route('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}