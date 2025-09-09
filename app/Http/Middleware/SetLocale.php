<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next)
    {
        // Determine locale from route parameter, session, or default to 'en'
        $locale = $request->route('lang', Session::get('locale', 'en'));

        if (!in_array($locale, ['en', 'ar'])) {
            $locale = 'en';
        }

        // Set the application locale
        App::setLocale($locale);

        // Store locale in session for subsequent requests
        Session::put('locale', $locale);

        return $next($request);
    }
}
