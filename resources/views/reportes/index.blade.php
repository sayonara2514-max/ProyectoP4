<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Modulo de Reportes y Visualizacion</h2></x-slot>
<div class="py-6">
    <p class="text-sm text-gray-500 mb-6">Generacion de informes tecnicos exportables en formato PDF y CSV para control institucional y rendicion de cuentas</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
            <div class="border-l-4 border-blue-700 p-4">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-blue-700 text-2xl"></span>
                    <div>
                        <h3 class="font-bold text-gray-800">Reporte de Planes Institucionales</h3>
                        <p class="text-xs text-gray-500">Planes estrategicos con estado, entidad y periodo de vigencia</p>
                    </div>
                </div>
                <div class="flex gap-2 mt-3">
                    <a href="{{ route('reportes.planes.pdf') }}" class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900 flex items-center gap-1">
                        PDF
                    </a>
                    <a href="{{ route('reportes.planes.csv') }}" class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700 flex items-center gap-1">
                        CSV
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
            <div class="border-l-4 border-blue-700 p-4">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-blue-700 text-2xl"></span>
                    <div>
                        <h3 class="font-bold text-gray-800">Reporte de Proyectos de Inversion</h3>
                        <p class="text-xs text-gray-500">Proyectos con presupuesto, ejecucion financiera y estado de aprobacion</p>
                    </div>
                </div>
                <div class="flex gap-2 mt-3">
                    <a href="{{ route('reportes.proyectos.pdf') }}" class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900 flex items-center gap-1">
                        📄 PDF
                    </a>
                    <a href="{{ route('reportes.proyectos.csv') }}" class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700 flex items-center gap-1">
                         CSV
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
            <div class="border-l-4 border-blue-700 p-4">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-blue-700 text-2xl"></span>
                    <div>
                        <h3 class="font-bold text-gray-800">Reporte de Objetivos Estrategicos</h3>
                        <p class="text-xs text-gray-500">Objetivos institucionales con alineacion a ODS y Plan Nacional de Desarrollo</p>
                    </div>
                </div>
                <div class="flex gap-2 mt-3">
                    <a href="{{ route('reportes.objetivos.pdf') }}" class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900 flex items-center gap-1">
                        PDF
                    </a>
                    <a href="{{ route('reportes.objetivos.csv') }}" class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700 flex items-center gap-1">
                        CSV
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
            <div class="border-l-4 border-blue-700 p-4">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-blue-700 text-2xl"></span>
                    <div>
                        <h3 class="font-bold text-gray-800">Reporte de ODS - Agenda 2030</h3>
                        <p class="text-xs text-gray-500">Los 17 ODS con sus metas oficiales e indicadores de seguimiento</p>
                    </div>
                </div>
                <div class="flex gap-2 mt-3">
                    <a href="{{ route('reportes.ods.pdf') }}" class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900 flex items-center gap-1">
                         PDF
                    </a>
                    <a href="{{ route('reportes.ods.csv') }}" class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700 flex items-center gap-1">
                         CSV
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <p class="text-xs text-blue-700 font-semibold uppercase mb-1">Nota tecnica</p>
        <p class="text-xs text-gray-600">Los reportes PDF incluyen encabezado institucional con fecha de generacion. Los archivos CSV son compatibles con Microsoft Excel y Google Sheets para analisis adicional.</p>
    </div>
</div>
</x-app-layout>