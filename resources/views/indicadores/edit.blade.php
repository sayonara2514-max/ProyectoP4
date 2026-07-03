<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Indicador</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
   
    <form method="POST" action="{{ route('indicadores.update', $indicador) }}" class="space-y-4">
        @csrf @method('PUT')
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre', $indicador->nombre) }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Meta</label>
            <select name="meta_id" class="w-full border rounded p-2">
                @foreach($metas as $m)<option value="{{ $m->id }}" {{ $indicador->meta_id==$m->id?'selected':'' }}>{{ $m->descripcion }}</option>@endforeach
            </select></div>
        <div><label class="block text-sm font-medium">Fórmula</label><input name="formula" value="{{ old('formula', $indicador->formula) }}" class="w-full border rounded p-2"></div>
        <div><label class="block text-sm font-medium">Unidad de Medida</label><input name="unidad_medida" value="{{ old('unidad_medida', $indicador->unidad_medida) }}" class="w-full border rounded p-2"></div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('indicadores.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>