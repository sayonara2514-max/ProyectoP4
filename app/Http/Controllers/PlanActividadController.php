<?php
namespace App\Http\Controllers;
use App\Models\{PlanActividad, Plan};
use Illuminate\Http\Request;

class PlanActividadController extends Controller {
    public function index($id) {
    $plan = \App\Models\Plan::findOrFail($id);
    $plan->load('actividades');
    return view('planes.actividades', compact('plan'));
}

public function store(Request $request, $id) {
    $plan = \App\Models\Plan::findOrFail($id);
    $request->validate(['nombre' => 'required']);
    PlanActividad::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'responsable' => $request->responsable,
        'fecha_inicio' => $request->fecha_inicio,
        'fecha_fin' => $request->fecha_fin,
        'plan_id' => $plan->id,
    ]);
    return redirect()->route('planes.actividades.index', $plan->id)->with('success', 'Actividad agregada.');
}
    public function destroy(PlanActividad $actividad) {
        $plan_id = $actividad->plan_id;
        $actividad->delete();
        return redirect()->route('planes.actividades.index', $plan_id)->with('success', 'Actividad eliminada.');
    }
}