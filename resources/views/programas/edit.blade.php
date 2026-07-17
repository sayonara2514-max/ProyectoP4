<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Programa</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <form method="POST" action="{{ route('programas.update', $programa) }}" class="space-y-4">
        @csrf @method('PUT')
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Informacion del Programa</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Codigo</label><input name="codigo" value="{{ old('codigo', $programa->codigo) }}" class="w-full border rounded p-2" required></div>
                <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre', $programa->nombre) }}" class="w-full border rounded p-2" required></div>
            </div>
            <div><label class="block text-sm font-medium">Descripcion</label><textarea name="descripcion" rows="3" class="w-full border rounded p-2">{{ old('descripcion', $programa->descripcion) }}</textarea></div>
            <div><label class="block text-sm font-medium">Plan</label>
                <select name="plan_id" class="w-full border rounded p-2">
                    @foreach($planes as $p)<option value="{{ $p->id }}" {{ $programa->plan_id==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
                </select>
            </div>
            <div><label class="block text-sm font-medium">Responsable</label><input name="responsable" value="{{ old('responsable', $programa->responsable) }}" class="w-full border rounded p-2"></div>
            <div><label class="block text-sm font-medium">Observaciones</label><textarea name="observaciones" rows="3" class="w-full border rounded p-2">{{ old('observaciones', $programa->observaciones) }}</textarea></div>
        </div>
        <div class="flex gap-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('programas.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>