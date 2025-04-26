<?php

namespace App\Http\Middleware;

use App\Models\Chatroom;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TeamCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Middleware para comprobar si un usuario puede acceder a una chatroom relacionada con un equipo
        $chatroom = Chatroom::findOrFail($request->chatroom);

        //Si la chatroom no tiene equipo ok
        if($chatroom->team_id == null) return $next($request);
        //si es admin ok
        $user = Auth::user();
        if($user->role == 'admin') return $next($request);
        //si tiene equipo, comprobar que el usuario pertenece a ese equipo

        if($user->team->id == $chatroom->team_id) return $next($request);

        return response()->json(['msg' => 'Access forbidden'], 403);
    }
}
