<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Entidad</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
    <form method="POST" action="{{ route('entidades.update', $entidad->id) }}" class="space-y-4">
        @csrf @method('PUT')
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre', $entidad->nombre) }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Mision</label><textarea name="mision" class="w-full border rounded p-2">{{ old('mision', $entidad->mision) }}</textarea></div>
        <div><label class="block text-sm font-medium">Estructura Organizacional</label><textarea name="estructura" class="w-full border rounded p-2">{{ old('estructura', $entidad->estructura) }}</textarea></div>
        <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">Actualizar</button>
        <a href="{{ route('entidades.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>