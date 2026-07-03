<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nuevo Plan</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
  
    <form method="POST" action="{{ route('planes.store') }}" class="space-y-4">
        @csrf
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre') }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Entidad</label>
            <select name="entidad_id" class="w-full border rounded p-2" required>
                <option value="">Seleccione...</option>
                @foreach($entidades as $e)<option value="{{ $e->id }}" {{ old('entidad_id')==$e->id?'selected':'' }}>{{ $e->nombre }}</option>@endforeach
            </select></div>
        <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-sm font-medium">Inicio</label><input type="date" name="periodo_inicio" value="{{ old('periodo_inicio') }}" class="w-full border rounded p-2" required></div>
            <div><label class="block text-sm font-medium">Fin</label><input type="date" name="periodo_fin" value="{{ old('periodo_fin') }}" class="w-full border rounded p-2" required></div>
        </div>
        <div><label class="block text-sm font-medium">Estado</label>
            <select name="estado" class="w-full border rounded p-2">
                <option value="borrador">Borrador</option><option value="activo">Activo</option><option value="cerrado">Cerrado</option>
            </select></div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('planes.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>