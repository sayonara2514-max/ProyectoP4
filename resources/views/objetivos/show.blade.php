<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Objetivo Estrategico</h2></x-slot>
<div class="py-6 max-w-4xl mx-auto px-4">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="border-b pb-4">
            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded font-semibold">{{ $objetivo->codigo }}</span>
            <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $objetivo->descripcion }}</h3>
            <p class="text-sm text-gray-500 mt-1">Plan: <strong>{{ $objetivo->plan->nombre }}</strong></p>
        </div>
        <div>
            <h4 class="font-semibold text-gray-700 mb-3">ODS Alineados</h4>
            @forelse($objetivo->ods as $o)
            <div class="bg-green-50 rounded-lg p-4 mb-3 border border-green-200">
                <p class="font-semibold text-green-800">{{ $o->codigo }} - {{ $o->nombre }}</p>
                <p class="text-xs text-gray-600 mt-1">{{ $o->descripcion }}</p>
                @if($o->metas->count() > 0)
                <div class="mt-3 ml-3">
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-2">Metas</p>
                    @foreach($o->metas as $meta)
                    <div class="bg-white rounded p-2 mb-2 border">
                        <p class="text-xs font-semibold text-gray-700">Meta {{ $meta->codigo }}: {{ $meta->descripcion }}</p>
                        @if($meta->indicadores->count() > 0)
                        <div class="ml-3 mt-1">
                            @foreach($meta->indicadores as $ind)
                            <p class="text-xs text-blue-700">▸ {{ $ind->codigo }}: {{ $ind->descripcion }}</p>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @empty
                <p class="text-gray-500 text-sm">Sin ODS alineados</p>
            @endforelse
        </div>
        <div>
            <h4 class="font-semibold text-gray-700 mb-3">PDN Alineados</h4>
            @forelse($objetivo->pdns as $p)
            <div class="bg-purple-50 rounded p-3 mb-2 border border-purple-200">
                <p class="font-semibold text-purple-800">{{ $p->codigo }} - {{ $p->nombre }}</p>
            </div>
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