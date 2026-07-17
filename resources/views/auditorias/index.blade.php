<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Auditoria y Trazabilidad del Sistema</h2></x-slot>
<div class="py-6">
    <!-- Estadisticas -->
    <div class="grid grid-cols-4 gap-4 mb-4">
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-gray-700">
            <p class="text-2xl font-bold text-gray-700">{{ $auditorias->total() }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Registros</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-green-500">
            <p class="text-2xl font-bold text-green-600">{{ $auditorias->where('accion','crear')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Creaciones</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-yellow-500">
            <p class="text-2xl font-bold text-yellow-600">{{ $auditorias->where('accion','actualizar')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Actualizaciones</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-red-500">
            <p class="text-2xl font-bold text-red-600">{{ $auditorias->where('accion','eliminar')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Eliminaciones</p>
        </div>
    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow p-4 mb-4">
        <form method="GET" action="{{ route('auditorias.index') }}" class="flex gap-3 flex-wrap items-end">
            <div>
                <label class="block text-xs text-gray-500 mb-1 font-medium">Modulo</label>
                <select name="modulo" class="border rounded p-2 text-sm">
                    <option value="">Todos</option>
                    @foreach(['Proyecto','Plan','Programa','Meta','Indicador','ObjetivoEstrategico'] as $mod)
                    <option value="{{ $mod }}" {{ request('modulo') == $mod ? 'selected' : '' }}>{{ $mod }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1 font-medium">Accion</label>
                <select name="accion" class="border rounded p-2 text-sm">
                    <option value="">Todas</option>
                    <option value="crear" {{ request('accion') == 'crear' ? 'selected' : '' }}>Crear</option>
                    <option value="actualizar" {{ request('accion') == 'actualizar' ? 'selected' : '' }}>Actualizar</option>
                    <option value="eliminar" {{ request('accion') == 'eliminar' ? 'selected' : '' }}>Eliminar</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded text-sm hover:bg-blue-800">Filtrar</button>
                <a href="{{ route('auditorias.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded text-sm hover:bg-gray-300">Limpiar</a>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="p-3 text-left">Fecha / Hora</th>
                    <th class="p-3 text-left">Usuario</th>
                    <th class="p-3 text-left">Modulo</th>
                    <th class="p-3 text-left">Accion</th>
                </tr>
            </thead>
            <tbody>
            @forelse($auditorias as $a)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="p-3 text-xs text-gray-500 whitespace-nowrap">{{ $a->fecha_hora }}</td>
                <td class="p-3">
                    <p class="font-medium text-gray-800">{{ $a->usuario->name }}</p>
                    <p class="text-xs text-gray-400">{{ $a->usuario->rol?->nombre }}</p>
                </td>
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
            <tr><td colspan="4" class="p-6 text-center text-gray-400">No hay registros de auditoria</td></tr>
            @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $auditorias->links() }}</div>
    </div>
</div>
</x-app-layout>