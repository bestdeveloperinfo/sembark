<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Expected usage: ->middleware('role:Admin') or ->middleware('role:Sales|Manager')
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (! $request->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $rolesArr = explode('|', $roles);

        foreach ($rolesArr as $r) {
            if ($request->user()->hasRole($r)) {
                return $next($request);
            }
        }

        return response()->json(['message' => 'Forbidden - insufficient role'], 403);
    }
}
