<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDevelopmentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user has authenticated for development access
        if (!session()->has('dev_access_authenticated') || session('dev_access_authenticated') !== true) {
            return redirect()->route('admin.development.login')
                ->with('error', __('translate.Please enter development password to access this section'));
        }

        return $next($request);
    }
}
