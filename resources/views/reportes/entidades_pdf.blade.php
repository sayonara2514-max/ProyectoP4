<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte Entidades</title>
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
    <h2>Reporte de Entidades Institucionales</h2>
    <p>Fecha: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <thead><tr><th>Codigo</th><th>Nombre</th><th>Sector</th><th>Subsector</th><th>Nivel</th><th>Estado</th></tr></thead>
        <tbody>
        @foreach($entidades as $e)
        <tr>
            <td>{{ $e->codigo ?? '-' }}</td>
            <td>{{ $e->nombre }}</td>
            <td>{{ $e->sector ?? '-' }}</td>
            <td>{{ $e->subsector ?? '-' }}</td>
            <td>{{ $e->nivel_gobierno }}</td>
            <td>{{ $e->estado }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <p style="margin-top:10px; color:#666;">Total: {{ $entidades->count() }} entidades</p>
</body>
</html>
