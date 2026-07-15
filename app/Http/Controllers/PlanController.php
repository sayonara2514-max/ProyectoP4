<?php
namespace App\Http\Controllers;
use App\Models\{Plan, Entidad};
use Illuminate\Http\Request;

class PlanController extends Controller {
    public function index() { 
        return view('planes.index', ['planes' => Plan::with('entidad')->latest()->paginate(10)]); 
    }
    public function create() { 
        return view('planes.create', ['entidades' => Entidad::all()]); 
    }
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'periodo_inicio' => 'required|date',
            'periodo_fin' => 'required|date|after:periodo_inicio',
            'entidad_id' => 'required|exists:entidads,id'
        ]);
        $data = $request->only('nombre','periodo_inicio','periodo_fin','entidad_id');
        $data['estado'] = 'formulado';
        Plan::create($data);
        return redirect()->route('planes.index')->with('success', 'Plan creado en estado Formulado.');
    }
    public function show(Plan $plan) { 
        return view('planes.show', ['plan' => $plan->load('entidad','programas','objetivosEstrategicos')]); 
    }
    public function edit(Plan $plan) { 
        if ($plan->estado === 'aprobado' && auth()->user()->rol?->nombre !== 'Autoridad Validante') {
            return redirect()->route('planes.index')->with('error', 'Solo la Autoridad Validante puede editar planes aprobados.');
        }
        return view('planes.edit', ['plan' => $plan, 'entidades' => Entidad::all()]); 
    }
    public function update(Request $request, Plan $plan) {
        $request->validate([
            'nombre' => 'required',
            'periodo_inicio' => 'required|date',
            'periodo_fin' => 'required|date|after:periodo_inicio',
            'entidad_id' => 'required|exists:entidads,id'
        ]);
        $plan->update($request->only('nombre','periodo_inicio','periodo_fin','entidad_id'));
        return redirect()->route('planes.index')->with('success', 'Plan actualizado.');
    }
    public function destroy(Plan $plan) { 
        $plan->delete(); 
        return redirect()->route('planes.index')->with('success', 'Eliminado.'); 
    }
    public function enviarRevision(Plan $plan) {
        if ($plan->estado !== 'formulado') {
            return redirect()->route('planes.index')->with('error', 'Solo planes en estado Formulado pueden enviarse a revisión.');
        }
        $plan->update(['estado' => 'en_revision']);
        return redirect()->route('planes.index')->with('success', 'Plan enviado a revisión.');
    }
    public function aprobar(Plan $plan) {
        if ($plan->estado !== 'en_revision') {
            return redirect()->route('planes.index')->with('error', 'Solo planes En Revisión pueden ser aprobados.');
        }
        $plan->update(['estado' => 'aprobado']);
        return redirect()->route('planes.index')->with('success', 'Plan aprobado.');
    }
    public function devolver(Plan $plan) {
        $plan->update(['estado' => 'formulado']);
        return redirect()->route('planes.index')->with('success', 'Plan devuelto a Formulado para correcciones.');
    }
}