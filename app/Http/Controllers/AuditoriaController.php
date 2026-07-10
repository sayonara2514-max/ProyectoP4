<?php
namespace App\Http\Controllers;
use App\Models\Auditoria;
use Illuminate\Http\Request;

class AuditoriaController extends Controller {
    public function index(Request $request) {
        $query = Auditoria::with('usuario')->latest('fecha_hora');
        if ($request->modulo) $query->where('modulo', $request->modulo);
        if ($request->accion) $query->where('accion', $request->accion);
        $auditorias = $query->paginate(20);
        return view('auditorias.index', compact('auditorias'));
    }
    public function show(Auditoria $auditoria) { 
        return view('auditorias.show', compact('auditoria')); 
    }
}