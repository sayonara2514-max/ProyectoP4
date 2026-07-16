<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nuevo Objetivo Estrategico</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <form method="POST" action="{{ route('objetivos.store') }}" class="space-y-4">
        @csrf
        <div><label class="block text-sm font-medium">Codigo</label><input name="codigo" value="{{ old('codigo') }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Descripcion</label><textarea name="descripcion" class="w-full border rounded p-2" required>{{ old('descripcion') }}</textarea></div>
        <div><label class="block text-sm font-medium">Plan</label>
            <select name="plan_id" class="w-full border rounded p-2" required>
                <option value="">Seleccione...</option>
                @foreach($planes as $p)<option value="{{ $p->id }}" {{ old('plan_id')==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">ODS Alineados (puede seleccionar varios)</label>
            <div class="bg-gray-50 rounded p-3 max-h-48 overflow-y-auto border">
                @foreach($ods as $o)
                <label class="flex items-center gap-2 mb-1 cursor-pointer">
                    <input type="checkbox" name="ods_ids[]" value="{{ $o->id }}" {{ in_array($o->id, old('ods_ids', [])) ? 'checked' : '' }}>
                    <span class="text-sm"><strong>{{ $o->codigo }}</strong> - {{ $o->nombre }}</span>
                </label>
                @endforeach
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">PDN Alineados (puede seleccionar varios)</label>
            <div class="bg-gray-50 rounded p-3 max-h-48 overflow-y-auto border">
                @foreach($pdns as $p)
                <label class="flex items-center gap-2 mb-1 cursor-pointer">
                    <input type="checkbox" name="pdn_ids[]" value="{{ $p->id }}" {{ in_array($p->id, old('pdn_ids', [])) ? 'checked' : '' }}>
                    <span class="text-sm"><strong>{{ $p->codigo }}</strong> - {{ $p->nombre }}</span>
                </label>
                @endforeach
            </div>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('objetivos.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>