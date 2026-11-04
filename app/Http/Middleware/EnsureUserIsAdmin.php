<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403, 'Access denied.');
        }

        if (
            $user->is_admin ||
            (method_exists($user, 'hasAnyRole') && $user->hasAnyRole(['super-admin', 'admin', 'editor', 'author', 'viewer'])) ||
            $user->can('dashboard.view')
        ) {
            return $next($request);
        }

        abort(403, 'Access denied.');
    }
}
