<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Rol: {{ $rol->nombre }}</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
    <p><strong>Descripción:</strong> {{ $rol->descripcion }}</p>
    <a href="{{ route('roles.index') }}" class="mt-4 inline-block text-blue-600">← Volver</a>
</div>
</x-app-layout>