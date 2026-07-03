<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">{{ $programa->nombre }}</h2></x-slot>
<div class="py-6 max-w-xl mx-auto px-4">
    <p><strong>Plan:</strong> {{ $programa->plan->nombre }}</p>
    <a href="{{ route('programas.index') }}" class="mt-4 inline-block text-blue-600">← Volver</a>
</div>
</x-app-layout>