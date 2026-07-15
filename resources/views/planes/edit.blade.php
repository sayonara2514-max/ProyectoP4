<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Plan</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
    <form method="POST" action="{{ route('planes.update', $plan->id) }}" class="space-y-4">
        @csrf @method('PUT')
        <div><label class="block text-sm font-medium">Nombre</label><input name="nombre" value="{{ old('nombre', $plan->nombre) }}" class="w-full border rounded p-2" required></div>
        <div><label class="block text-sm font-medium">Entidad</label>
            <select name="entidad_id" class="w-full border rounded p-2">
                @foreach($entidades as $e)
                    <option value="{{ $e->id }}" {{ $plan->entidad_id==$e->id?'selected':'' }}>{{ $e->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-sm font-medium">Inicio</label><input type="date" name="periodo_inicio" value="{{ old('periodo_inicio', $plan->periodo_inicio) }}" class="w-full border rounded p-2"></div>
            <div><label class="block text-sm font-medium">Fin</label><input type="date" name="periodo_fin" value="{{ old('periodo_fin', $plan->periodo_fin) }}" class="w-full border rounded p-2"></div>
        </div>
        <div class="bg-gray-50 rounded p-3">
            <p class="text-xs text-gray-500 uppercase font-semibold">Estado actual</p>
            <p class="font-medium mt-1">
                @if($plan->estado === 'formulado')
                    <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">Formulado</span>
                @elseif($plan->estado === 'en_revision')
                    <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-800">En Revision</span>
                @else
                    <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Aprobado</span>
                @endif
            </p>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('planes.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
</x-app-layout>