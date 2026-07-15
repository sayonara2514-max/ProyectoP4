<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle del Plan</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="border-b pb-4">
            <h3 class="text-2xl font-bold text-gray-800">{{ $plan->nombre }}</h3>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Entidad</p>
                <p class="text-gray-800">{{ $plan->entidad->nombre }}</p>
            </div>
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Estado</p>
                @if($plan->estado === 'formulado')
                    <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">Formulado</span>
                @elseif($plan->estado === 'en_revision')
                    <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-800">En Revision</span>
                @else
                    <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Aprobado</span>
                @endif
            </div>
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Periodo Inicio</p>
                <p class="text-gray-800">{{ $plan->periodo_inicio }}</p>
            </div>
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Periodo Fin</p>
                <p class="text-gray-800">{{ $plan->periodo_fin }}</p>
            </div>
        </div>

        <div class="bg-gray-50 rounded p-4">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-2">Programas</p>
            @forelse($plan->programas as $pg)
                <span class="inline-block bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $pg->nombre }}</span>
            @empty
                <p class="text-gray-500 text-sm">Sin programas registrados</p>
            @endforelse
        </div>

        <div class="flex gap-2 pt-2">
            @if($plan->estado === 'formulado' && in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']))
                <a href="{{ route('planes.edit', $plan->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
            @endif
            <a href="{{ route('planes.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
        </div>
    </div>
</div>
</x-app-layout>