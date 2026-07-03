<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nuevo Indicador</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
    
    <form method="POST" action="{{ route('indicadores.store') }}" class="space-y-4">
        @csrf
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre') }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Meta</label>
            <select name="meta_id" class="w-full border rounded p-2" required>
                <option value="">Seleccione...</option>
                @foreach($metas as $m)<option value="{{ $m->id }}" {{ old('meta_id')==$m->id?'selected':'' }}>{{ $m->descripcion }}</option>@endforeach
            </select></div>
        <div><label class="block text-sm font-medium">Fórmula</label><input name="formula" value="{{ old('formula') }}" class="w-full border rounded p-2"></div>
        <div><label class="block text-sm font-medium">Unidad de Medida</label><input name="unidad_medida" value="{{ old('unidad_medida') }}" class="w-full border rounded p-2"></div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('indicadores.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>