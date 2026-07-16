<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Objetivos</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        h1 { color: #1e3a5f; font-size: 16px; }
        .objetivo { border: 1px solid #ddd; margin-bottom: 10px; padding: 8px; border-radius: 4px; }
        .codigo { background: #dbeafe; color: #1e40af; padding: 2px 6px; border-radius: 3px; font-size: 10px; }
        .ods { background: #d1fae5; padding: 2px 5px; margin: 2px; display: inline-block; font-size: 9px; }
        .pdn { background: #ede9fe; padding: 2px 5px; margin: 2px; display: inline-block; font-size: 9px; }
    </style>
</head>
<body>
    <h1>Sistema Integrado de Planificacion e Inversion Publica - SNP</h1>
    <h2>Reporte de Objetivos Estrategicos</h2>
    <p>Fecha: {{ now()->format('d/m/Y H:i') }}</p>
    @foreach($objetivos as $obj)
    <div class="objetivo">
        <p><span class="codigo">{{ $obj->codigo }}</span> <strong>{{ $obj->descripcion }}</strong></p>
        <p style="color:#666; font-size:10px;">Plan: {{ $obj->plan->nombre ?? 'N/A' }}</p>
        <p>ODS: @foreach($obj->ods as $o)<span class="ods">{{ $o->codigo }}</span>@endforeach</p>
        <p>PDN: @foreach($obj->pdns as $p)<span class="pdn">{{ $p->codigo }}</span>@endforeach</p>
    </div>
    @endforeach
</body>
</html>
