<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Objetivos de Desarrollo Sostenible</h2></x-slot>
<div class="py-6 max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($ods as $o)
        <a href="{{ route('ods.show', $o) }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md">
            <div class="flex items-center gap-3">
                <span class="bg-green-600 text-white text-lg font-bold rounded-full w-10 h-10 flex items-center justify-center">{{ substr($o->codigo, 3) }}</span>
                <div>
                    <p class="font-semibold text-gray-800">{{ $o->nombre }}</p>
                    <p class="text-xs text-gray-500">{{ $o->metas_count }} metas</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
</x-app-layout>