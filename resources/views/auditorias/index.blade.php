<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Registro de Auditoría</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow p-4 mb-4">
        <form method="GET" action="{{ route('auditorias.index') }}" class="flex gap-3 flex-wrap">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Módulo</label>
                <select name="modulo" class="border rounded p-2 text-sm">
                    <option value="">Todos</option>
                    <option value="Proyecto" {{ request('modulo') == 'Proyecto' ? 'selected' : '' }}>Proyecto</option>
                    <option value="Plan" {{ request('modulo') == 'Plan' ? 'selected' : '' }}>Plan</option>
                    <option value="Programa" {{ request('modulo') == 'Programa' ? 'selected' : '' }}>Programa</option>
                    <option value="Meta" {{ request('modulo') == 'Meta' ? 'selected' : '' }}>Meta</option>
                    <option value="Indicador" {{ request('modulo') == 'Indicador' ? 'selected' : '' }}>Indicador</option>
                    <option value="ObjetivoEstrategico" {{ request('modulo') == 'ObjetivoEstrategico' ? 'selected' : '' }}>Objetivo</option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Acción</label>
                <select name="accion" class="border rounded p-2 text-sm">
                    <option value="">Todas</option>
                    <option value="crear" {{ request('accion') == 'crear' ? 'selected' : '' }}>Crear</option>
                    <option value="actualizar" {{ request('accion') == 'actualizar' ? 'selected' : '' }}>Actualizar</option>
                    <option value="eliminar" {{ request('accion') == 'eliminar' ? 'selected' : '' }}>Eliminar</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">Filtrar</button>
                <a href="{{ route('auditorias.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded text-sm hover:bg-gray-300">Limpiar</a>
            </div>
        </form>
    </div>

    <!-- Tabla -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="p-3 text-left">Fecha/Hora</th>
                    <th class="p-3 text-left">Usuario</th>
                    <th class="p-3 text-left">Módulo</th>
                    <th class="p-3 text-left">Acción</th>
                </tr>
            </thead>
            <tbody>
            @forelse($auditorias as $a)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3 text-gray-600">{{ $a->fecha_hora }}</td>
                <td class="p-3 font-medium">{{ $a->usuario->name }}</td>
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $a->modulo }}</span>
                </td>
                <td class="p-3">
                    @if($a->accion === 'crear')
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Crear</span>
                    @elseif($a->accion === 'actualizar')
                        <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Actualizar</span>
                    @else
                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Eliminar</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="p-4 text-center text-gray-500">No hay registros de auditoría</td></tr>
            @endforelse
            </tbody>
        </table></div>
        <div class="p-4">{{ $auditorias->links() }}</div>
    </div>
</div>
</x-app-layout>