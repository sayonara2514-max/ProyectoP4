<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Reportes</h2></x-slot>
<div class="py-6 max-w-4xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="font-bold text-gray-800 mb-2">Reporte de Planes</h3>
            <p class="text-sm text-gray-500 mb-4">Lista de todos los planes institucionales con su estado y entidad.</p>
            <div class="flex gap-2">
                <a href="{{ route('reportes.planes.pdf') }}" class="bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700">Descargar PDF</a>
                <a href="{{ route('reportes.planes.csv') }}" class="bg-green-600 text-white px-4 py-2 rounded text-sm hover:bg-green-700">Descargar CSV</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="font-bold text-gray-800 mb-2">Reporte de Proyectos</h3>
            <p class="text-sm text-gray-500 mb-4">Lista de proyectos de inversion con presupuesto y estado.</p>
            <div class="flex gap-2">
                <a href="{{ route('reportes.proyectos.pdf') }}" class="bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700">Descargar PDF</a>
                <a href="{{ route('reportes.proyectos.csv') }}" class="bg-green-600 text-white px-4 py-2 rounded text-sm hover:bg-green-700">Descargar CSV</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="font-bold text-gray-800 mb-2">Reporte de Objetivos Estrategicos</h3>
            <p class="text-sm text-gray-500 mb-4">Objetivos con alineacion a ODS y PDN.</p>
            <div class="flex gap-2">
                <a href="{{ route('reportes.objetivos.pdf') }}" class="bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700">Descargar PDF</a>
                <a href="{{ route('reportes.objetivos.csv') }}" class="bg-green-600 text-white px-4 py-2 rounded text-sm hover:bg-green-700">Descargar CSV</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="font-bold text-gray-800 mb-2">Reporte de ODS</h3>
            <p class="text-sm text-gray-500 mb-4">Objetivos de Desarrollo Sostenible con metas e indicadores.</p>
            <div class="flex gap-2">
                <a href="{{ route('reportes.ods.pdf') }}" class="bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700">Descargar PDF</a>
                <a href="{{ route('reportes.ods.csv') }}" class="bg-green-600 text-white px-4 py-2 rounded text-sm hover:bg-green-700">Descargar CSV</a>
            </div>
        </div>

    </div>
</div>
</x-app-layout>
