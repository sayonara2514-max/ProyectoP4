<?php
namespace App\Http\Controllers;
use App\Models\{ObjetivoEstrategico, Entidad};
use Illuminate\Http\Request;

class ObjetivoEstrategicoController extends Controller {
    public function index() { 
        return view('objetivos.index', ['objetivos' => ObjetivoEstrategico::with('entidad')->get()]); 
    }
    public function create() { 
        return view('objetivos.create', ['entidades' => Entidad::all()]); 
    }
    public function store(Request $request) {
        $request->validate(['codigo' => 'required', 'descripcion' => 'required', 'entidad_id' => 'required|exists:entidads,id']);
        ObjetivoEstrategico::create($request->only('codigo','descripcion','entidad_id','estado','fecha_registro'));
        return redirect()->route('objetivos.index')->with('success', 'Objetivo creado.');
    }
    public function show(ObjetivoEstrategico $objetivo) { 
        $objetivo->load('entidad','planes');
        return view('objetivos.show', compact('objetivo')); 
    }
    public function edit(ObjetivoEstrategico $objetivo) { 
        return view('objetivos.edit', ['objetivo' => $objetivo, 'entidades' => Entidad::all()]); 
    }
    public function update(Request $request, ObjetivoEstrategico $objetivo) {
        $request->validate(['codigo' => 'required', 'descripcion' => 'required', 'entidad_id' => 'required|exists:entidads,id']);
        $objetivo->update($request->only('codigo','descripcion','entidad_id','estado','fecha_registro'));
        return redirect()->route('objetivos.index')->with('success', 'Objetivo actualizado.');
    }
    public function destroy(ObjetivoEstrategico $objetivo) { 
        $objetivo->delete(); 
        return redirect()->route('objetivos.index')->with('success', 'Eliminado.'); 
    }
}