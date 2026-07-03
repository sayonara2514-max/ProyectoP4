<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Programa</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
  
    <form method="POST" action="{{ route('programas.update', $programa) }}" class="space-y-4">
        @csrf @method('PUT')
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre', $programa->nombre) }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Plan</label>
            <select name="plan_id" class="w-full border rounded p-2">
                @foreach($planes as $p)<option value="{{ $p->id }}" {{ $programa->plan_id==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
            </select></div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('programas.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>