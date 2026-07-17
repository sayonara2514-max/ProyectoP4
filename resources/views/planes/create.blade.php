<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nuevo Plan</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <form method="POST" action="{{ route('planes.store') }}" class="space-y-4">
        @csrf
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Informacion General</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Codigo del Plan</label><input name="codigo" value="{{ old('codigo') }}" class="w-full border rounded p-2" required></div>
                <div><label class="block text-sm font-medium">Nombre del Plan</label><input name="nombre" value="{{ old('nombre') }}" class="w-full border rounded p-2" required></div>
            </div>
            <div><label class="block text-sm font-medium">Descripcion</label><textarea name="descripcion" rows="3" class="w-full border rounded p-2">{{ old('descripcion') }}</textarea></div>
            <div><label class="block text-sm font-medium">Entidad</label>
                <select name="entidad_id" class="w-full border rounded p-2" required>
                    <option value="">Seleccione...</option>
                    @foreach($entidades as $e)<option value="{{ $e->id }}" {{ old('entidad_id')==$e->id?'selected':'' }}>{{ $e->nombre }}</option>@endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Fecha de Inicio</label><input type="date" name="periodo_inicio" value="{{ old('periodo_inicio') }}" class="w-full border rounded p-2" required></div>
                <div><label class="block text-sm font-medium">Fecha de Fin</label><input type="date" name="periodo_fin" value="{{ old('periodo_fin') }}" class="w-full border rounded p-2" required></div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Alineacion Estrategica</h3>
            <div>
                <label class="block text-sm font-medium mb-2">Objetivos Estrategicos</label>
                <div class="bg-gray-50 rounded p-3 max-h-40 overflow-y-auto border">
                    @if($objetivos->count() > 0)
                        @foreach($objetivos as $o)
                        <label class="flex items-center gap-2 mb-1 cursor-pointer">
                            <input type="checkbox" name="objetivo_ids[]" value="{{ $o->id }}" {{ in_array($o->id, old('objetivo_ids', [])) ? 'checked' : '' }}>
                            <span class="text-sm"><strong>{{ $o->codigo }}</strong> - {{ $o->descripcion }}</span>
                        </label>
                        @endforeach
                    @else
                        <p class="text-sm text-gray-500">No hay objetivos estrategicos. Cree primero un objetivo.</p>
                    @endif
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">ODS Alineados</label>
                <div class="bg-gray-50 rounded p-3 max-h-40 overflow-y-auto border">
                    @foreach($ods as $o)
                    <label class="flex items-center gap-2 mb-1 cursor-pointer">
                        <input type="checkbox" name="ods_ids[]" value="{{ $o->id }}" {{ in_array($o->id, old('ods_ids', [])) ? 'checked' : '' }}>
                        <span class="text-sm"><strong>{{ $o->codigo }}</strong> - {{ $o->nombre }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">PDN Alineados</label>
                <div class="bg-gray-50 rounded p-3 max-h-40 overflow-y-auto border">
                    @foreach($pdns as $p)
                    <label class="flex items-center gap-2 mb-1 cursor-pointer">
                        <input type="checkbox" name="pdn_ids[]" value="{{ $p->id }}" {{ in_array($p->id, old('pdn_ids', [])) ? 'checked' : '' }}>
                        <span class="text-sm"><strong>{{ $p->codigo }}</strong> - {{ $p->nombre }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex gap-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('planes.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>