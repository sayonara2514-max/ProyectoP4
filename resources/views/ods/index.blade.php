<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Catalogo de Alineacion Estrategica</h2></x-slot>
<div class="py-6">
<div class="grid grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-green-600">
        <p class="text-2xl font-bold text-green-700">{{ $ods->count() }}</p>
        <p class="text-xs text-gray-500 mt-1">Total ODS</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-green-400">
        <p class="text-2xl font-bold text-green-600">{{ $ods->sum('metas_count') }}</p>
        <p class="text-xs text-gray-500 mt-1">Total Metas ODS</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-teal-500">
        <p class="text-2xl font-bold text-teal-600">{{ $ods->sum(fn($o) => $o->metas->sum(fn($m) => $m->indicadores->count())) }}</p>
        <p class="text-xs text-gray-500 mt-1">Total Indicadores</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-600">
        <p class="text-2xl font-bold text-blue-700">{{ $pdns->filter(fn($p) => str_starts_with($p->codigo, 'EJE') && !str_contains($p->codigo, '-'))->count() }}</p>
        <p class="text-xs text-gray-500 mt-1">Ejes PND</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4 text-center border-l-4 border-blue-400">
        <p class="text-2xl font-bold text-blue-600">{{ $pdns->filter(fn($p) => str_contains($p->codigo, '-'))->count() }}</p>
        <p class="text-xs text-gray-500 mt-1">Objetivos PND</p>
    </div>
</div>

    <!-- Tabs -->
    <div class="flex gap-2 mb-6 border-b">
        <button onclick="showTab('ods')" id="tab-ods" class="px-4 py-2 text-sm font-medium border-b-2 border-blue-700 text-blue-700">ODS - Objetivos de Desarrollo Sostenible</button>
        <button onclick="showTab('pdn')" id="tab-pdn" class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-700">PDN - Plan Nacional de Desarrollo</button>
    </div>

    <!-- ODS Tab -->
    <div id="content-ods">
        <p class="text-sm text-gray-500 mb-4">Los 17 Objetivos de Desarrollo Sostenible de la ONU — Agenda 2030</p>
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-green-700 text-white">
                        <th class="p-3 text-left">ODS</th>
                        <th class="p-3 text-left">Nombre</th>
                        <th class="p-3 text-left">Descripcion</th>
                        <th class="p-3 text-center">Metas</th>
                        <th class="p-3 text-left">Accion</th>
                        <th class="p-3 text-center">Indicadores</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ods as $o)
                <tr class="border-b hover:bg-green-50 transition">
                    <td class="p-3">
                        <span class="bg-green-600 text-white text-sm font-bold rounded-full w-9 h-9 flex items-center justify-center">{{ substr($o->codigo, 3) }}</span>
                    </td>
                    <td class="p-3 font-semibold text-gray-800">{{ $o->nombre }}</td>
                    <td class="p-3 text-xs text-gray-500">{{ Str::limit($o->descripcion, 80) }}</td>
                    <td class="p-3 text-center">
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-semibold">{{ $o->metas_count }}</span>
                    </td>
                    <td class="p-3">
                        <a href="{{ route('ods.show', $o) }}" class="text-green-600 text-xs hover:underline">Ver metas</a>
                    </td>
                    <td class="p-3 text-center">
                        <span class="bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded font-semibold">{{ $o->metas->sum(fn($m) => $m->indicadores->count()) }}</span>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- PDN Tab -->
    <div id="content-pdn" class="hidden">
        <p class="text-sm text-gray-500 mb-4">Plan Nacional de Desarrollo "Ecuador No Se Detiene" 2025-2029</p>
        @php
            $ejes = $pdns->filter(fn($p) => str_starts_with($p->codigo, 'EJE') && !str_contains($p->codigo, '-'));
        @endphp
        <div class="space-y-4">
            @foreach($ejes as $eje)
            @php
                $objetivos = $pdns->filter(fn($p) => str_starts_with($p->codigo, $eje->codigo.'-'));
            @endphp
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="bg-blue-700 text-white p-4 flex justify-between items-center">
                    <div>
                        <p class="font-mono text-xs opacity-75">{{ $eje->codigo }}</p>
                        <h3 class="font-bold">{{ $eje->nombre }}</h3>
                    </div>
                    <span class="bg-white text-blue-700 text-xs font-bold px-3 py-1 rounded-full">{{ $objetivos->count() }} objetivos</span>
                </div>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-blue-50">
                            <th class="p-2 text-left text-xs text-gray-500 uppercase">Codigo</th>
                            <th class="p-2 text-left text-xs text-gray-500 uppercase">Objetivo</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($objetivos as $obj)
                    <tr class="border-b hover:bg-blue-50 transition">
                        <td class="p-3 font-mono text-xs text-blue-700 font-semibold whitespace-nowrap">{{ $obj->codigo }}</td>
                        <td class="p-3 text-gray-800">{{ $obj->nombre }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
function showTab(tab) {
    document.getElementById('content-ods').classList.add('hidden');
    document.getElementById('content-pdn').classList.add('hidden');
    document.getElementById('tab-ods').classList.remove('border-b-2', 'border-blue-700', 'text-blue-700');
    document.getElementById('tab-pdn').classList.remove('border-b-2', 'border-blue-700', 'text-blue-700');
    document.getElementById('tab-ods').classList.add('text-gray-500');
    document.getElementById('tab-pdn').classList.add('text-gray-500');
    document.getElementById('content-' + tab).classList.remove('hidden');
    document.getElementById('tab-' + tab).classList.add('border-b-2', 'border-blue-700', 'text-blue-700');
    document.getElementById('tab-' + tab).classList.remove('text-gray-500');
}
</script>
</x-app-layout>