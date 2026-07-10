<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle de Entidad</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="border-b pb-4">
            <h3 class="text-2xl font-bold text-gray-800">{{ $entidad->nombre }}</h3>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Misión</p>
                <p class="text-gray-800">{{ $entidad->mision ?? 'No especificada' }}</p>
            </div>
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Estructura</p>
                <p class="text-gray-800">{{ $entidad->estructura ?? 'No especificada' }}</p>
            </div>
        </div>
        <div class="flex gap-2 pt-2">
            <a href="{{ route('entidades.edit', $entidad->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
            <a href="{{ route('entidades.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
        </div>
    </div>
</div>
</x-app-layout>