<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Objetivo</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
   
    <form method="POST" action="{{ route('objetivos.update', $objetivo) }}" class="space-y-4">
        @csrf @method('PUT')
        <div><label class="block text-sm font-medium">Código</label><input name="codigo" value="{{ old('codigo', $objetivo->codigo) }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Descripción</label><textarea name="descripcion" class="w-full border rounded p-2" required>{{ old('descripcion', $objetivo->descripcion) }}</textarea></div>
        <div><label class="block text-sm font-medium">Plan</label>
            <select name="plan_id" class="w-full border rounded p-2">
                @foreach($planes as $p)<option value="{{ $p->id }}" {{ $objetivo->plan_id==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
            </select></div>
        <div><label class="block text-sm font-medium">ODS</label>
            <select name="ods_ids[]" multiple class="w-full border rounded p-2 h-32">
                @foreach($ods as $o)<option value="{{ $o->id }}" {{ $objetivo->ods->contains($o->id)?'selected':'' }}>{{ $o->codigo }} – {{ $o->nombre }}</option>@endforeach
            </select></div>
        <div><label class="block text-sm font-medium">PDN</label>
            <select name="pdn_ids[]" multiple class="w-full border rounded p-2 h-32">
                @foreach($pdns as $p)<option value="{{ $p->id }}" {{ $objetivo->pdns->contains($p->id)?'selected':'' }}>{{ $p->codigo }} – {{ $p->nombre }}</option>@endforeach
            </select></div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('objetivos.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>