<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectAfterLogin
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->isMethod('post') && $request->is('admin/*')) {
            $redirectTo = $this->redirectTo($request);
            return redirect($redirectTo);
        }

        return $response;
    }

    protected function redirectTo(Request $request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login.form');
            }
            return route('login'); // Default user login
        }
    }
}

