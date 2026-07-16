<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">{{ $ods->codigo }} - {{ $ods->nombre }}</h2></x-slot>
<div class="py-6 max-w-4xl mx-auto px-4">
    <div class="bg-white rounded-lg shadow p-6 mb-4">
        <p class="text-gray-600">{{ $ods->descripcion }}</p>
    </div>
    @foreach($ods->metas as $meta)
    <div class="bg-white rounded-lg shadow p-4 mb-3">
        <p class="font-semibold text-gray-800">Meta {{ $meta->codigo }}</p>
        <p class="text-gray-600 text-sm mt-1">{{ $meta->descripcion }}</p>
        @if($meta->indicadores->count() > 0)
        <div class="mt-3 ml-4">
            <p class="text-xs text-gray-500 uppercase font-semibold mb-2">Indicadores</p>
            @foreach($meta->indicadores as $ind)
            <div class="bg-gray-50 rounded p-2 mb-1">
                <p class="text-xs font-semibold text-blue-700">{{ $ind->codigo }}</p>
                <p class="text-xs text-gray-600">{{ $ind->descripcion }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    @endforeach
    <a href="{{ route('ods.index') }}" class="inline-block mt-2 text-blue-600">← Volver a ODS</a>
</div>
</x-app-layout>
