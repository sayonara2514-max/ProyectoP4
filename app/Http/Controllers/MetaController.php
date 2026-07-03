<?php
namespace App\Http\Controllers;
use App\Models\{Meta, Proyecto};
use Illuminate\Http\Request;

class MetaController extends Controller {
    public function index() { return view('metas.index', ['metas' => Meta::with('proyecto')->get()]); }
    public function create() { return view('metas.create', ['proyectos' => Proyecto::all()]); }
    public function store(Request $request) {
        $request->validate(['descripcion' => 'required', 'valor_objetivo' => 'required|numeric', 'periodo' => 'required', 'proyecto_id' => 'required|exists:proyectos,id']);
        Meta::create($request->only('descripcion','valor_objetivo','periodo','proyecto_id'));
        return redirect()->route('metas.index')->with('success', 'Meta creada.');
    }
    public function show(Meta $meta) { return view('metas.show', compact('meta')); }
    public function edit(Meta $meta) { return view('metas.edit', ['meta' => $meta, 'proyectos' => Proyecto::all()]); }
    public function update(Request $request, Meta $meta) {
        $request->validate(['descripcion' => 'required', 'valor_objetivo' => 'required|numeric', 'periodo' => 'required', 'proyecto_id' => 'required|exists:proyectos,id']);
        $meta->update($request->only('descripcion','valor_objetivo','periodo','proyecto_id'));
        return redirect()->route('metas.index')->with('success', 'Meta actualizada.');
    }
    public function destroy(Meta $meta) { $meta->delete(); return redirect()->route('metas.index')->with('success', 'Eliminada.'); }
}