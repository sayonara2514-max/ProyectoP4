<?php
namespace App\Http\Controllers;
use App\Models\{Indicador, Meta};
use Illuminate\Http\Request;

class IndicadorController extends Controller {
    public function index() { return view('indicadores.index', ['indicadores' => Indicador::with('meta')->get()]); }
    public function create() { return view('indicadores.create', ['metas' => Meta::all()]); }
    public function store(Request $request) {
        $request->validate(['nombre' => 'required', 'formula' => 'nullable', 'unidad_medida' => 'nullable', 'meta_id' => 'required|exists:metas,id']);
        Indicador::create($request->only('nombre','formula','unidad_medida','meta_id'));
        return redirect()->route('indicadores.index')->with('success', 'Indicador creado.');
    }
    public function show(Indicador $indicador) { return view('indicadores.show', compact('indicador')); }
    public function edit(Indicador $indicador) { return view('indicadores.edit', ['indicador' => $indicador, 'metas' => Meta::all()]); }
    public function update(Request $request, Indicador $indicador) {
        $request->validate(['nombre' => 'required', 'formula' => 'nullable', 'unidad_medida' => 'nullable', 'meta_id' => 'required|exists:metas,id']);
        $indicador->update($request->only('nombre','formula','unidad_medida','meta_id'));
        return redirect()->route('indicadores.index')->with('success', 'Indicador actualizado.');
    }
    public function destroy(Indicador $indicador) { $indicador->delete(); return redirect()->route('indicadores.index')->with('success', 'Eliminado.'); }
}