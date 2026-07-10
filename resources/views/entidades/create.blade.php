<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nueva Entidad</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
   
    <form method="POST" action="{{ route('entidades.store') }}" class="space-y-4">
        @csrf
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre') }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Misión</label><textarea name="mision" class="w-full border rounded p-2">{{ old('mision') }}</textarea></div>
        <div><label class="block text-sm font-medium">Estructura Organizacional</label><textarea name="estructura" class="w-full border rounded p-2">{{ old('estructura') }}</textarea></div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('entidades.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>