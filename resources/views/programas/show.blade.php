<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle del Programa</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto space-y-4">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="border-b pb-4 mb-4">
            <span class="font-mono text-xs text-gray-500">{{ $programa->codigo ?? '-' }}</span>
            <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $programa->nombre }}</h3>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Plan Vinculado</p>
                <p class="text-gray-800 font-medium">{{ $programa->plan->nombre }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Responsable</p>
                <p class="text-gray-800">{{ $programa->responsable ?? 'No especificado' }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Estado</p>
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">{{ ucfirst($programa->estado ?? 'activo') }}</span>
            </div>
        </div>
        @if($programa->descripcion)
        <div class="mt-4 bg-gray-50 rounded p-3">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Descripcion</p>
            <p class="text-gray-700">{{ $programa->descripcion }}</p>
        </div>
        @endif
        @if($programa->observaciones)
        <div class="mt-4 bg-orange-50 border border-orange-200 rounded p-3">
            <p class="text-xs text-orange-700 uppercase font-semibold mb-1">Observaciones</p>
            <p class="text-gray-700">{{ $programa->observaciones }}</p>
        </div>
        @endif
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-700 mb-3">Proyectos del Programa</h4>
        @forelse($programa->proyectos as $proy)
        <div class="border rounded p-3 mb-2 hover:bg-gray-50">
            <p class="font-medium text-sm">{{ $proy->nombre }}</p>
            <p class="text-xs text-gray-500">Presupuesto: $ {{ number_format($proy->presupuesto, 2) }} | Estado: {{ ucfirst($proy->estado) }}</p>
        </div>
        @empty
        <p class="text-gray-500 text-sm">Sin proyectos registrados</p>
        @endforelse
    </div>

    <div class="flex gap-2">
        @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']))
        <a href="{{ route('programas.edit', $programa) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
        @endif
        <a href="{{ route('programas.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
    </div>
</div>
</x-app-layout>