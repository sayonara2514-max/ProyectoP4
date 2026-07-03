<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Entidades</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
   
    <a href="{{ route('entidades.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Nueva Entidad</a>
    <table class="w-full border text-sm">
        <thead class="bg-gray-100"><tr><th class="p-2 border">ID</th><th class="p-2 border">Nombre</th><th class="p-2 border">Acciones</th></tr></thead>
        <tbody>
        @foreach($entidades as $e)
        <tr><td class="p-2 border">{{ $e->id }}</td><td class="p-2 border">{{ $e->nombre }}</td>
        <td class="p-2 border space-x-2">
            <a href="{{ route('entidades.show', $e) }}" class="text-blue-600">Ver</a>
            <a href="{{ route('entidades.edit', $e) }}" class="text-yellow-600">Editar</a>
            <form action="{{ route('entidades.destroy', $e) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">@csrf @method('DELETE')<button class="text-red-600">Eliminar</button></form>
        </td></tr>
        @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>