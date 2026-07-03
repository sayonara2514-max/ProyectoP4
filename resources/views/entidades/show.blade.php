<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Entidad</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4 space-y-2">
    <p><strong>Nombre:</strong> {{ $entidad->nombre }}</p>
    <p><strong>Misión:</strong> {{ $entidad->mision }}</p>
    <p><strong>Estructura:</strong> {{ $entidad->estructura }}</p>
    <a href="{{ route('entidades.index') }}" class="mt-4 inline-block text-blue-600">← Volver</a>
</div>
</x-app-layout>