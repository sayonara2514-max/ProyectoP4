<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle Auditoría</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4 space-y-2">
    <p><strong>Fecha/Hora:</strong> {{ $auditoria->fecha_hora }}</p>
    <p><strong>Usuario:</strong> {{ $auditoria->usuario->name }}</p>
    <p><strong>Módulo:</strong> {{ $auditoria->modulo }}</p>
    <p><strong>Acción:</strong> {{ $auditoria->accion }}</p>
    <a href="{{ route('auditorias.index') }}" class="mt-4 inline-block text-blue-600">← Volver</a>
</div>
</x-app-layout>