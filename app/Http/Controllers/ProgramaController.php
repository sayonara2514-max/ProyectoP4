<?php
namespace App\Http\Controllers;
use App\Models\{Programa, Plan};
use Illuminate\Http\Request;

class ProgramaController extends Controller {
    public function index() { 
        return view('programas.index', ['programas' => Programa::with('plan')->get()]); 
    }
    public function create() { 
        return view('programas.create', ['planes' => Plan::all()]); 
    }
    public function store(Request $request) {
        $request->validate(['nombre' => 'required', 'plan_id' => 'required|exists:planes,id']);
        Programa::create($request->only('codigo','nombre','descripcion','responsable','observaciones','plan_id'));
        return redirect()->route('programas.index')->with('success', 'Programa creado.');
    }
    public function show(Programa $programa) { 
        return view('programas.show', compact('programa')); 
    }
    public function edit(Programa $programa) { 
        return view('programas.edit', ['programa' => $programa, 'planes' => Plan::all()]); 
    }
    public function update(Request $request, Programa $programa) {
        $request->validate(['nombre' => 'required', 'plan_id' => 'required|exists:planes,id']);
        $programa->update($request->only('codigo','nombre','descripcion','responsable','observaciones','plan_id'));
        return redirect()->route('programas.index')->with('success', 'Programa actualizado.');
    }
  public function destroy(Programa $programa) { 
    if ($programa->proyectos()->count() > 0) {
        return redirect()->route('programas.index')->with('error', 'No se puede eliminar un programa que tiene proyectos asociados.');
    }
    $programa->delete(); 
    return redirect()->route('programas.index')->with('success', 'Eliminado.'); 
}
}