<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte ODS</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; }
        h1 { color: #1e3a5f; font-size: 16px; }
        .ods { border: 1px solid #ddd; margin-bottom: 8px; padding: 6px; }
        .ods-titulo { background: #064e3b; color: white; padding: 4px 8px; font-size: 11px; }
        .meta { margin-left: 10px; padding: 3px 0; border-bottom: 1px solid #eee; }
        .indicador { margin-left: 20px; color: #1d4ed8; font-size: 9px; }
    </style>
</head>
<body>
    <h1>Sistema Integrado de Planificacion e Inversion Publica - SNP</h1>
    <h2>Reporte de ODS con Metas e Indicadores</h2>
    <p>Fecha: {{ now()->format('d/m/Y H:i') }}</p>
    @foreach($ods as $o)
    <div class="ods">
        <div class="ods-titulo">{{ $o->codigo }} - {{ $o->nombre }}</div>
        @foreach($o->metas as $meta)
        <div class="meta">
            <strong>Meta {{ $meta->codigo }}:</strong> {{ $meta->descripcion }}
            @foreach($meta->indicadores as $ind)
            <div class="indicador">▸ {{ $ind->codigo }}: {{ $ind->descripcion }}</div>
            @endforeach
        </div>
        @endforeach
    </div>
    @endforeach
</body>
</html>
