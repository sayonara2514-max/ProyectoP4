<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Indicadores</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
    
    <a href="{{ route('indicadores.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Nuevo Indicador</a>
    <div class="bg-white rounded-lg shadow overflow-hidden"><table class="w-full text-sm">
        <thead class="bg-gray-500 text-white"><tr><th class="p-2 border">Nombre</th><th class="p-2 border">Meta</th><th class="p-2 border">Fórmula</th><th class="p-2 border">Unidad</th><th class="p-2 border">Acciones</th></tr></thead>
        <tbody>
        @foreach($indicadores as $i)
        <tr><td class="p-2 border">{{ $i->nombre }}</td><td class="p-2 border">{{ $i->meta->descripcion }}</td>
        <td class="p-2 border">{{ $i->formula }}</td><td class="p-2 border">{{ $i->unidad_medida }}</td>
        <td class="p-2 border space-x-2">
            <a href="{{ route('indicadores.edit', $i) }}" class="text-yellow-600">Editar</a>
            <form action="{{ route('indicadores.destroy', $i) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">@csrf @method('DELETE')<button class="text-red-600">Eliminar</button></form>
        </td></tr>
        @endforeach
        </tbody>
    </table></div>
</div>
</x-app-layout>