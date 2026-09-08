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

        $user = Auth::user();

    if ($user->hasRole('User')) {
        return redirect()->route('requester.dashboard');
    }
    if ($user->hasRole('Manager IT')) {
        return redirect()->route('managerit.dashboard');
    }
    if ($user->hasRole('Supervisor')) {
        return redirect()->route('supervisor.dashboard');
    }

   if ($user->hasRole(['Admin',  ])) {
    return redirect()->route('admin.dashboard');
    }

   if ($user->hasRole(['Super Admin'])) {
    return redirect()->route('superadmin.dashboard');
    }
    
    if ($user->hasRole('Helpdesk')) {
        return redirect()->route('helpdesk.dashboard');
    }

    if ($user->hasRole('IT Support')) {
        return redirect()->route('itsupport.dashboard');
    }

        return redirect()->intended(route('dashboard', absolute: false));
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
