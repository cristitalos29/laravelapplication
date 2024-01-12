<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user has the "admin" role
        if ($request->user() && $request->user()->hasRole('admin')) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        abort(403, 'Unauthorized action.');
