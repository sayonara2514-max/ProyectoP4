<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Metas</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
   
    <a href="{{ route('metas.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Nueva Meta</a>
    <div class="bg-white rounded-lg shadow overflow-hidden"><table class="w-full text-sm">
        <thead class="bg-gray-500 text-white"><tr><th class="p-2 border">Descripción</th><th class="p-2 border">Proyecto</th><th class="p-2 border">Valor Objetivo</th><th class="p-2 border">Período</th><th class="p-2 border">Acciones</th></tr></thead>
        <tbody>
        @foreach($metas as $m)
        <tr><td class="p-2 border">{{ $m->descripcion }}</td><td class="p-2 border">{{ $m->proyecto->nombre }}</td>
        <td class="p-2 border">{{ $m->valor_objetivo }}</td><td class="p-2 border">{{ $m->periodo }}</td>
        <td class="p-2 border space-x-2">
            <a href="{{ route('metas.edit', $m) }}" class="text-yellow-600">Editar</a>
            <form action="{{ route('metas.destroy', $m) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">@csrf @method('DELETE')<button class="text-red-600">Eliminar</button></form>
        </td></tr>
        @endforeach
        </tbody>
    </table></div>
</div>
</x-app-layout>