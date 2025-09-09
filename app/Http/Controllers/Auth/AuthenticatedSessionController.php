<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
        public function create(): View|RedirectResponse
    {
        // If the user is already authenticated, redirect to the dashboard
        if (Auth::check()) {
            $lang = session('locale', app()->getLocale());
            return redirect()->route('dashboard', ['lang' => $lang]);
        }

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $lang = session('locale', app()->getLocale());
        return redirect()->intended(route('dashboard', ['lang' => $lang]));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $lang = Session::get('locale', 'en');

        return redirect()->route('home', ['lang' => $lang]);
    }
}
