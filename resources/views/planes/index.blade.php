<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Planes</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
  
    <a href="{{ route('planes.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Nuevo Plan</a>
    <table class="w-full border text-sm">
        <thead class="bg-gray-100"><tr><th class="p-2 border">Nombre</th><th class="p-2 border">Entidad</th><th class="p-2 border">Período</th><th class="p-2 border">Estado</th><th class="p-2 border">Acciones</th></tr></thead>
        <tbody>
        @foreach($planes as $p)
        <tr><td class="p-2 border">{{ $p->nombre }}</td><td class="p-2 border">{{ $p->entidad->nombre }}</td>
        <td class="p-2 border">{{ $p->periodo_inicio }} / {{ $p->periodo_fin }}</td>
        <td class="p-2 border"><span class="px-2 py-1 rounded text-xs {{ $p->estado === 'activo' ? 'bg-green-100 text-green-800' : 'bg-gray-100' }}">{{ $p->estado }}</span></td>
        <td class="p-2 border space-x-2">
            <a href="{{ route('planes.show', $p) }}" class="text-blue-600">Ver</a>
            <a href="{{ route('planes.edit', $p) }}" class="text-yellow-600">Editar</a>
            <form action="{{ route('planes.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">@csrf @method('DELETE')<button class="text-red-600">Eliminar</button></form>
        </td></tr>
        @endforeach
        </tbody>
    </table>
    {{ $planes->links() }}
</div>
</x-app-layout>