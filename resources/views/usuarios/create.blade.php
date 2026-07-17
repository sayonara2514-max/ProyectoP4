<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nuevo Usuario</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
    <form method="POST" action="{{ route('usuarios.store') }}" class="space-y-4">
        @csrf
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Datos del Usuario</h3>
            <div><label class="block text-sm font-medium">Nombre completo</label><input name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required></div>
            <div><label class="block text-sm font-medium">Correo electrónico</label><input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded p-2" required></div>
            <div><label class="block text-sm font-medium">Contraseña</label><input type="password" name="password" class="w-full border rounded p-2" required></div>
            <div><label class="block text-sm font-medium">Confirmar contraseña</label><input type="password" name="password_confirmation" class="w-full border rounded p-2" required></div>
            <div><label class="block text-sm font-medium">Rol</label>
                <select name="rol_id" class="w-full border rounded p-2" required>
                    <option value="">Seleccione un rol...</option>
                    @foreach($roles as $rol)
                    <option value="{{ $rol->id }}" {{ old('rol_id')==$rol->id?'selected':'' }}>{{ $rol->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Crear Usuario</button>
            <a href="{{ route('usuarios.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>
