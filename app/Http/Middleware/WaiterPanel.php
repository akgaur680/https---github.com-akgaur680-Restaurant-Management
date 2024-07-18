<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WaiterPanel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!(Auth::user()['role'] == 'waiter')) {
            // User is not an admin, redirect back with error
            return redirect()->back()->with('error', 'You Want to redirect the page to Other Section.');
            
        }
        return $next($request);
    }
}
