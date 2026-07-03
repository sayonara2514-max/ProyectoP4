<?php
namespace App\Http\Controllers;
use App\Models\{ObjetivoEstrategico, Plan, Ods, Pdn};
use Illuminate\Http\Request;

class ObjetivoEstrategicoController extends Controller {
    public function index() { return view('objetivos.index', ['objetivos' => ObjetivoEstrategico::with('plan')->get()]); }
    public function create() { return view('objetivos.create', ['planes' => Plan::all(), 'ods' => Ods::all(), 'pdns' => Pdn::all()]); }
    public function store(Request $request) {
        $request->validate(['codigo' => 'required', 'descripcion' => 'required', 'plan_id' => 'required|exists:plans,id']);
        $objetivo = ObjetivoEstrategico::create($request->only('codigo','descripcion','plan_id'));
        if ($request->ods_ids) $objetivo->ods()->sync($request->ods_ids);
        if ($request->pdn_ids) $objetivo->pdns()->sync($request->pdn_ids);
        return redirect()->route('objetivos.index')->with('success', 'Objetivo creado.');
    }
    public function show(ObjetivoEstrategico $objetivo) { return view('objetivos.show', ['objetivo' => $objetivo->load('plan','ods','pdns')]); }
    public function edit(ObjetivoEstrategico $objetivo) { return view('objetivos.edit', ['objetivo' => $objetivo, 'planes' => Plan::all(), 'ods' => Ods::all(), 'pdns' => Pdn::all()]); }
    public function update(Request $request, ObjetivoEstrategico $objetivo) {
        $request->validate(['codigo' => 'required', 'descripcion' => 'required', 'plan_id' => 'required|exists:plans,id']);
        $objetivo->update($request->only('codigo','descripcion','plan_id'));
        $objetivo->ods()->sync($request->ods_ids ?? []);
        $objetivo->pdns()->sync($request->pdn_ids ?? []);
        return redirect()->route('objetivos.index')->with('success', 'Objetivo actualizado.');
    }
    public function destroy(ObjetivoEstrategico $objetivo) { $objetivo->delete(); return redirect()->route('objetivos.index')->with('success', 'Eliminado.'); }
}