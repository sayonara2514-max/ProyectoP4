<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nuevo Programa</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
 
    <form method="POST" action="{{ route('programas.store') }}" class="space-y-4">
        @csrf
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre') }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Plan</label>
            <select name="plan_id" class="w-full border rounded p-2" required>
                <option value="">Seleccione...</option>
                @foreach($planes as $p)<option value="{{ $p->id }}" {{ old('plan_id')==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
            </select></div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('programas.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>