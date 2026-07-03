<?php
namespace App\Http\Controllers;
use App\Models\{Proyecto, Programa};
use Illuminate\Http\Request;

class ProyectoController extends Controller {
    public function index() {
        $proyectos = Proyecto::with('programa')->latest()->paginate(10);
        return view('proyectos.index', compact('proyectos'));
    }
    public function create() {
        $programas = Programa::all();
        return view('proyectos.create', compact('programas'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'nombre'       => 'required|string|max:255',
            'presupuesto'  => 'required|numeric|min:0',
            'fecha_inicio' => 'required|date',
            'fecha_fin'    => 'required|date|after:fecha_inicio',
            'estado'       => 'required|in:formulacion,ejecucion,cerrado',
            'programa_id'  => 'required|exists:programas,id',
        ]);
        Proyecto::create($data);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente.');
    }
    public function show(Proyecto $proyecto) {
        $proyecto->load('programa', 'metas.indicadores');
        return view('proyectos.show', compact('proyecto'));
    }
    public function edit(Proyecto $proyecto) {
        $programas = Programa::all();
        return view('proyectos.edit', compact('proyecto', 'programas'));
    }
    public function update(Request $request, Proyecto $proyecto) {
        $data = $request->validate([
            'nombre'       => 'required|string|max:255',
            'presupuesto'  => 'required|numeric|min:0',
            'fecha_inicio' => 'required|date',
            'fecha_fin'    => 'required|date|after:fecha_inicio',
            'estado'       => 'required|in:formulacion,ejecucion,cerrado',
            'programa_id'  => 'required|exists:programas,id',
        ]);
        $proyecto->update($data);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado.');
    }
    public function destroy(Proyecto $proyecto) {
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado.');
    }
}