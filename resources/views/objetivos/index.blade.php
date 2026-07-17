<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Objetivos Estrategicos Institucionales</h2></x-slot>
<div class="py-6">
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">Objetivos estrategicos de las entidades del Estado</p>
        @if(auth()->user()->rol?->nombre === 'Administrador')
        <a href="{{ route('objetivos.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm font-medium">+ Nuevo Objetivo</a>
        @endif
    </div>

    <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-600">
            <p class="text-2xl font-bold text-blue-700">{{ count($objetivos) }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Objetivos</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-green-500">
            <p class="text-2xl font-bold text-green-600">{{ collect($objetivos)->where('estado','Activo')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Activos</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-gray-400">
            <p class="text-2xl font-bold text-gray-600">{{ collect($objetivos)->where('estado','Inactivo')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Inactivos</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-blue-700 text-white">
                    <th class="p-3 text-left">Codigo</th>
                    <th class="p-3 text-left">Descripcion</th>
                    <th class="p-3 text-left">Entidad</th>
                    <th class="p-3 text-left">Fecha Registro</th>
                    <th class="p-3 text-left">Estado</th>
                    <th class="p-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($objetivos as $o)
            <tr class="border-b hover:bg-blue-50 transition">
                <td class="p-3 font-mono text-xs text-gray-500 font-semibold">{{ $o->codigo }}</td>
                <td class="p-3">
                    <p class="text-gray-800">{{ Str::limit($o->descripcion, 80) }}</p>
                </td>
                <td class="p-3">
                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded">{{ $o->entidad->nombre ?? 'No asignada' }}</span>
                </td>
                <td class="p-3 text-xs text-gray-500">{{ $o->fecha_registro ?? '-' }}</td>
                <td class="p-3">
                    @if(($o->estado ?? 'Activo') === 'Activo')
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Activo</span>
                    @else
                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Inactivo</span>
                    @endif
                </td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('objetivos.show', $o) }}" class="text-blue-600 text-xs hover:underline">Ver</a>
                    @if(auth()->user()->rol?->nombre === 'Administrador')
                    <a href="{{ route('objetivos.edit', $o) }}" class="text-yellow-600 text-xs hover:underline">Editar</a>
                    <form action="{{ route('objetivos.destroy', $o) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar?')">@csrf @method('DELETE')<button class="text-red-600 text-xs hover:underline">Eliminar</button></form>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="p-6 text-center text-gray-400">No hay objetivos registrados</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>