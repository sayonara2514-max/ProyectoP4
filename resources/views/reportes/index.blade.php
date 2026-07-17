<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Modulo de Reportes y Visualizacion</h2></x-slot>
<div class="py-6">
    <p class="text-sm text-gray-500 mb-6">Seleccione el tipo de reporte, aplique los filtros disponibles y descargue en el formato requerido.</p>

    <!-- PLANES -->
    <div class="bg-white rounded-lg shadow border border-gray-200 mb-4">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center cursor-pointer" onclick="toggleReporte('planes')">
            <div>
                <h4 class="font-semibold text-gray-800">Reporte de Planes Institucionales</h4>
                <p class="text-xs text-gray-500">Planes estrategicos con estado, entidad y periodo de vigencia</p>
            </div>
            <span class="text-gray-400 text-xs">▼ Filtros y descarga</span>
        </div>
        <div id="reporte-planes" class="p-4 bg-gray-50 hidden">
            <form action="{{ route('reportes.planes.pdf') }}" method="GET" class="flex gap-3 flex-wrap items-end mb-3">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Entidad</label>
                    <select name="entidad_id" class="border rounded p-1.5 text-sm">
                        <option value="">Todas</option>
                        @foreach($entidades as $e)<option value="{{ $e->id }}">{{ $e->nombre }}</option>@endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Estado</label>
                    <select name="estado" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="formulado">Formulado</option>
                        <option value="en_revision">En Revision</option>
                        <option value="validado">Validado</option>
                        <option value="aprobado">Aprobado</option>
                    </select>
                </div>
                <button class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900">Descargar PDF</button>
            </form>
            <form action="{{ route('reportes.planes.csv') }}" method="GET" class="flex gap-3 flex-wrap items-end">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Entidad</label>
                    <select name="entidad_id" class="border rounded p-1.5 text-sm">
                        <option value="">Todas</option>
                        @foreach($entidades as $e)<option value="{{ $e->id }}">{{ $e->nombre }}</option>@endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Estado</label>
                    <select name="estado" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="formulado">Formulado</option>
                        <option value="en_revision">En Revision</option>
                        <option value="validado">Validado</option>
                        <option value="aprobado">Aprobado</option>
                    </select>
                </div>
                <button class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700">Descargar CSV</button>
            </form>
        </div>
    </div>

    <!-- PROYECTOS -->
    <div class="bg-white rounded-lg shadow border border-gray-200 mb-4">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center cursor-pointer" onclick="toggleReporte('proyectos')">
            <div>
                <h4 class="font-semibold text-gray-800">Reporte de Proyectos de Inversion</h4>
                <p class="text-xs text-gray-500">Proyectos con presupuesto, ejecucion financiera y estado de aprobacion</p>
            </div>
            <span class="text-gray-400 text-xs">▼ Filtros y descarga</span>
        </div>
        <div id="reporte-proyectos" class="p-4 bg-gray-50 hidden">
            <form action="{{ route('reportes.proyectos.pdf') }}" method="GET" class="flex gap-3 flex-wrap items-end mb-3">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Estado</label>
                    <select name="estado" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="formulado">Formulado</option>
                        <option value="en_revision">En Revision</option>
                        <option value="validado">Validado</option>
                        <option value="aprobado">Aprobado</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Tipo</label>
                    <select name="tipo" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Inversion">Inversion</option>
                        <option value="Preinversion">Preinversion</option>
                        <option value="Estudio">Estudio</option>
                        <option value="Cooperacion">Cooperacion</option>
                    </select>
                </div>
                <button class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900">Descargar PDF</button>
            </form>
            <form action="{{ route('reportes.proyectos.csv') }}" method="GET" class="flex gap-3 flex-wrap items-end">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Estado</label>
                    <select name="estado" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="formulado">Formulado</option>
                        <option value="en_revision">En Revision</option>
                        <option value="validado">Validado</option>
                        <option value="aprobado">Aprobado</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Tipo</label>
                    <select name="tipo" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Inversion">Inversion</option>
                        <option value="Preinversion">Preinversion</option>
                        <option value="Estudio">Estudio</option>
                        <option value="Cooperacion">Cooperacion</option>
                    </select>
                </div>
                <button class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700">Descargar CSV</button>
            </form>
        </div>
    </div>

    <!-- OBJETIVOS -->
    <div class="bg-white rounded-lg shadow border border-gray-200 mb-4">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center cursor-pointer" onclick="toggleReporte('objetivos')">
            <div>
                <h4 class="font-semibold text-gray-800">Reporte de Objetivos Estrategicos Institucionales</h4>
                <p class="text-xs text-gray-500">OEI con entidad, estado y fecha de registro</p>
            </div>
            <span class="text-gray-400 text-xs">▼ Filtros y descarga</span>
        </div>
        <div id="reporte-objetivos" class="p-4 bg-gray-50 hidden">
            <form action="{{ route('reportes.objetivos.pdf') }}" method="GET" class="flex gap-3 flex-wrap items-end mb-3">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Entidad</label>
                    <select name="entidad_id" class="border rounded p-1.5 text-sm">
                        <option value="">Todas</option>
                        @foreach($entidades as $e)<option value="{{ $e->id }}">{{ $e->nombre }}</option>@endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Estado</label>
                    <select name="estado" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <button class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900">Descargar PDF</button>
            </form>
            <form action="{{ route('reportes.objetivos.csv') }}" method="GET" class="flex gap-3 flex-wrap items-end">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Entidad</label>
                    <select name="entidad_id" class="border rounded p-1.5 text-sm">
                        <option value="">Todas</option>
                        @foreach($entidades as $e)<option value="{{ $e->id }}">{{ $e->nombre }}</option>@endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Estado</label>
                    <select name="estado" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <button class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700">Descargar CSV</button>
            </form>
        </div>
    </div>

    <!-- ODS -->
    <div class="bg-white rounded-lg shadow border border-gray-200 mb-4">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center cursor-pointer" onclick="toggleReporte('ods')">
            <div>
                <h4 class="font-semibold text-gray-800">Reporte ODS - Agenda 2030</h4>
                <p class="text-xs text-gray-500">Los 17 ODS con metas oficiales e indicadores de seguimiento ONU</p>
            </div>
            <span class="text-gray-400 text-xs">▼ Descarga</span>
        </div>
        <div id="reporte-ods" class="p-4 bg-gray-50 hidden">
            <div class="flex gap-2">
                <a href="{{ route('reportes.ods.pdf') }}" class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900">Descargar PDF</a>
                <a href="{{ route('reportes.ods.csv') }}" class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700">Descargar CSV</a>
            </div>
        </div>
    </div>

    <!-- AUDITORIA -->
    <div class="bg-white rounded-lg shadow border border-gray-200 mb-4">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center cursor-pointer" onclick="toggleReporte('auditoria')">
            <div>
                <h4 class="font-semibold text-gray-800">Reporte de Auditoria y Trazabilidad</h4>
                <p class="text-xs text-gray-500">Registro de acciones por usuario — creacion, modificacion y eliminacion</p>
            </div>
            <span class="text-gray-400 text-xs">▼ Filtros y descarga</span>
        </div>
        <div id="reporte-auditoria" class="p-4 bg-gray-50 hidden">
            <form action="{{ route('reportes.auditoria.pdf') }}" method="GET" class="flex gap-3 flex-wrap items-end mb-3">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Modulo</label>
                    <select name="modulo" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Proyecto">Proyecto</option>
                        <option value="Plan">Plan</option>
                        <option value="Programa">Programa</option>
                        <option value="Meta">Meta</option>
                        <option value="Indicador">Indicador</option>
                        <option value="ObjetivoEstrategico">Objetivo</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Accion</label>
                    <select name="accion" class="border rounded p-1.5 text-sm">
                        <option value="">Todas</option>
                        <option value="crear">Crear</option>
                        <option value="actualizar">Actualizar</option>
                        <option value="eliminar">Eliminar</option>
                    </select>
                </div>
                <button class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900">Descargar PDF</button>
            </form>
            <form action="{{ route('reportes.auditoria.csv') }}" method="GET" class="flex gap-3 flex-wrap items-end">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Modulo</label>
                    <select name="modulo" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Proyecto">Proyecto</option>
                        <option value="Plan">Plan</option>
                        <option value="Programa">Programa</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Accion</label>
                    <select name="accion" class="border rounded p-1.5 text-sm">
                        <option value="">Todas</option>
                        <option value="crear">Crear</option>
                        <option value="actualizar">Actualizar</option>
                        <option value="eliminar">Eliminar</option>
                    </select>
                </div>
                <button class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700">Descargar CSV</button>
            </form>
        </div>
    </div>

    <!-- ENTIDADES -->
    <div class="bg-white rounded-lg shadow border border-gray-200 mb-4">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center cursor-pointer" onclick="toggleReporte('entidades')">
            <div>
                <h4 class="font-semibold text-gray-800">Reporte de Entidades Institucionales</h4>
                <p class="text-xs text-gray-500">Catalogo de entidades del Estado con sector, subsector y nivel de gobierno</p>
            </div>
            <span class="text-gray-400 text-xs">▼ Filtros y descarga</span>
        </div>
        <div id="reporte-entidades" class="p-4 bg-gray-50 hidden">
            <form action="{{ route('reportes.entidades.pdf') }}" method="GET" class="flex gap-3 flex-wrap items-end mb-3">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Nivel de Gobierno</label>
                    <select name="nivel_gobierno" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Nacional">Nacional</option>
                        <option value="Provincial">Provincial</option>
                        <option value="Municipal">Municipal</option>
                        <option value="Parroquial">Parroquial</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Estado</label>
                    <select name="estado" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <button class="bg-gray-800 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-900">Descargar PDF</button>
            </form>
            <form action="{{ route('reportes.entidades.csv') }}" method="GET" class="flex gap-3 flex-wrap items-end">
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Nivel de Gobierno</label>
                    <select name="nivel_gobierno" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Nacional">Nacional</option>
                        <option value="Provincial">Provincial</option>
                        <option value="Municipal">Municipal</option>
                        <option value="Parroquial">Parroquial</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Estado</label>
                    <select name="estado" class="border rounded p-1.5 text-sm">
                        <option value="">Todos</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <button class="bg-gray-600 text-white px-3 py-1.5 rounded text-xs hover:bg-gray-700">Descargar CSV</button>
            </form>
        </div>
    </div>

    <div class="mt-4 bg-gray-50 border border-gray-200 rounded-lg p-3">
        <p class="text-xs text-gray-500">Los reportes PDF incluyen encabezado institucional SNP con fecha de generacion. Los archivos CSV son compatibles con Microsoft Excel y Google Sheets.</p>
    </div>
</div>

<script>
function toggleReporte(id) {
    const el = document.getElementById('reporte-' + id);
    el.classList.toggle('hidden');
}
</script>
</x-app-layout>