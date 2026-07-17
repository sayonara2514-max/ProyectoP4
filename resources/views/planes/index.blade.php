<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Gestion de Planes Institucionales</h2></x-slot>
<div class="py-6">
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">Registro y seguimiento de planes estrategicos institucionales alineados al PND y ODS</p>
        @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']))
        <a href="{{ route('planes.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm font-medium">+ Nuevo Plan</a>
        @endif
    </div>

    <!-- Estadisticas -->
    <div class="grid grid-cols-4 gap-4 mb-4">
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-600">
            <p class="text-2xl font-bold text-blue-700">{{ $planes->total() }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Planes</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-400">
            <p class="text-2xl font-bold text-blue-500">{{ $planes->where('estado','formulado')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Formulados</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-yellow-400">
            <p class="text-2xl font-bold text-yellow-600">{{ $planes->where('estado','en_revision')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">En Revision</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-green-500">
            <p class="text-2xl font-bold text-green-600">{{ $planes->where('estado','aprobado')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Aprobados</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-blue-700 text-white">
                    <th class="p-3 text-left">Codigo</th>
                    <th class="p-3 text-left">Nombre del Plan</th>
                    <th class="p-3 text-left">Entidad</th>
                    <th class="p-3 text-left">Periodo</th>
                    <th class="p-3 text-left">Estado</th>
                    <th class="p-3 text-left">Observacion</th>
                    <th class="p-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($planes as $p)
            <tr class="border-b hover:bg-blue-50 transition">
                <td class="p-3 font-mono text-xs text-gray-500">{{ $p->codigo ?? '-' }}</td>
                <td class="p-3">
                    <p class="font-semibold text-gray-800">{{ $p->nombre }}</p>
                    @if($p->descripcion)<p class="text-xs text-gray-400">{{ Str::limit($p->descripcion, 50) }}</p>@endif
                </td>
                <td class="p-3 text-gray-600">{{ $p->entidad->nombre }}</td>
                <td class="p-3 text-xs text-gray-600">
                    <p>{{ $p->periodo_inicio }}</p>
                    <p>{{ $p->periodo_fin }}</p>
                </td>
                <td class="p-3">
                    @if($p->estado === 'formulado')
                        <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">Formulado</span>
                    @elseif($p->estado === 'en_revision')
                        <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-800">En Revision</span>
                    @elseif($p->estado === 'validado')
                        <span class="px-2 py-1 rounded text-xs bg-purple-100 text-purple-800">Validado</span>
                    @else
                        <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Aprobado</span>
                    @endif
                </td>
                <td class="p-3 text-xs text-gray-500 max-w-xs">{{ Str::limit($p->observacion ?? '-', 40) }}</td>
                <td class="p-3 space-x-1">
                    <a href="{{ route('planes.show', $p) }}" class="text-blue-600 text-xs hover:underline">Ver</a>

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']) && $p->estado === 'formulado')
                        <a href="{{ route('planes.edit', $p) }}" class="text-yellow-600 text-xs hover:underline">Editar</a>
                        <a href="{{ route('planes.actividades.index', $p) }}" class="text-indigo-600 text-xs hover:underline">Actividades</a>
                        <form action="{{ route('planes.enviarRevision', $p) }}" method="POST" class="inline">@csrf<button class="text-purple-600 text-xs hover:underline">Enviar</button></form>
                    @endif

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Revisor Institucional']) && $p->estado === 'en_revision')
                        <form action="{{ route('planes.validar', $p) }}" method="POST" class="inline">@csrf<button class="text-green-600 text-xs hover:underline">Validar</button></form>
                        <button onclick="document.getElementById('modal-plan-{{ $p->id }}').classList.remove('hidden')" class="text-orange-600 text-xs hover:underline">Devolver</button>
                    @endif

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Autoridad Validante']) && $p->estado === 'validado')
                        <form action="{{ route('planes.aprobar', $p) }}" method="POST" class="inline">@csrf<button class="text-green-700 text-xs font-bold hover:underline">Aprobar</button></form>
                        <button onclick="document.getElementById('modal-plan-{{ $p->id }}').classList.remove('hidden')" class="text-orange-600 text-xs hover:underline">Devolver</button>
                    @endif

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']) && $p->estado === 'formulado')
                        <form action="{{ route('planes.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar?')">@csrf @method('DELETE')<button class="text-red-600 text-xs hover:underline">Eliminar</button></form>
                    @endif
                </td>
            </tr>

            <!-- Modal observacion -->
            <div id="modal-plan-{{ $p->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg p-6 w-96 shadow-xl">
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Devolver Plan</h3>
                    <p class="text-sm text-gray-500 mb-4">Indique las observaciones para la correccion del plan.</p>
                    <form action="{{ route('planes.devolver', $p) }}" method="POST">
                        @csrf
                        <textarea name="observacion" rows="4" placeholder="Escriba las observaciones..." class="w-full border rounded p-2 mb-4 text-sm" required></textarea>
                        <div class="flex gap-2">
                            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded text-sm hover:bg-orange-600">Devolver</button>
                            <button type="button" onclick="document.getElementById('modal-plan-{{ $p->id }}').classList.add('hidden')" class="bg-gray-200 px-4 py-2 rounded text-sm">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
            @empty
            <tr><td colspan="7" class="p-6 text-center text-gray-400">No hay planes registrados</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $planes->links() }}</div>
</div>
</x-app-layout>