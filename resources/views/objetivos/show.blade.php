<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">{{ $objetivo->codigo }}</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4 space-y-2">
    <p><strong>Descripción:</strong> {{ $objetivo->descripcion }}</p>
    <p><strong>Plan:</strong> {{ $objetivo->plan->nombre }}</p>
    <p><strong>ODS alineados:</strong> {{ $objetivo->ods->pluck('nombre')->join(', ') ?: 'Ninguno' }}</p>
    <p><strong>PDN alineados:</strong> {{ $objetivo->pdns->pluck('nombre')->join(', ') ?: 'Ninguno' }}</p>
    <a href="{{ route('objetivos.index') }}" class="mt-4 inline-block text-blue-600">← Volver</a>
</div>
</x-app-layout>