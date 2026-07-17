<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Gestion de Proyectos de Inversion</h2></x-slot>
<div class="py-6">
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">Proyectos de inversion publica vinculados a programas institucionales</p>
        @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']))
        <a href="{{ route('proyectos.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm font-medium">+ Nuevo Proyecto</a>
        @endif
    </div>

    <!-- Estadisticas -->
    <div class="grid grid-cols-4 gap-4 mb-4">
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-600">
            <p class="text-2xl font-bold text-blue-700">{{ $proyectos->total() }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Proyectos</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-400">
            <p class="text-2xl font-bold text-blue-500">{{ $proyectos->where('estado','formulado')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Formulados</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-yellow-400">
            <p class="text-2xl font-bold text-yellow-600">{{ $proyectos->where('estado','en_revision')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">En Revision</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-green-500">
            <p class="text-2xl font-bold text-green-600">{{ $proyectos->where('estado','aprobado')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Aprobados</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-blue-700 text-white">
                    <th class="p-3 text-left">Codigo</th>
                    <th class="p-3 text-left">Nombre del Proyecto</th>
                    <th class="p-3 text-left">Programa</th>
                    <th class="p-3 text-left">Tipo</th>
                    <th class="p-3 text-left">Presupuesto</th>
                    <th class="p-3 text-left">Estado</th>
                    <th class="p-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($proyectos as $p)
            <tr class="border-b hover:bg-blue-50 transition">
                <td class="p-3 font-mono text-xs text-gray-500">{{ $p->codigo ?? '-' }}</td>
                <td class="p-3">
                    <p class="font-semibold text-gray-800">{{ $p->nombre }}</p>
                    @if($p->sector_intervencion)<p class="text-xs text-gray-400">Sector: {{ $p->sector_intervencion }}</p>@endif
                    @if($p->ubicacion_geografica)<p class="text-xs text-gray-400">📍 {{ $p->ubicacion_geografica }}</p>@endif
                </td>
                <td class="p-3">
                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">{{ $p->programa->nombre }}</span>
                </td>
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $p->tipo ?? 'Inversion' }}</span>
                </td>
                <td class="p-3">
                    <p class="font-semibold text-gray-800">$ {{ number_format($p->presupuesto, 2) }}</p>
                    @if($p->presupuesto > 0)
                    <div class="w-24 bg-gray-200 rounded-full h-1.5 mt-1">
                        <div class="bg-green-500 h-1.5 rounded-full" style="width: {{ min(100, ($p->presupuesto_ejecutado / $p->presupuesto) * 100) }}%"></div>
                    </div>
                    <p class="text-xs text-gray-400">Ejec: {{ number_format(min(100, ($p->presupuesto_ejecutado / $p->presupuesto) * 100), 1) }}%</p>
                    @endif
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
                <td class="p-3 space-x-1">
                    <a href="{{ route('proyectos.show', $p) }}" class="text-blue-600 text-xs hover:underline">Ver</a>

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']) && $p->estado === 'formulado')
                        <a href="{{ route('proyectos.edit', $p) }}" class="text-yellow-600 text-xs hover:underline">Editar</a>
                        <form action="{{ route('proyectos.enviarRevision', $p) }}" method="POST" class="inline">@csrf<button class="text-purple-600 text-xs hover:underline">Enviar</button></form>
                    @endif

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Revisor Institucional']) && $p->estado === 'en_revision')
                        <form action="{{ route('proyectos.validar', $p) }}" method="POST" class="inline">@csrf<button class="text-green-600 text-xs hover:underline">Validar</button></form>
                        <button onclick="document.getElementById('modal-proyecto-{{ $p->id }}').classList.remove('hidden')" class="text-orange-600 text-xs hover:underline">Devolver</button>
                    @endif

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Autoridad Validante']) && $p->estado === 'validado')
                        <form action="{{ route('proyectos.aprobar', $p) }}" method="POST" class="inline">@csrf<button class="text-green-700 text-xs font-bold hover:underline">Aprobar</button></form>
                        <button onclick="document.getElementById('modal-proyecto-{{ $p->id }}').classList.remove('hidden')" class="text-orange-600 text-xs hover:underline">Devolver</button>
                    @endif

                    @if(auth()->user()->rol?->nombre === 'Administrador' && $p->estado === 'formulado')
                        <form action="{{ route('proyectos.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar?')">@csrf @method('DELETE')<button class="text-red-600 text-xs hover:underline">Eliminar</button></form>
                    @endif
                </td>
            </tr>

            <!-- Modal observacion -->
            <div id="modal-proyecto-{{ $p->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg p-6 w-96 shadow-xl">
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Devolver Proyecto</h3>
                    <p class="text-sm text-gray-500 mb-4">Indique las observaciones para la correccion del proyecto.</p>
                    <form action="{{ route('proyectos.devolver', $p) }}" method="POST">
                        @csrf
                        <textarea name="observacion" rows="4" placeholder="Escriba las observaciones..." class="w-full border rounded p-2 mb-4 text-sm" required></textarea>
                        <div class="flex gap-2">
                            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded text-sm hover:bg-orange-600">Devolver</button>
                            <button type="button" onclick="document.getElementById('modal-proyecto-{{ $p->id }}').classList.add('hidden')" class="bg-gray-200 px-4 py-2 rounded text-sm">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
            @empty
            <tr><td colspan="7" class="p-6 text-center text-gray-400">No hay proyectos registrados</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $proyectos->links() }}</div>
</div>
</x-app-layout>