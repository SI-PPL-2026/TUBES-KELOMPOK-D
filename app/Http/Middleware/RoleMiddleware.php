<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        if (!in_array($request->user()->role, $roles, true)) {
            if ($request->user()->role === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('info', 'Anda masuk sebagai Admin Pengurus.');
            }

            return redirect()->route('home')
                ->with('info', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        return $next($request);
    }
}
