<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle de Entidad</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4 space-y-4">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="border-b pb-4 mb-4">
            <h3 class="text-2xl font-bold text-gray-800">{{ $entidad->nombre }}</h3>
            @if($entidad->codigo)<p class="text-sm text-gray-500">Codigo: {{ $entidad->codigo }}</p>@endif
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Sector</p>
                <p class="text-gray-800">{{ $entidad->sector ?? 'No especificado' }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Subsector</p>
                <p class="text-gray-800">{{ $entidad->subsector ?? 'No especificado' }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Nivel de Gobierno</p>
                <p class="text-gray-800">{{ $entidad->nivel_gobierno }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Estado</p>
                <span class="px-2 py-1 rounded text-xs {{ $entidad->estado === 'Activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ $entidad->estado }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <h4 class="font-semibold text-gray-700 border-b pb-2">Direccion Estrategica</h4>
        <div class="bg-gray-50 rounded p-3">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Mision</p>
            <p class="text-gray-800">{{ $entidad->mision ?? 'No especificada' }}</p>
        </div>
        <div class="bg-gray-50 rounded p-3">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Vision</p>
            <p class="text-gray-800">{{ $entidad->vision ?? 'No especificada' }}</p>
        </div>
        <div class="bg-gray-50 rounded p-3">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Estructura Organizacional</p>
            <p class="text-gray-800">{{ $entidad->estructura ?? 'No especificada' }}</p>
        </div>
    </div>

    <div class="flex gap-2">
        <a href="{{ route('entidades.edit', $entidad->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
        <a href="{{ route('entidades.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
    </div>
</div>
</x-app-layout>