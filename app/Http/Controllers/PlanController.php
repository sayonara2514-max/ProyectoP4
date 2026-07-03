<?php
namespace App\Http\Controllers;
use App\Models\{Plan, Entidad};
use Illuminate\Http\Request;

class PlanController extends Controller {
    public function index() { return view('planes.index', ['planes' => Plan::with('entidad')->latest()->paginate(10)]); }
    public function create() { return view('planes.create', ['entidades' => Entidad::all()]); }
    public function store(Request $request) {
        $request->validate(['nombre' => 'required', 'periodo_inicio' => 'required|date', 'periodo_fin' => 'required|date|after:periodo_inicio', 'estado' => 'required|in:borrador,activo,cerrado', 'entidad_id' => 'required|exists:entidads,id']);
        Plan::create($request->only('nombre','periodo_inicio','periodo_fin','estado','entidad_id'));
        return redirect()->route('planes.index')->with('success', 'Plan creado.');
    }
    public function show(Plan $plan) { return view('planes.show', ['plan' => $plan->load('entidad','programas','objetivosEstrategicos')]); }
    public function edit(Plan $plan) { return view('planes.edit', ['plan' => $plan, 'entidades' => Entidad::all()]); }
    public function update(Request $request, Plan $plan) {
        $request->validate(['nombre' => 'required', 'periodo_inicio' => 'required|date', 'periodo_fin' => 'required|date|after:periodo_inicio', 'estado' => 'required|in:borrador,activo,cerrado', 'entidad_id' => 'required|exists:entidads,id']);
        $plan->update($request->only('nombre','periodo_inicio','periodo_fin','estado','entidad_id'));
        return redirect()->route('planes.index')->with('success', 'Plan actualizado.');
    }
    public function destroy(Plan $plan) { $plan->delete(); return redirect()->route('planes.index')->with('success', 'Eliminado.'); }
}