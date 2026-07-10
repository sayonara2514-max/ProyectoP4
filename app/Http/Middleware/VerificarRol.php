<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class VerificarRol {
    public function handle(Request $request, Closure $next, ...$roles): mixed {
        $user = $request->user();
        if (!$user) {
            return redirect('/login');
        }
        // Administrador tiene acceso a todo
        if ($user->rol?->nombre === 'Administrador') {
            return $next($request);
        }
        // Sin rol o rol no permitido
        if (empty($roles) || !$user->rol || !in_array($user->rol->nombre, $roles)) {
            abort(403, 'Acceso no autorizado');
        }
        return $next($request);
    }
}