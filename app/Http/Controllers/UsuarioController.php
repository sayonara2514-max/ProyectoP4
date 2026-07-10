<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;

class UsuarioController extends Controller {
    public function index() {
        $usuarios = User::with('rol')->get();
        return view('usuarios.index', compact('usuarios'));
    }
    public function edit(User $usuario) {
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }
    public function update(Request $request, User $usuario) {
        $request->validate(['rol_id' => 'nullable|exists:rols,id']);
        $usuario->update(['rol_id' => $request->rol_id]);
        return redirect()->route('usuarios.index')->with('success', 'Rol asignado correctamente.');
    }
}