<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Objetivos Estratégicos</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
    
    <a href="{{ route('objetivos.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Nuevo Objetivo</a>
    <table class="w-full border text-sm">
        <thead class="bg-gray-100"><tr><th class="p-2 border">Código</th><th class="p-2 border">Descripción</th><th class="p-2 border">Plan</th><th class="p-2 border">Acciones</th></tr></thead>
        <tbody>
        @foreach($objetivos as $o)
        <tr><td class="p-2 border">{{ $o->codigo }}</td><td class="p-2 border">{{ $o->descripcion }}</td><td class="p-2 border">{{ $o->plan->nombre }}</td>
        <td class="p-2 border space-x-2">
            <a href="{{ route('objetivos.show', $o) }}" class="text-blue-600">Ver</a>
            <a href="{{ route('objetivos.edit', $o) }}" class="text-yellow-600">Editar</a>
            <form action="{{ route('objetivos.destroy', $o) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">@csrf @method('DELETE')<button class="text-red-600">Eliminar</button></form>
        </td></tr>
        @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>