<?php
namespace App\Http\Controllers;
use App\Models\Auditoria;

class AuditoriaController extends Controller {
    public function index() { return view('auditorias.index', ['auditorias' => Auditoria::with('usuario')->latest('fecha_hora')->paginate(20)]); }
    public function show(Auditoria $auditoria) { return view('auditorias.show', compact('auditoria')); }
}