<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Meta</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4 space-y-2">
    <p><strong>Descripción:</strong> {{ $meta->descripcion }}</p>
    <p><strong>Proyecto:</strong> {{ $meta->proyecto->nombre }}</p>
    <p><strong>Valor Objetivo:</strong> {{ $meta->valor_objetivo }}</p>
    <p><strong>Período:</strong> {{ $meta->periodo }}</p>
    <a href="{{ route('metas.index') }}" class="mt-4 inline-block text-blue-600">← Volver</a>
</div>
</x-app-layout>