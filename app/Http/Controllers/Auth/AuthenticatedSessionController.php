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
        /*
        |--------------------------------------------------------------------------
        | Authenticate User
        |--------------------------------------------------------------------------
        */

        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();


        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }


        /*
        |--------------------------------------------------------------------------
        | ACCOUNT APPROVAL
        |--------------------------------------------------------------------------
        |
        | Only approved users may enter the system.
        |
        */

        if ($user->status !== 'approved') {

            Auth::guard('web')->logout();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' =>
                        'Your account is still waiting for administrator approval.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | DIOCESAN USERS
        |--------------------------------------------------------------------------
        */

        if ($user->organization_level === 'diocesan') {

            return match ($user->position) {

                'president' =>
                    redirect()->route(
                        'diocesan.president.dashboard'
                    ),

                'first_vice_president' =>
                    redirect()->route(
                        'diocesan.vice-president-1.dashboard'
                    ),

                'second_vice_president' =>
                    redirect()->route(
                        'diocesan.vice-president-2.dashboard'
                    ),

                'secretary' =>
                    redirect()->route(
                        'diocesan.secretary.dashboard'
                    ),

                'assistant_secretary' =>
                    redirect()->route(
                        'diocesan.assistant-secretary.dashboard'
                    ),

                'treasurer' =>
                    redirect()->route(
                        'diocesan.treasurer.dashboard'
                    ),

                'assistant_treasurer' =>
                    redirect()->route(
                        'diocesan.assistant-treasurer.dashboard'
                    ),

                'auditor' =>
                    redirect()->route(
                        'diocesan.auditor.dashboard'
                    ),

                'dbm' =>
                    redirect()->route(
                        'diocesan.board-member.dashboard'
                    ),

                default =>
                    $this->invalidOrganizationPosition(),
            };
        }


        /*
        |--------------------------------------------------------------------------
        | VICARIATE USERS
        |--------------------------------------------------------------------------
        */

        if ($user->organization_level === 'vicariate') {

            return match ($user->position) {

                'president' =>
                    redirect()->route(
                        'vicariate.president.dashboard'
                    ),

                'supervisor' =>
                    redirect()->route(
                        'vicariate.supervisor.dashboard'
                    ),

                default =>
                    $this->invalidOrganizationPosition(),
            };
        }


        /*
        |--------------------------------------------------------------------------
        | UNIT USERS
        |--------------------------------------------------------------------------
        */

        if ($user->organization_level === 'unit') {

            return match ($user->position) {

                'president' =>
                    redirect()->route(
                        'unit.president.dashboard'
                    ),

                'vice_president' =>
                    redirect()->route(
                        'unit.vice-president.dashboard'
                    ),

                'secretary' =>
                    redirect()->route(
                        'unit.secretary.dashboard'
                    ),

                'assistant_secretary' =>
                    redirect()->route(
                        'unit.assistant-secretary.dashboard'
                    ),

                'treasurer' =>
                    redirect()->route(
                        'unit.treasurer.dashboard'
                    ),

                'auditor' =>
                    redirect()->route(
                        'unit.auditor.dashboard'
                    ),

                'board_member' =>
                    redirect()->route(
                        'unit.board-member.dashboard'
                    ),

                'member' =>
                    redirect()->route(
                        'member.dashboard'
                    ),

                default =>
                    $this->invalidOrganizationPosition(),
            };
        }


        /*
        |--------------------------------------------------------------------------
        | INVALID ORGANIZATION
        |--------------------------------------------------------------------------
        */

        return $this->invalidOrganizationPosition();
    }


    /**
     * Handle invalid organizational information.
     */
    private function invalidOrganizationPosition(): RedirectResponse
    {
        Auth::guard('web')->logout();

        return redirect()
            ->route('login')
            ->withErrors([
                'email' =>
                    'Your account has an invalid organizational position. Please contact the administrator.',
            ]);
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