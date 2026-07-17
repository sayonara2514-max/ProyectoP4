<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Gestion de Roles del Sistema</h2></x-slot>
<div class="py-6">
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">Control de acceso basado en roles (RBAC) del sistema SIPeIP</p>
        <a href="{{ route('roles.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm font-medium">+ Nuevo Rol</a>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-600">
            <p class="text-2xl font-bold text-blue-700">{{ count($roles) }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Roles</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-green-500">
            <p class="text-2xl font-bold text-green-600">{{ \App\Models\User::count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Usuarios Registrados</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-blue-700 text-white">
                    <th class="p-3 text-left">Rol</th>
                    <th class="p-3 text-left">Descripcion</th>
                    <th class="p-3 text-center">Usuarios</th>
                    <th class="p-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($roles as $rol)
            <tr class="border-b hover:bg-blue-50 transition">
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded font-semibold">{{ $rol->nombre }}</span>
                </td>
                <td class="p-3 text-gray-600">{{ $rol->descripcion }}</td>
                <td class="p-3 text-center">
                    <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded font-semibold">{{ $rol->usuarios->count() }}</span>
                </td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('roles.edit', $rol) }}" class="text-yellow-600 text-xs hover:underline">Editar</a>
                    <form action="{{ route('roles.destroy', $rol) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar?')">@csrf @method('DELETE')<button class="text-red-600 text-xs hover:underline">Eliminar</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="p-6 text-center text-gray-400">No hay roles registrados</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>