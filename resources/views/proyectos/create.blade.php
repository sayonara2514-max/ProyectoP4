<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nuevo Proyecto</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
    <form method="POST" action="{{ route('proyectos.store') }}" class="space-y-4">
        @csrf
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre') }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Programa</label>
            <select name="programa_id" class="w-full border rounded p-2" required>
                <option value="">Seleccione...</option>
                @foreach($programas as $p)<option value="{{ $p->id }}" {{ old('programa_id')==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
            </select>
        </div>
        <div><label class="block text-sm font-medium">Presupuesto</label><input type="number" step="0.01" name="presupuesto" value="{{ old('presupuesto') }}" class="w-full border rounded p-2" required></div>
        <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-sm font-medium">Fecha Inicio</label><input type="date" name="fecha_inicio" value="{{ old('fecha_inicio') }}" class="w-full border rounded p-2" required></div>
            <div><label class="block text-sm font-medium">Fecha Fin</label><input type="date" name="fecha_fin" value="{{ old('fecha_fin') }}" class="w-full border rounded p-2" required></div>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('proyectos.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>