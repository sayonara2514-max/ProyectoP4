<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Roles</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
  
    <a href="{{ route('roles.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Nuevo Rol</a>
    <div class="bg-white rounded-lg shadow overflow-hidden"><table class="w-full text-sm">
        <thead class="bg-gray-500 text-white"><tr><th class="p-2 border">ID</th><th class="p-2 border">Nombre</th><th class="p-2 border">Descripción</th><th class="p-2 border">Acciones</th></tr></thead>
        <tbody>
        @foreach($roles as $rol)
        <tr><td class="p-2 border">{{ $rol->id }}</td><td class="p-2 border">{{ $rol->nombre }}</td><td class="p-2 border">{{ $rol->descripcion }}</td>
        <td class="p-2 border space-x-2">
            <a href="{{ route('roles.edit', $rol) }}" class="text-yellow-600">Editar</a>
            <form action="{{ route('roles.destroy', $rol) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">@csrf @method('DELETE')<button class="text-red-600">Eliminar</button></form>
        </td></tr>
        @endforeach
        </tbody>
    </table></div>
</div>
</x-app-layout>