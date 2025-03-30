<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(empty($roles) || count($roles) == 0) {
            return $next($request);
        }
        if(!in_array($request->user()->role, $roles)) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}
