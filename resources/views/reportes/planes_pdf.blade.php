<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Planes</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1 { color: #1e3a5f; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th { background-color: #1e3a5f; color: white; padding: 8px; text-align: left; }
        td { padding: 6px 8px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f5f5f5; }
        .header { margin-bottom: 20px; }
        .badge { padding: 2px 6px; border-radius: 3px; font-size: 10px; }
        .formulado { background: #dbeafe; color: #1e40af; }
        .en_revision { background: #fef3c7; color: #92400e; }
        .validado { background: #ede9fe; color: #5b21b6; }
        .aprobado { background: #d1fae5; color: #065f46; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sistema Integrado de Planificacion e Inversion Publica - SNP</h1>
        <h2>Reporte de Planes Institucionales</h2>
        <p>Fecha de generacion: {{ now()->format('d/m/Y H:i') }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nombre del Plan</th>
                <th>Entidad</th>
                <th>Periodo Inicio</th>
                <th>Periodo Fin</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($planes as $plan)
            <tr>
                <td>{{ $plan->nombre }}</td>
                <td>{{ $plan->entidad->nombre ?? 'N/A' }}</td>
                <td>{{ $plan->periodo_inicio }}</td>
                <td>{{ $plan->periodo_fin }}</td>
                <td><span class="badge {{ $plan->estado }}">{{ ucfirst(str_replace('_', ' ', $plan->estado)) }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p style="margin-top:20px; color:#666;">Total de planes: {{ $planes->count() }}</p>
</body>
</html>
