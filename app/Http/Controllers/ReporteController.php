<?php
namespace App\Http\Controllers;
use App\Models\{Plan, Proyecto, ObjetivoEstrategico, Ods};
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller {
    public function index() { return view('reportes.index'); }

    public function planespdf() {
        $planes = Plan::with('entidad')->get();
        $pdf = Pdf::loadView('reportes.planes_pdf', compact('planes'))->setPaper('a4', 'landscape');
        return $pdf->download('reporte_planes.pdf');
    }
    public function planescsv() {
        $planes = Plan::with('entidad')->get();
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=reporte_planes.csv'];
        $callback = function() use ($planes) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Nombre', 'Entidad', 'Periodo Inicio', 'Periodo Fin', 'Estado']);
            foreach ($planes as $p) {
                fputcsv($file, [$p->nombre, $p->entidad->nombre ?? 'N/A', $p->periodo_inicio, $p->periodo_fin, $p->estado]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function proyectospdf() {
        $proyectos = Proyecto::with('programa')->get();
        $pdf = Pdf::loadView('reportes.proyectos_pdf', compact('proyectos'))->setPaper('a4', 'landscape');
        return $pdf->download('reporte_proyectos.pdf');
    }
    public function proyectoscsv() {
        $proyectos = Proyecto::with('programa')->get();
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=reporte_proyectos.csv'];
        $callback = function() use ($proyectos) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Nombre', 'Programa', 'Presupuesto', 'Fecha Inicio', 'Fecha Fin', 'Estado']);
            foreach ($proyectos as $p) {
                fputcsv($file, [$p->nombre, $p->programa->nombre ?? 'N/A', $p->presupuesto, $p->fecha_inicio, $p->fecha_fin, $p->estado]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function objetivospdf() {
        $objetivos = ObjetivoEstrategico::with('plan', 'ods', 'pdns')->get();
        $pdf = Pdf::loadView('reportes.objetivos_pdf', compact('objetivos'));
        return $pdf->download('reporte_objetivos.pdf');
    }
    public function objetivoscsv() {
        $objetivos = ObjetivoEstrategico::with('plan', 'ods', 'pdns')->get();
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=reporte_objetivos.csv'];
        $callback = function() use ($objetivos) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Codigo', 'Descripcion', 'Plan', 'ODS', 'PDN']);
            foreach ($objetivos as $o) {
                fputcsv($file, [
                    $o->codigo, $o->descripcion,
                    $o->plan->nombre ?? 'N/A',
                    $o->ods->pluck('codigo')->join(', '),
                    $o->pdns->pluck('codigo')->join(', ')
                ]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

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
            fputcsv($file, ['Codigo ODS', 'Nombre ODS', 'Codigo Meta', 'Descripcion Meta']);
            foreach ($ods as $o) {
                foreach ($o->metas as $meta) {
                    fputcsv($file, [$o->codigo, $o->nombre, $meta->codigo, $meta->descripcion]);
                }
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}