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
            'programa_id'  => 'required|exists:programas,id',
        ]);
        $data['estado'] = 'formulado';
        Proyecto::create($data);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado en estado Formulado.');
    }
    public function show(Proyecto $proyecto) {
        $proyecto->load('programa', 'metas.indicadores');
        return view('proyectos.show', compact('proyecto'));
    }
    public function edit(Proyecto $proyecto) {
        if ($proyecto->estado !== 'formulado' && auth()->user()->rol?->nombre !== 'Administrador') {
            return redirect()->route('proyectos.index')->with('error', 'Solo se pueden editar proyectos en estado Formulado.');
        }
        $programas = Programa::all();
        return view('proyectos.edit', compact('proyecto', 'programas'));
    }
    public function update(Request $request, Proyecto $proyecto) {
        $data = $request->validate([
            'nombre'       => 'required|string|max:255',
            'presupuesto'  => 'required|numeric|min:0',
            'fecha_inicio' => 'required|date',
            'fecha_fin'    => 'required|date|after:fecha_inicio',
            'programa_id'  => 'required|exists:programas,id',
        ]);
        $proyecto->update($data);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado.');
    }
    public function destroy(Proyecto $proyecto) {
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado.');
    }
    public function enviarRevision(Proyecto $proyecto) {
        if ($proyecto->estado !== 'formulado') {
            return redirect()->route('proyectos.index')->with('error', 'Solo proyectos Formulados pueden enviarse a revision.');
        }
        $proyecto->update(['estado' => 'en_revision']);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto enviado a revision.');
    }
    public function validar(Proyecto $proyecto) {
        if ($proyecto->estado !== 'en_revision') {
            return redirect()->route('proyectos.index')->with('error', 'Solo proyectos En Revision pueden validarse.');
        }
        $proyecto->update(['estado' => 'validado']);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto validado y enviado a Autoridad Validante.');
    }
    public function aprobar(Proyecto $proyecto) {
        if ($proyecto->estado !== 'validado') {
            return redirect()->route('proyectos.index')->with('error', 'Solo proyectos Validados pueden aprobarse.');
        }
        $proyecto->update(['estado' => 'aprobado']);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto aprobado.');
    }
public function devolver(Request $request, Proyecto $proyecto) {
    if ($proyecto->estado === 'en_revision') {
        $proyecto->update([
            'estado' => 'formulado',
            'observacion' => $request->observacion
        ]);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto devuelto con observaciones.');
    }
    if ($proyecto->estado === 'validado') {
        $proyecto->update([
            'estado' => 'en_revision',
            'observacion' => $request->observacion
        ]);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto devuelto a En Revision.');
    }
    return redirect()->route('proyectos.index')->with('error', 'No se puede devolver este proyecto.');
}
}