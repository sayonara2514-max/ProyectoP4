<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">{{ $plan->nombre }}</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4 space-y-2">
    <p><strong>Entidad:</strong> {{ $plan->entidad->nombre ?? 'Sin entidad' }}</p>
    <p><strong>Período:</strong> {{ $plan->periodo_inicio }} → {{ $plan->periodo_fin }}</p>
    <p><strong>Estado:</strong> {{ $plan->estado }}</p>
    <h3 class="font-semibold mt-4">Programas</h3>
    <ul class="list-disc ml-4">@foreach($plan->programas as $pg)<li>{{ $pg->nombre }}</li>@endforeach</ul>
    <h3 class="font-semibold mt-4">Objetivos Estratégicos</h3>
    <ul class="list-disc ml-4">@foreach($plan->objetivosEstrategicos as $o)<li>{{ $o->codigo }} – {{ $o->descripcion }}</li>@endforeach</ul>
    <a href="{{ route('planes.index') }}" class="mt-4 inline-block text-blue-600">← Volver</a>
</div>
</x-app-layout>