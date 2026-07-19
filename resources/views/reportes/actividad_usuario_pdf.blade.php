<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte Actividad por Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; }
        h1 { color: #1e3a5f; font-size: 14px; }
        h2 { font-size: 12px; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #1e3a5f; color: white; padding: 5px; text-align: left; }
        td { padding: 4px 5px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f5f5f5; }
        .badge-crear { color: #065f46; }
        .badge-actualizar { color: #92400e; }
        .badge-eliminar { color: #991b1b; }
    </style>
</head>
<body>
    <h1>SIPeIP - Secretaria Nacional de Planificacion</h1>
    <h2>Reporte de Actividad por Usuario</h2>
    <p>Fecha de generacion: {{ now()->format('d/m/Y H:i') }}</p>
    @if(request('user_id'))
    <p>Usuario filtrado: {{ $auditorias->first()?->usuario->name ?? 'N/A' }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>Fecha/Hora</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Modulo</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
        @forelse($auditorias as $a)
        <tr>
            <td>{{ $a->fecha_hora }}</td>
            <td>{{ $a->usuario->name ?? 'N/A' }}</td>
            <td>{{ $a->usuario->rol?->nombre ?? 'N/A' }}</td>
            <td>{{ $a->modulo }}</td>
            <td class="badge-{{ $a->accion }}">{{ ucfirst($a->accion) }}</td>
        </tr>
        @empty
        <tr><td colspan="5">No hay registros</td></tr>
        @endforelse
        </tbody>
    </table>
    <p style="margin-top:10px; color:#666;">Total acciones: {{ $auditorias->count() }}</p>
</body>
</html>
