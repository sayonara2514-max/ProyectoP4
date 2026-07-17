<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Objetivo Estrategico</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <form method="POST" action="{{ route('objetivos.update', $objetivo->id) }}" class="space-y-4">
        @csrf @method('PUT')
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Datos del Objetivo Estrategico</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Codigo</label><input name="codigo" value="{{ old('codigo', $objetivo->codigo) }}" class="w-full border rounded p-2" required></div>
                <div><label class="block text-sm font-medium">Entidad</label>
                    <select name="entidad_id" class="w-full border rounded p-2" required>
                        @foreach($entidades as $e)<option value="{{ $e->id }}" {{ $objetivo->entidad_id==$e->id?'selected':'' }}>{{ $e->nombre }}</option>@endforeach
                    </select>
                </div>
            </div>
            <div><label class="block text-sm font-medium">Descripcion del Objetivo</label><textarea name="descripcion" rows="4" class="w-full border rounded p-2" required>{{ old('descripcion', $objetivo->descripcion) }}</textarea></div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Estado</label>
                    <select name="estado" class="w-full border rounded p-2">
                        <option value="Activo" {{ $objetivo->estado==='Activo'?'selected':'' }}>Activo</option>
                        <option value="Inactivo" {{ $objetivo->estado==='Inactivo'?'selected':'' }}>Inactivo</option>
                    </select>
                </div>
                <div><label class="block text-sm font-medium">Fecha de Registro</label><input type="date" name="fecha_registro" value="{{ old('fecha_registro', $objetivo->fecha_registro) }}" class="w-full border rounded p-2"></div>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Actualizar</button>
            <a href="{{ route('objetivos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>