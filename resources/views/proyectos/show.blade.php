<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle del Proyecto</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="border-b pb-4">
            <h3 class="text-2xl font-bold text-gray-800">{{ $proyecto->nombre }}</h3>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Programa</p>
                <p class="text-gray-800">{{ $proyecto->programa->nombre }}</p>
            </div>
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Presupuesto</p>
                <p class="text-gray-800 font-bold">$ {{ number_format($proyecto->presupuesto, 2) }}</p>
            </div>
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Fecha Inicio</p>
                <p class="text-gray-800">{{ $proyecto->fecha_inicio }}</p>
            </div>
            <div class="bg-gray-50 rounded p-4">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Fecha Fin</p>
                <p class="text-gray-800">{{ $proyecto->fecha_fin }}</p>
            </div>
            <div class="bg-gray-50 rounded p-4 col-span-2">
                <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Estado</p>
                @if($proyecto->estado === 'formulacion')
                    <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">Formulación</span>
                @elseif($proyecto->estado === 'ejecucion')
                    <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Ejecución</span>
                @else
                    <span class="px-2 py-1 rounded text-xs bg-red-100 text-red-800">Cerrado</span>
                @endif
            </div>
        </div>

        <div class="bg-gray-50 rounded p-4">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-2">Metas</p>
            @forelse($proyecto->metas as $m)
                <p class="text-sm text-gray-700 mb-1">• {{ $m->descripcion }} <span class="text-gray-500">({{ $m->periodo }})</span></p>
            @empty
                <p class="text-gray-500 text-sm">Sin metas registradas</p>
            @endforelse
        </div>

        <div class="flex gap-2 pt-2">
            <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
            <a href="{{ route('proyectos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
        </div>
    </div>
</div>
</x-app-layout>