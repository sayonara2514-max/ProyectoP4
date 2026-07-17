<?php
namespace App\Http\Controllers;
use App\Models\{Plan, Proyecto, ObjetivoEstrategico, Ods, Entidad, Auditoria};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReporteController extends Controller {

    public function index() {
        $entidades = Entidad::all();
        return view('reportes.index', compact('entidades'));
    }

    // PLANES
    public function planespdf(Request $request) {
        $query = Plan::with('entidad');
        if ($request->entidad_id) $query->where('entidad_id', $request->entidad_id);
        if ($request->estado) $query->where('estado', $request->estado);
        $planes = $query->get();
        $pdf = Pdf::loadView('reportes.planes_pdf', compact('planes'))->setPaper('a4', 'landscape');
        return $pdf->download('reporte_planes.pdf');
    }
    public function planescsv(Request $request) {
        $query = Plan::with('entidad');
        if ($request->entidad_id) $query->where('entidad_id', $request->entidad_id);
        if ($request->estado) $query->where('estado', $request->estado);
        $planes = $query->get();
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=reporte_planes.csv'];
        $callback = function() use ($planes) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Codigo','Nombre','Entidad','Periodo Inicio','Periodo Fin','Estado']);
            foreach ($planes as $p) {
                fputcsv($file, [$p->codigo, $p->nombre, $p->entidad->nombre ?? 'N/A', $p->periodo_inicio, $p->periodo_fin, $p->estado]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    // PROYECTOS
    public function proyectospdf(Request $request) {
        $query = Proyecto::with('programa');
        if ($request->estado) $query->where('estado', $request->estado);
        if ($request->tipo) $query->where('tipo', $request->tipo);
        $proyectos = $query->get();
        $pdf = Pdf::loadView('reportes.proyectos_pdf', compact('proyectos'))->setPaper('a4', 'landscape');
        return $pdf->download('reporte_proyectos.pdf');
    }
    public function proyectoscsv(Request $request) {
        $query = Proyecto::with('programa');
        if ($request->estado) $query->where('estado', $request->estado);
        if ($request->tipo) $query->where('tipo', $request->tipo);
        $proyectos = $query->get();
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=reporte_proyectos.csv'];
        $callback = function() use ($proyectos) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Codigo','Nombre','Programa','Tipo','Presupuesto','Ejecutado','Inicio','Fin','Estado']);
            foreach ($proyectos as $p) {
                fputcsv($file, [$p->codigo, $p->nombre, $p->programa->nombre ?? 'N/A', $p->tipo, $p->presupuesto, $p->presupuesto_ejecutado, $p->fecha_inicio, $p->fecha_fin, $p->estado]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    // OBJETIVOS
    public function objetivospdf(Request $request) {
        $query = ObjetivoEstrategico::with('entidad');
        if ($request->entidad_id) $query->where('entidad_id', $request->entidad_id);
        if ($request->estado) $query->where('estado', $request->estado);
        $objetivos = $query->get();
        $pdf = Pdf::loadView('reportes.objetivos_pdf', compact('objetivos'));
        return $pdf->download('reporte_objetivos.pdf');
    }
    public function objetivoscsv(Request $request) {
        $query = ObjetivoEstrategico::with('entidad');
        if ($request->entidad_id) $query->where('entidad_id', $request->entidad_id);
        if ($request->estado) $query->where('estado', $request->estado);
        $objetivos = $query->get();
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=reporte_objetivos.csv'];
        $callback = function() use ($objetivos) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Codigo','Descripcion','Entidad','Estado','Fecha Registro']);
            foreach ($objetivos as $o) {
                fputcsv($file, [$o->codigo, $o->descripcion, $o->entidad->nombre ?? 'N/A', $o->estado, $o->fecha_registro]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    // ODS
    public function odspdf() {
        $ods = Ods::with('metas.indicadores')->get();
        $pdf = Pdf::loadView('reportes.ods_pdf', compact('ods'));
        return $pdf->download('reporte_ods.pdf');
    }
    public function odscsv() {
        $ods = Ods::with('metas')->get();
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=reporte_ods.csv'];
        $callback = function() use ($ods) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Codigo ODS','Nombre ODS','Codigo Meta','Descripcion Meta']);
            foreach ($ods as $o) {
                foreach ($o->metas as $meta) {
                    fputcsv($file, [$o->codigo, $o->nombre, $meta->codigo, $meta->descripcion]);
                }
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    // AUDITORIA
    public function auditoriapdf(Request $request) {
        $query = Auditoria::with('usuario');
        if ($request->modulo) $query->where('modulo', $request->modulo);
        if ($request->accion) $query->where('accion', $request->accion);
        $auditorias = $query->latest('fecha_hora')->get();
        $pdf = Pdf::loadView('reportes.auditoria_pdf', compact('auditorias'));
        return $pdf->download('reporte_auditoria.pdf');
    }
    public function auditoriacsv(Request $request) {
        $query = Auditoria::with('usuario');
        if ($request->modulo) $query->where('modulo', $request->modulo);
        if ($request->accion) $query->where('accion', $request->accion);
        $auditorias = $query->latest('fecha_hora')->get();
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=reporte_auditoria.csv'];
        $callback = function() use ($auditorias) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Fecha/Hora','Usuario','Modulo','Accion']);
            foreach ($auditorias as $a) {
                fputcsv($file, [$a->fecha_hora, $a->usuario->name ?? 'N/A', $a->modulo, $a->accion]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    // ENTIDADES
    public function entidadespdf(Request $request) {
        $query = Entidad::query();
        if ($request->nivel_gobierno) $query->where('nivel_gobierno', $request->nivel_gobierno);
        if ($request->estado) $query->where('estado', $request->estado);
        $entidades = $query->get();
        $pdf = Pdf::loadView('reportes.entidades_pdf', compact('entidades'));
        return $pdf->download('reporte_entidades.pdf');
    }
    public function entidadescsv(Request $request) {
        $query = Entidad::query();
        if ($request->nivel_gobierno) $query->where('nivel_gobierno', $request->nivel_gobierno);
        if ($request->estado) $query->where('estado', $request->estado);
        $entidades = $query->get();
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=reporte_entidades.csv'];
        $callback = function() use ($entidades) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Codigo','Nombre','Sector','Subsector','Nivel Gobierno','Estado']);
            foreach ($entidades as $e) {
                fputcsv($file, [$e->codigo, $e->nombre, $e->sector, $e->subsector, $e->nivel_gobierno, $e->estado]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}