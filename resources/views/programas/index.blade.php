<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Gestion de Programas</h2></x-slot>
<div class="py-6">
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">Programas de inversion vinculados a los planes institucionales</p>
        @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']))
        <a href="{{ route('programas.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm font-medium">+ Nuevo Programa</a>
        @endif
    </div>

    <!-- Estadisticas -->
    <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-600">
            <p class="text-2xl font-bold text-blue-700">{{ count($programas) }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Programas</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-green-500">
            <p class="text-2xl font-bold text-green-600">{{ collect($programas)->sum(fn($p) => $p->proyectos->count()) }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Proyectos</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-purple-500">
            <p class="text-2xl font-bold text-purple-600">{{ collect($programas)->unique('plan_id')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Planes Vinculados</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-blue-700 text-white">
                    <th class="p-3 text-left">Codigo</th>
                    <th class="p-3 text-left">Nombre del Programa</th>
                    <th class="p-3 text-left">Plan Vinculado</th>
                    <th class="p-3 text-left">Responsable</th>
                    <th class="p-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($programas as $p)
            <tr class="border-b hover:bg-blue-50 transition">
                <td class="p-3 font-mono text-xs text-gray-500">{{ $p->codigo ?? '-' }}</td>
                <td class="p-3">
                    <p class="font-semibold text-gray-800">{{ $p->nombre }}</p>
                    @if($p->descripcion)<p class="text-xs text-gray-400">{{ Str::limit($p->descripcion, 60) }}</p>@endif
                </td>
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $p->plan->nombre }}</span>
                </td>
                <td class="p-3 text-gray-600 text-xs">{{ $p->responsable ?? '-' }}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('programas.show', $p) }}" class="text-blue-600 text-xs hover:underline">Ver</a>
                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']))
                    <a href="{{ route('programas.edit', $p) }}" class="text-yellow-600 text-xs hover:underline">Editar</a>
                    <form action="{{ route('programas.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar?')">@csrf @method('DELETE')<button class="text-red-600 text-xs hover:underline">Eliminar</button></form>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="p-6 text-center text-gray-400">No hay programas registrados</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>