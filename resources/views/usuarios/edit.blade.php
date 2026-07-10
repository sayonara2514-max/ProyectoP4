<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Asignar Rol a {{ $usuario->name }}</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-medium">Email</label>
            <input value="{{ $usuario->email }}" class="w-full border rounded p-2 bg-gray-100" disabled>
        </div>
        <div>
            <label class="block text-sm font-medium">Rol</label>
            <select name="rol_id" class="w-full border rounded p-2">
                <option value="">Sin rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">Guardar</button>
        <a href="{{ route('usuarios.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>