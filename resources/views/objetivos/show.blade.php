<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle del Objetivo Estrategico</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4 space-y-4">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="border-b pb-4 mb-4 flex justify-between items-start">
            <div>
                <span class="font-mono text-xs text-gray-500">{{ $objetivo->codigo }}</span>
                <h3 class="text-xl font-bold text-gray-800 mt-1">{{ $objetivo->descripcion }}</h3>
            </div>
            @if(($objetivo->estado ?? 'Activo') === 'Activo')
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Activo</span>
            @else
                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Inactivo</span>
            @endif
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Entidad</p>
                <p class="text-gray-800 font-medium">{{ $objetivo->entidad->nombre ?? 'No asignada' }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Fecha de Registro</p>
                <p class="text-gray-800">{{ $objetivo->fecha_registro ?? '-' }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-700 mb-3">Planes que incluyen este Objetivo</h4>
        @forelse($objetivo->planes as $plan)
        <div class="border rounded p-3 mb-2 hover:bg-gray-50">
            <p class="font-medium text-sm">{{ $plan->nombre }}</p>
            <p class="text-xs text-gray-500">{{ $plan->periodo_inicio }} → {{ $plan->periodo_fin }}</p>
        </div>
        @empty
        <p class="text-gray-500 text-sm">No esta vinculado a ningun plan</p>
        @endforelse
    </div>

    <div class="flex gap-2">
        @if(auth()->user()->rol?->nombre === 'Administrador')
        <a href="{{ route('objetivos.edit', $objetivo->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
        @endif
        <a href="{{ route('objetivos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
    </div>
</div>
</x-app-layout>