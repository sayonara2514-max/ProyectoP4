<?php
namespace App\Http\Controllers;
use App\Models\Ods;

class OdsController extends Controller {
    public function index() {
        $ods = Ods::withCount('metas')->get();
        return view('ods.index', compact('ods'));
    }
    public function show(Ods $ods) {
        $ods->load('metas.indicadores');
        return view('ods.show', compact('ods'));
    }
}