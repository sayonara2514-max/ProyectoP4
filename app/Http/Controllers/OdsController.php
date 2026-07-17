<?php
namespace App\Http\Controllers;
use App\Models\Ods;

class OdsController extends Controller {
public function index() {
    $ods = Ods::with('metas.indicadores')->withCount('metas')->get();
    $pdns = \App\Models\Pdn::all();
    return view('ods.index', compact('ods', 'pdns'));
}
    public function show(Ods $ods) {
        $ods->load('metas.indicadores');
        return view('ods.show', compact('ods'));
    }
}