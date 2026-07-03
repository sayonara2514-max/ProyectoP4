<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">{{ $indicador->nombre }}</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4 space-y-2">
    <p><strong>Meta:</strong> {{ $indicador->meta->descripcion }}</p>
    <p><strong>Fórmula:</strong> {{ $indicador->formula }}</p>
    <p><strong>Unidad:</strong> {{ $indicador->unidad_medida }}</p>
    <a href="{{ route('indicadores.index') }}" class="mt-4 inline-block text-blue-600">← Volver</a>
</div>
</x-app-layout>