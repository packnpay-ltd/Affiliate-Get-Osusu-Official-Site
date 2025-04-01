<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an admin
        if (auth()->check()) {
            if (!auth()->user()->is_admin) {
                // Log out non-admin users
                Auth::logout();
                // Redirect to a non-admin route (like home or dashboard)
                return redirect('/login');
            }
        }

        // Allow admin users to proceed
        return $next($request);
    }
}
