<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">{{ $proyecto->nombre }}</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4 space-y-2">
    <p><strong>Programa:</strong> {{ $proyecto->programa->nombre }}</p>
    <p><strong>Presupuesto:</strong> $ {{ number_format($proyecto->presupuesto,2) }}</p>
    <p><strong>Período:</strong> {{ $proyecto->fecha_inicio }} → {{ $proyecto->fecha_fin }}</p>
    <p><strong>Estado:</strong> {{ $proyecto->estado }}</p>
    <h3 class="font-semibold mt-4">Metas</h3>
    <ul class="list-disc ml-4">@foreach($proyecto->metas as $m)<li>{{ $m->descripcion }} ({{ $m->periodo }})</li>@endforeach</ul>
    <a href="{{ route('proyectos.index') }}" class="mt-4 inline-block text-blue-600">← Volver</a>
</div>
</x-app-layout>