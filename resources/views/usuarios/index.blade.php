<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Gestión de Usuarios</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
    <div class="bg-white rounded-lg shadow overflow-hidden"><table class="w-full text-sm">
        <thead class="bg-gray-500 text-white">
            <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nombre</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Rol</th>
                <th class="p-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $u)
        <tr>
            <td class="p-2 border">{{ $u->id }}</td>
            <td class="p-2 border">{{ $u->name }}</td>
            <td class="p-2 border">{{ $u->email }}</td>
            <td class="p-2 border">{{ $u->rol->nombre ?? 'Sin rol' }}</td>
            <td class="p-2 border">
                <a href="{{ route('usuarios.edit', $u->id) }}" class="text-yellow-600">Asignar Rol</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table></div>
</div>
</x-app-layout>