<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Planes</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']))
    <a href="{{ route('planes.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Nuevo Plan</a>
    @endif
    <div class="bg-white rounded-lg shadow overflow-hidden mt-4">
        <table class="w-full text-sm">
            <thead class="bg-gray-500 text-white">
                <tr>
                    <th class="p-3 text-left">Nombre</th>
                    <th class="p-3 text-left">Entidad</th>
                    <th class="p-3 text-left">Periodo</th>
                    <th class="p-3 text-left">Estado</th>
                    <th class="p-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($planes as $p)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $p->nombre }}</td>
                <td class="p-3">{{ $p->entidad->nombre }}</td>
                <td class="p-3">{{ $p->periodo_inicio }} / {{ $p->periodo_fin }}</td>
                <td class="p-3">
                    @if($p->estado === 'formulado')
                        <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">Formulado</span>
                    @elseif($p->estado === 'en_revision')
                        <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-800">En Revision</span>
                    @else
                        <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Aprobado</span>
                    @endif
                </td>
                <td class="p-3 space-x-1">
                    <a href="{{ route('planes.show', $p) }}" class="text-blue-600 text-xs">Ver</a>

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Técnico de Planificación']) && $p->estado === 'formulado')
                        <a href="{{ route('planes.edit', $p) }}" class="text-yellow-600 text-xs">Editar</a>
                        <form action="{{ route('planes.enviarRevision', $p) }}" method="POST" class="inline">@csrf<button class="text-purple-600 text-xs">Enviar a Revision</button></form>
                    @endif

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Revisor Institucional']) && $p->estado === 'en_revision')
                        <form action="{{ route('planes.devolver', $p) }}" method="POST" class="inline">@csrf<button class="text-orange-600 text-xs">Devolver</button></form>
                    @endif

                    @if(in_array(auth()->user()->rol?->nombre, ['Administrador','Autoridad Validante']) && $p->estado === 'en_revision')
                        <form action="{{ route('planes.aprobar', $p) }}" method="POST" class="inline">@csrf<button class="text-green-600 text-xs">Aprobar</button></form>
                    @endif

                    @if(auth()->user()->rol?->nombre === 'Administrador' && $p->estado === 'formulado')
                        <form action="{{ route('planes.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar?')">@csrf @method('DELETE')<button class="text-red-600 text-xs">Eliminar</button></form>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $planes->links() }}
</div>
</x-app-layout>