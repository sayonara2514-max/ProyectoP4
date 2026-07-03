<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Registro de Auditoría</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
    <table class="w-full border text-sm">
        <thead class="bg-gray-100"><tr><th class="p-2 border">Fecha/Hora</th><th class="p-2 border">Usuario</th><th class="p-2 border">Módulo</th><th class="p-2 border">Acción</th></tr></thead>
        <tbody>
        @foreach($auditorias as $a)
        <tr><td class="p-2 border">{{ $a->fecha_hora }}</td><td class="p-2 border">{{ $a->usuario->name }}</td>
        <td class="p-2 border">{{ $a->modulo }}</td><td class="p-2 border">{{ $a->accion }}</td></tr>
        @endforeach
        </tbody>
    </table>
    {{ $auditorias->links() }}
</div>
</x-app-layout>