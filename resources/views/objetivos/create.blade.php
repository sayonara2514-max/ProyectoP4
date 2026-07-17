<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nuevo Objetivo Estrategico Institucional</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <form method="POST" action="{{ route('objetivos.store') }}" class="space-y-4">
        @csrf
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Datos del Objetivo Estrategico</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Codigo</label><input name="codigo" value="{{ old('codigo') }}" class="w-full border rounded p-2" required placeholder="Ej: OEI-001"></div>
                <div><label class="block text-sm font-medium">Entidad</label>
                    <select name="entidad_id" class="w-full border rounded p-2" required>
                        <option value="">Seleccione...</option>
                        @foreach($entidades as $e)<option value="{{ $e->id }}" {{ old('entidad_id')==$e->id?'selected':'' }}>{{ $e->nombre }}</option>@endforeach
                    </select>
                </div>
            </div>
            <div><label class="block text-sm font-medium">Descripcion del Objetivo</label><textarea name="descripcion" rows="4" class="w-full border rounded p-2" required placeholder="Describa el objetivo estrategico institucional...">{{ old('descripcion') }}</textarea></div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Estado</label>
                    <select name="estado" class="w-full border rounded p-2">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div><label class="block text-sm font-medium">Fecha de Registro</label><input type="date" name="fecha_registro" value="{{ old('fecha_registro', date('Y-m-d')) }}" class="w-full border rounded p-2"></div>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Guardar</button>
            <a href="{{ route('objetivos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>