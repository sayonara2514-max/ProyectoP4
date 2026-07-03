<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Proyectos</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">

    <a href="{{ route('proyectos.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Nuevo Proyecto</a>
    <table class="w-full border text-sm">
        <thead class="bg-gray-100"><tr><th class="p-2 border">Nombre</th><th class="p-2 border">Programa</th><th class="p-2 border">Presupuesto</th><th class="p-2 border">Estado</th><th class="p-2 border">Acciones</th></tr></thead>
        <tbody>
        @foreach($proyectos as $p)
        <tr><td class="p-2 border">{{ $p->nombre }}</td><td class="p-2 border">{{ $p->programa->nombre }}</td>
        <td class="p-2 border">$ {{ number_format($p->presupuesto,2) }}</td>
        <td class="p-2 border">{{ $p->estado }}</td>
        <td class="p-2 border space-x-2">
            <a href="{{ route('proyectos.show', $p) }}" class="text-blue-600">Ver</a>
            <a href="{{ route('proyectos.edit', $p) }}" class="text-yellow-600">Editar</a>
            <form action="{{ route('proyectos.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">@csrf @method('DELETE')<button class="text-red-600">Eliminar</button></form>
        </td></tr>
        @endforeach
        </tbody>
    </table>
    {{ $proyectos->links() }}
</div>
</x-app-layout>