<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Proyecto</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
    
    <form method="POST" action="{{ route('proyectos.update', $proyecto) }}" class="space-y-4">
        @csrf @method('PUT')
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre', $proyecto->nombre) }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Programa</label>
            <select name="programa_id" class="w-full border rounded p-2">
                @foreach($programas as $p)<option value="{{ $p->id }}" {{ $proyecto->programa_id==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
            </select></div>
        <div><label class="block text-sm font-medium">Presupuesto</label><input type="number" step="0.01" name="presupuesto" value="{{ old('presupuesto', $proyecto->presupuesto) }}" class="w-full border rounded p-2"></div>
        <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-sm font-medium">Fecha Inicio</label><input type="date" name="fecha_inicio" value="{{ old('fecha_inicio', $proyecto->fecha_inicio) }}" class="w-full border rounded p-2"></div>
            <div><label class="block text-sm font-medium">Fecha Fin</label><input type="date" name="fecha_fin" value="{{ old('fecha_fin', $proyecto->fecha_fin) }}" class="w-full border rounded p-2"></div>
        </div>
        <div><label class="block text-sm font-medium">Estado</label>
            <select name="estado" class="w-full border rounded p-2">
                @foreach(['formulacion','ejecucion','cerrado'] as $s)<option value="{{ $s }}" {{ $proyecto->estado===$s?'selected':'' }}>{{ ucfirst($s) }}</option>@endforeach
            </select></div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('proyectos.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>