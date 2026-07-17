<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle del Plan</h2></x-slot>
<div class="py-6 max-w-4xl mx-auto px-4 space-y-4">

    <div class="bg-white rounded-lg shadow p-6">
        <div class="border-b pb-4 mb-4">
            <h3 class="text-2xl font-bold text-gray-800">{{ $plan->nombre }}</h3>
            <p class="text-sm text-gray-500">Codigo: {{ $plan->codigo }}</p>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Entidad</p>
                <p class="text-gray-800">{{ $plan->entidad->nombre }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Estado</p>
                @if($plan->estado === 'formulado')
                    <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">Formulado</span>
                @elseif($plan->estado === 'en_revision')
                    <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-800">En Revision</span>
                @elseif($plan->estado === 'validado')
                    <span class="px-2 py-1 rounded text-xs bg-purple-100 text-purple-800">Validado</span>
                @else
                    <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Aprobado</span>
                @endif
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Periodo Inicio</p>
                <p class="text-gray-800">{{ $plan->periodo_inicio }}</p>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Periodo Fin</p>
                <p class="text-gray-800">{{ $plan->periodo_fin }}</p>
            </div>
        </div>
        @if($plan->descripcion)
        <div class="mt-4 bg-gray-50 rounded p-3">
            <p class="text-xs text-gray-500 uppercase font-semibold">Descripcion</p>
            <p class="text-gray-700 mt-1">{{ $plan->descripcion }}</p>
        </div>
        @endif
        @if($plan->observacion)
        <div class="mt-4 bg-orange-50 border border-orange-200 rounded p-3">
            <p class="text-xs text-orange-700 uppercase font-semibold">Observacion</p>
            <p class="text-gray-700 mt-1">{{ $plan->observacion }}</p>
        </div>
        @endif
    </div>

    <!-- ODS Alineados -->
    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-700 mb-3">ODS Alineados</h4>
        @forelse($plan->ods as $o)
            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $o->codigo }} - {{ $o->nombre }}</span>
        @empty
            <p class="text-gray-500 text-sm">Sin ODS alineados</p>
        @endforelse
    </div>
    <!-- Metas e Indicadores ODS -->
<div class="bg-white rounded-lg shadow p-6">
    <h4 class="font-semibold text-gray-700 mb-3">Metas e Indicadores de ODS Alineados</h4>
    @forelse($plan->ods as $o)
    <div class="mb-4">
        <p class="font-semibold text-green-700 mb-2">{{ $o->codigo }} - {{ $o->nombre }}</p>
        @forelse($o->metas as $meta)
        <div class="ml-4 bg-gray-50 rounded p-3 mb-2">
            <p class="text-xs font-semibold text-gray-700">Meta {{ $meta->codigo }}: {{ $meta->descripcion }}</p>
            @forelse($meta->indicadores as $ind)
            <p class="text-xs text-blue-700 ml-3 mt-1">▸ {{ $ind->codigo }}: {{ $ind->descripcion }}</p>
            @empty
            <p class="text-xs text-gray-400 ml-3">Sin indicadores</p>
            @endforelse
        </div>
        @empty
        <p class="text-xs text-gray-400 ml-4">Sin metas registradas</p>
        @endforelse
    </div>
    @empty
    <p class="text-gray-500 text-sm">Sin ODS alineados</p>
    @endforelse
</div>

    <!-- PDN Alineados -->
    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-700 mb-3">PDN Alineados</h4>
        @forelse($plan->pdns as $p)
            <span class="inline-block bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $p->codigo }} - {{ $p->nombre }}</span>
        @empty
            <p class="text-gray-500 text-sm">Sin PDN alineados</p>
        @endforelse
    </div>

    <!-- Objetivos Estrategicos -->
    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-700 mb-3">Objetivos Estrategicos</h4>
        @forelse($plan->objetivosEstrategicos as $o)
            <p class="text-sm text-gray-700 mb-1">• <span class="font-semibold">{{ $o->codigo }}</span> — {{ $o->descripcion }}</p>
        @empty
            <p class="text-gray-500 text-sm">Sin objetivos estrategicos</p>
        @endforelse
    </div>

    <!-- Programas -->
    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-700 mb-3">Programas</h4>
        @forelse($plan->programas as $pg)
            <span class="inline-block bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $pg->nombre }}</span>
        @empty
            <p class="text-gray-500 text-sm">Sin programas registrados</p>
        @endforelse
    </div>

    <!-- Actividades -->
    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-700 mb-3">Actividades del Plan</h4>
        @forelse($plan->actividades as $act)
        <div class="border rounded p-3 mb-2">
            <div class="flex justify-between items-start">
                <div>
                    <p class="font-medium text-sm">{{ $act->nombre }}</p>
                    @if($act->descripcion)<p class="text-xs text-gray-500 mt-1">{{ $act->descripcion }}</p>@endif
                </div>
                <div class="flex gap-2">
                    @if($act->prioridad === 'Alta')
                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Alta</span>
                    @elseif($act->prioridad === 'Media')
                        <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Media</span>
                    @else
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Baja</span>
                    @endif
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $act->tipo }}</span>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-2 mt-2 text-xs text-gray-600">
                <p>Responsable: {{ $act->responsable ?? '-' }}</p>
                <p>Inicio: {{ $act->fecha_inicio ?? '-' }}</p>
                <p>Fin: {{ $act->fecha_fin ?? '-' }}</p>
                <p>Presupuesto: $ {{ number_format($act->presupuesto, 2) }}</p>
                <p>Avance: {{ $act->porcentaje_avance }}%</p>
                <p>Estado: {{ $act->estado_actividad }}</p>
            </div>
            <div class="mt-2">
                <div class="w-full bg-gray-200 rounded-full h-1.5">
                    <div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ $act->porcentaje_avance }}%"></div>
                </div>
            </div>
        </div>
        @empty
            <p class="text-gray-500 text-sm">Sin actividades registradas</p>
        @endforelse
    </div>

    <div class="flex gap-2">
        @if($plan->estado === 'formulado' && in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']))
            <a href="{{ route('planes.edit', $plan->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
        @endif
        <a href="{{ route('planes.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
    </div>
</div>
</x-app-layout>