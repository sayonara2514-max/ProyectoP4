<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle del Proyecto</h2></x-slot>
<div class="py-6 max-w-4xl mx-auto px-4 space-y-4">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="border-b pb-4 mb-4 flex justify-between items-start">
            <div>
                <span class="font-mono text-xs text-gray-500">{{ $proyecto->codigo ?? '-' }}</span>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $proyecto->nombre }}</h3>
            </div>
            @if($proyecto->estado === 'formulado')
                <span class="px-3 py-1 rounded text-sm bg-blue-100 text-blue-800">Formulado</span>
            @elseif($proyecto->estado === 'en_revision')
                <span class="px-3 py-1 rounded text-sm bg-yellow-100 text-yellow-800">En Revision</span>
            @elseif($proyecto->estado === 'validado')
                <span class="px-3 py-1 rounded text-sm bg-purple-100 text-purple-800">Validado</span>
            @else
                <span class="px-3 py-1 rounded text-sm bg-green-100 text-green-800">Aprobado</span>
            @endif
        </div>

        @if($proyecto->descripcion)
        <div class="bg-gray-50 rounded p-3 mb-4">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Descripcion</p>
            <p class="text-gray-700">{{ $proyecto->descripcion }}</p>
        </div>
        @endif

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Programa</p>
                <p class="text-gray-800 font-medium">{{ $proyecto->programa->nombre }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Tipo</p>
                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $proyecto->tipo ?? 'Inversion' }}</span>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Sector de Intervencion</p>
                <p class="text-gray-800">{{ $proyecto->sector_intervencion ?? 'No especificado' }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Fuente de Financiamiento</p>
                <p class="text-gray-800">{{ $proyecto->fuente_financiamiento ?? 'No especificado' }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Ubicacion Geografica</p>
                <p class="text-gray-800">{{ $proyecto->ubicacion_geografica ?? 'No especificado' }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Periodo</p>
                <p class="text-gray-800">{{ $proyecto->fecha_inicio }} → {{ $proyecto->fecha_fin }}</p>
            </div>
        </div>
    </div>

    <!-- Presupuesto -->
    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-700 mb-4">Informacion Financiera</h4>
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-blue-50 rounded p-4 text-center">
                <p class="text-xs text-gray-500 uppercase font-semibold">Presupuesto Total</p>
                <p class="text-2xl font-bold text-blue-700 mt-1">$ {{ number_format($proyecto->presupuesto, 2) }}</p>
            </div>
            <div class="bg-green-50 rounded p-4 text-center">
                <p class="text-xs text-gray-500 uppercase font-semibold">Presupuesto Ejecutado</p>
                <p class="text-2xl font-bold text-green-600 mt-1">$ {{ number_format($proyecto->presupuesto_ejecutado ?? 0, 2) }}</p>
            </div>
            <div class="bg-gray-50 rounded p-4 text-center">
                <p class="text-xs text-gray-500 uppercase font-semibold">% Ejecucion</p>
                @php $pct = $proyecto->presupuesto > 0 ? min(100, ($proyecto->presupuesto_ejecutado / $proyecto->presupuesto) * 100) : 0; @endphp
                <p class="text-2xl font-bold text-gray-700 mt-1">{{ number_format($pct, 1) }}%</p>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ $pct }}%"></div>
                </div>
            </div>
        </div>
    </div>

    @if($proyecto->observacion)
    <div class="bg-orange-50 border border-orange-200 rounded-lg p-4">
        <p class="text-xs text-orange-700 uppercase font-semibold mb-1">Observacion</p>
        <p class="text-gray-700">{{ $proyecto->observacion }}</p>
    </div>
    @endif

    <div class="flex gap-2">
        @if($proyecto->estado === 'formulado' && in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']))
            <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
        @endif
        <a href="{{ route('proyectos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
    </div>
</div>
</x-app-layout>