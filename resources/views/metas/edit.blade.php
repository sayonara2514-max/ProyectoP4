<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Meta</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
   
    <form method="POST" action="{{ route('metas.update', $meta) }}" class="space-y-4">
        @csrf @method('PUT')
        <div><label class="block text-sm font-medium">Descripción</label><textarea name="descripcion" class="w-full border rounded p-2" required>{{ old('descripcion', $meta->descripcion) }}</textarea></div>
        <div><label class="block text-sm font-medium">Proyecto</label>
            <select name="proyecto_id" class="w-full border rounded p-2">
                @foreach($proyectos as $p)<option value="{{ $p->id }}" {{ $meta->proyecto_id==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
            </select></div>
        <div><label class="block text-sm font-medium">Valor Objetivo</label><input type="number" step="0.01" name="valor_objetivo" value="{{ old('valor_objetivo', $meta->valor_objetivo) }}" class="w-full border rounded p-2"></div>
        <div><label class="block text-sm font-medium">Período</label><input name="periodo" value="{{ old('periodo', $meta->periodo) }}" class="w-full border rounded p-2"></div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('metas.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>