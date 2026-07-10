<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Detalle del Objetivo Estratégico</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="border-b pb-4">
            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded font-semibold">{{ $objetivo->codigo }}</span>
            <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $objetivo->descripcion }}</h3>
        </div>

        <div class="bg-gray-50 rounded p-4">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Plan</p>
            <p class="text-gray-800">{{ $objetivo->plan->nombre }}</p>
        </div>

        <div class="bg-gray-50 rounded p-4">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-2">ODS Alineados</p>
            @forelse($objetivo->ods as $o)
                <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $o->codigo }} — {{ $o->nombre }}</span>
            @empty
                <p class="text-gray-500 text-sm">Sin ODS alineados</p>
            @endforelse
        </div>

        <div class="bg-gray-50 rounded p-4">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-2">PDN Alineados</p>
            @forelse($objetivo->pdns as $p)
                <span class="inline-block bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $p->codigo }} — {{ $p->nombre }}</span>
            @empty
                <p class="text-gray-500 text-sm">Sin PDN alineados</p>
            @endforelse
        </div>

        <div class="flex gap-2 pt-2">
            <a href="{{ route('objetivos.edit', $objetivo->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
            <a href="{{ route('objetivos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
        </div>
    </div>
</div>
</x-app-layout>