<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller {
    public function index() {
        $usuarios = User::with('rol')->get();
        return view('usuarios.index', compact('usuarios'));
    }
    public function create() {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'rol_id' => 'required|exists:rols,id',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id,
        ]);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
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