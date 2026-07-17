<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Gestion de Usuarios del Sistema</h2></x-slot>
<div class="py-6">
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">Administracion de usuarios y asignacion de roles de acceso</p>
        <a href="{{ route('usuarios.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm font-medium">+ Nuevo Usuario</a>
    </div>

    <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-600">
            <p class="text-2xl font-bold text-blue-700">{{ count($usuarios) }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Usuarios</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-green-500">
            <p class="text-2xl font-bold text-green-600">{{ collect($usuarios)->filter(fn($u) => $u->rol)->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Con Rol Asignado</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-red-400">
            <p class="text-2xl font-bold text-red-500">{{ collect($usuarios)->filter(fn($u) => !$u->rol)->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Sin Rol</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-blue-700 text-white">
                    <th class="p-3 text-left">Usuario</th>
                    <th class="p-3 text-left">Correo</th>
                    <th class="p-3 text-left">Rol Asignado</th>
                    <th class="p-3 text-left">Registro</th>
                    <th class="p-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($usuarios as $u)
            <tr class="border-b hover:bg-blue-50 transition">
                <td class="p-3">
                    <p class="font-semibold text-gray-800">{{ $u->name }}</p>
                </td>
                <td class="p-3 text-gray-600 text-xs">{{ $u->email }}</td>
                <td class="p-3">
                    @if($u->rol)
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded font-semibold">{{ $u->rol->nombre }}</span>
                    @else
                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Sin rol</span>
                    @endif
                </td>
                <td class="p-3 text-xs text-gray-400">{{ $u->created_at->format('d/m/Y') }}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('usuarios.edit', $u->id) }}" class="text-yellow-600 text-xs hover:underline">Asignar Rol</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="p-6 text-center text-gray-400">No hay usuarios registrados</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>