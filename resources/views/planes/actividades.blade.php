<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Actividades: {{ $plan->nombre }}</h2></x-slot>
<div class="py-6 max-w-5xl mx-auto px-4 space-y-4">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="p-3 text-left">Actividad</th>
                    <th class="p-3 text-left">Tipo</th>
                    <th class="p-3 text-left">Prioridad</th>
                    <th class="p-3 text-left">Responsable</th>
                    <th class="p-3 text-left">Presupuesto</th>
                    <th class="p-3 text-left">Avance</th>
                    <th class="p-3 text-left">Estado</th>
                    <th class="p-3 text-left">Inicio</th>
                    <th class="p-3 text-left">Fin</th>
                    @if($plan->estado === 'formulado')
                    <th class="p-3 text-left">Accion</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @forelse($plan->actividades as $act)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">
                    <p class="font-medium">{{ $act->nombre }}</p>
                    <p class="text-xs text-gray-500">{{ $act->descripcion }}</p>
                    @if($act->unidad_responsable)<p class="text-xs text-gray-400">Unidad: {{ $act->unidad_responsable }}</p>@endif
                </td>
                <td class="p-3"><span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $act->tipo }}</span></td>
                <td class="p-3">
                    @if($act->prioridad === 'Alta')
                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Alta</span>
                    @elseif($act->prioridad === 'Media')
                        <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Media</span>
                    @else
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Baja</span>
                    @endif
                </td>
                <td class="p-3">{{ $act->responsable ?? '-' }}</td>
                <td class="p-3">$ {{ number_format($act->presupuesto, 2) }}</td>
                <td class="p-3">
                    <div class="w-24 bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $act->porcentaje_avance }}%"></div>
                    </div>
                    <p class="text-xs text-center mt-1">{{ $act->porcentaje_avance }}%</p>
                </td>
                <td class="p-3">
                    @if($act->estado_actividad === 'Completada')
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Completada</span>
                    @elseif($act->estado_actividad === 'En Ejecucion')
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">En Ejecucion</span>
                    @elseif($act->estado_actividad === 'Suspendida')
                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Suspendida</span>
                    @else
                        <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">Pendiente</span>
                    @endif
                </td>
                <td class="p-3 text-xs">{{ $act->fecha_inicio ?? '-' }}</td>
                <td class="p-3 text-xs">{{ $act->fecha_fin ?? '-' }}</td>
                @if($plan->estado === 'formulado')
                <td class="p-3">
                    <form action="{{ route('actividades.destroy', $act) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar?')">@csrf @method('DELETE')<button class="text-red-600 text-xs">Eliminar</button></form>
                </td>
                @endif
            </tr>
            @empty
            <tr><td colspan="10" class="p-4 text-center text-gray-500">Sin actividades registradas</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @if($plan->estado === 'formulado')
    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-700 mb-4">Agregar Actividad</h4>
        <form method="POST" action="{{ route('planes.actividades.store', $plan->id) }}" class="space-y-3">
            @csrf
            <div class="grid grid-cols-2 gap-3">
                <div><label class="text-sm font-medium">Nombre de la Actividad</label><input name="nombre" class="w-full border rounded p-2 text-sm" required></div>
                <div><label class="text-sm font-medium">Tipo de Actividad</label>
                    <select name="tipo" class="w-full border rounded p-2 text-sm">
                        <option value="Gestion">Gestion</option>
                        <option value="Inversion">Inversion</option>
                        <option value="Capacitacion">Capacitacion</option>
                        <option value="Regulacion">Regulacion</option>
                        <option value="Coordinacion">Coordinacion</option>
                    </select>
                </div>
                <div><label class="text-sm font-medium">Responsable</label><input name="responsable" class="w-full border rounded p-2 text-sm"></div>
                <div><label class="text-sm font-medium">Unidad Responsable</label><input name="unidad_responsable" class="w-full border rounded p-2 text-sm"></div>
                <div><label class="text-sm font-medium">Presupuesto Estimado</label><input type="number" step="0.01" name="presupuesto" value="0" class="w-full border rounded p-2 text-sm"></div>
                <div><label class="text-sm font-medium">Prioridad</label>
                    <select name="prioridad" class="w-full border rounded p-2 text-sm">
                        <option value="Alta">Alta</option>
                        <option value="Media" selected>Media</option>
                        <option value="Baja">Baja</option>
                    </select>
                </div>
                <div><label class="text-sm font-medium">Porcentaje de Avance</label><input type="number" min="0" max="100" name="porcentaje_avance" value="0" class="w-full border rounded p-2 text-sm"></div>
                <div><label class="text-sm font-medium">Estado</label>
                    <select name="estado_actividad" class="w-full border rounded p-2 text-sm">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En Ejecucion">En Ejecucion</option>
                        <option value="Completada">Completada</option>
                        <option value="Suspendida">Suspendida</option>
                    </select>
                </div>
                <div><label class="text-sm font-medium">Fecha Inicio</label><input type="date" name="fecha_inicio" class="w-full border rounded p-2 text-sm"></div>
                <div><label class="text-sm font-medium">Fecha Fin</label><input type="date" name="fecha_fin" class="w-full border rounded p-2 text-sm"></div>
            </div>
            <div><label class="text-sm font-medium">Descripcion</label><textarea name="descripcion" class="w-full border rounded p-2 text-sm" rows="2"></textarea></div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded text-sm">+ Agregar Actividad</button>
        </form>
    </div>
    @endif

    <a href="{{ route('planes.index') }}" class="inline-block text-blue-600">← Volver a Planes</a>
</div>
</x-app-layout>