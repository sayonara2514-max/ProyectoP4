<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Modulo de Reportes y Visualizacion</h2></x-slot>
<div class="py-6">
    <p class="text-sm text-gray-500 mb-6">Generacion de informes tecnicos en formato PDF y CSV para control y rendicion de cuentas</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="bg-blue-700 text-white p-4">
                <h3 class="font-bold text-lg">📋 Reporte de Planes</h3>
                <p class="text-xs opacity-80 mt-1">Planes institucionales con estado y entidad vinculada</p>
            </div>
            <div class="p-4 space-y-2">
                <a href="{{ route('reportes.planes.pdf') }}" class="flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm">
                    📄 Descargar PDF
                </a>
                <a href="{{ route('reportes.planes.csv') }}" class="flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                    📊 Descargar CSV
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="bg-purple-700 text-white p-4">
                <h3 class="font-bold text-lg">🏗️ Reporte de Proyectos</h3>
                <p class="text-xs opacity-80 mt-1">Proyectos de inversion con presupuesto y estado de ejecucion</p>
            </div>
            <div class="p-4 space-y-2">
                <a href="{{ route('reportes.proyectos.pdf') }}" class="flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm">
                    📄 Descargar PDF
                </a>
                <a href="{{ route('reportes.proyectos.csv') }}" class="flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                    📊 Descargar CSV
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="bg-teal-700 text-white p-4">
                <h3 class="font-bold text-lg">🎖️ Reporte de Objetivos Estrategicos</h3>
                <p class="text-xs opacity-80 mt-1">Objetivos institucionales con alineacion ODS y PDN</p>
            </div>
            <div class="p-4 space-y-2">
                <a href="{{ route('reportes.objetivos.pdf') }}" class="flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm">
                    📄 Descargar PDF
                </a>
                <a href="{{ route('reportes.objetivos.csv') }}" class="flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                    📊 Descargar CSV
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="bg-green-700 text-white p-4">
                <h3 class="font-bold text-lg">🌍 Reporte de ODS</h3>
                <p class="text-xs opacity-80 mt-1">Los 17 ODS con sus metas e indicadores oficiales</p>
            </div>
            <div class="p-4 space-y-2">
                <a href="{{ route('reportes.ods.pdf') }}" class="flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm">
                    📄 Descargar PDF
                </a>
                <a href="{{ route('reportes.ods.csv') }}" class="flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                    📊 Descargar CSV
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>