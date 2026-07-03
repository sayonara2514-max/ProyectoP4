<?php
namespace App\Http\Controllers;
use App\Models\Entidad;
use Illuminate\Http\Request;

class EntidadController extends Controller {
    public function index() { return view('entidades.index', ['entidades' => Entidad::all()]); }
    public function create() { return view('entidades.create'); }
    public function store(Request $request) {
        $request->validate(['nombre' => 'required', 'mision' => 'nullable', 'estructura' => 'nullable']);
        Entidad::create($request->only('nombre', 'mision', 'estructura'));
        return redirect()->route('entidades.index')->with('success', 'Entidad creada.');
    }
    public function show(Entidad $entidad) { return view('entidades.show', compact('entidad')); }
    public function edit(Entidad $entidad) { return view('entidades.edit', compact('entidad')); }
    public function update(Request $request, Entidad $entidad) {
        $request->validate(['nombre' => 'required', 'mision' => 'nullable', 'estructura' => 'nullable']);
        $entidad->update($request->only('nombre', 'mision', 'estructura'));
        return redirect()->route('entidades.index')->with('success', 'Entidad actualizada.');
    }
    public function destroy(Entidad $entidad) { $entidad->delete(); return redirect()->route('entidades.index')->with('success', 'Eliminada.'); }
}