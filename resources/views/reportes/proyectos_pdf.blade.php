<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Proyectos</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        h1 { color: #1e3a5f; font-size: 16px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th { background-color: #1e3a5f; color: white; padding: 6px; text-align: left; font-size: 10px; }
        td { padding: 5px 6px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <h1>Sistema Integrado de Planificacion e Inversion Publica - SNP</h1>
    <h2>Reporte de Proyectos de Inversion</h2>
    <p>Fecha: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Programa</th>
                <th>Presupuesto</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $p)
            <tr>
                <td>{{ $p->nombre }}</td>
                <td>{{ $p->programa->nombre ?? 'N/A' }}</td>
                <td>$ {{ number_format($p->presupuesto, 2) }}</td>
                <td>{{ $p->fecha_inicio }}</td>
                <td>{{ $p->fecha_fin }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $p->estado)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p style="margin-top:15px; color:#666;">Total: {{ $proyectos->count() }} proyectos | Presupuesto total: $ {{ number_format($proyectos->sum('presupuesto'), 2) }}</p>
</body>
</html>
