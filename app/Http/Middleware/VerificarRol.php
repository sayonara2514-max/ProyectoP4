<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class VerificarRol {
    public function handle(Request $request, Closure $next, ...$roles): mixed {
        $user = $request->user();
        if (!$user || !in_array($user->rol?->nombre, $roles)) {
            abort(403, 'Acceso no autorizado');
        }
        return $next($request);
    }
}