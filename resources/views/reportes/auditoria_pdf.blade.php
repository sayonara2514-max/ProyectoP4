<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte Auditoria</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; }
        h1 { color: #1e3a5f; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #1e3a5f; color: white; padding: 5px; text-align: left; }
        td { padding: 4px 5px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <h1>SIPeIP - Secretaria Nacional de Planificacion</h1>
    <h2>Reporte de Auditoria y Trazabilidad</h2>
    <p>Fecha: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <thead><tr><th>Fecha/Hora</th><th>Usuario</th><th>Modulo</th><th>Accion</th></tr></thead>
        <tbody>
        @foreach($auditorias as $a)
        <tr>
            <td>{{ $a->fecha_hora }}</td>
            <td>{{ $a->usuario->name ?? 'N/A' }}</td>
            <td>{{ $a->modulo }}</td>
            <td>{{ $a->accion }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <p style="margin-top:10px; color:#666;">Total registros: {{ $auditorias->count() }}</p>
</body>
</html>
