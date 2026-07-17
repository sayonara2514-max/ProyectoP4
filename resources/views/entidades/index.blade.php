<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Gestion de Entidades Institucionales</h2></x-slot>
<div class="py-6">
    <div class="flex justify-between items-center mb-4">
        <div>
            <p class="text-sm text-gray-500">Registro de entidades del Estado vinculadas al Presupuesto General del Estado</p>
        </div>
        <a href="{{ route('entidades.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm font-medium">+ Nueva Entidad</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-blue-700 text-white">
                    <th class="p-3 text-left">Codigo</th>
                    <th class="p-3 text-left">Nombre</th>
                    <th class="p-3 text-left">Sector</th>
                    <th class="p-3 text-left">Subsector</th>
                    <th class="p-3 text-left">Nivel</th>
                    <th class="p-3 text-left">Estado</th>
                    <th class="p-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($entidades as $e)
            <tr class="border-b hover:bg-blue-50 transition">
                <td class="p-3 font-mono text-xs text-gray-500">{{ $e->codigo ?? '-' }}</td>
                <td class="p-3">
                    <p class="font-semibold text-gray-800">{{ $e->nombre }}</p>
                    @if($e->mision)<p class="text-xs text-gray-400 truncate max-w-xs">{{ Str::limit($e->mision, 60) }}</p>@endif
                </td>
                <td class="p-3 text-gray-600">{{ $e->sector ?? '-' }}</td>
                <td class="p-3 text-gray-600">{{ $e->subsector ?? '-' }}</td>
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $e->nivel_gobierno ?? 'Nacional' }}</span>
                </td>
                <td class="p-3">
                    @if(($e->estado ?? 'Activo') === 'Activo')
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Activo</span>
                    @else
                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Inactivo</span>
                    @endif
                </td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('entidades.show', $e) }}" class="text-blue-600 text-xs hover:underline">Ver</a>
                    <a href="{{ route('entidades.edit', $e) }}" class="text-yellow-600 text-xs hover:underline">Editar</a>
                    <form action="{{ route('entidades.destroy', $e) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar?')">@csrf @method('DELETE')<button class="text-red-600 text-xs hover:underline">Eliminar</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="p-6 text-center text-gray-400">No hay entidades registradas</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 grid grid-cols-3 gap-4">
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-blue-700">{{ $entidades->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Entidades</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-green-600">{{ $entidades->where('estado', 'Activo')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Entidades Activas</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-red-500">{{ $entidades->where('estado', 'Inactivo')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Entidades Inactivas</p>
        </div>
    </div>
</div>
</x-app-layout>