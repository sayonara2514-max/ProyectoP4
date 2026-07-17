<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Proyecto</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <form method="POST" action="{{ route('proyectos.update', $proyecto->id) }}" class="space-y-4">
        @csrf @method('PUT')
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Identificacion del Proyecto</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Codigo</label><input name="codigo" value="{{ old('codigo', $proyecto->codigo) }}" class="w-full border rounded p-2"></div>
                <div><label class="block text-sm font-medium">Nombre del Proyecto</label><input name="nombre" value="{{ old('nombre', $proyecto->nombre) }}" class="w-full border rounded p-2" required></div>
            </div>
            <div><label class="block text-sm font-medium">Descripcion</label><textarea name="descripcion" rows="3" class="w-full border rounded p-2">{{ old('descripcion', $proyecto->descripcion) }}</textarea></div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Tipo de Proyecto</label>
                    <select name="tipo" class="w-full border rounded p-2">
                        <option value="Inversion" {{ $proyecto->tipo==='Inversion'?'selected':'' }}>Inversion</option>
                        <option value="Preinversion" {{ $proyecto->tipo==='Preinversion'?'selected':'' }}>Preinversion</option>
                        <option value="Estudio" {{ $proyecto->tipo==='Estudio'?'selected':'' }}>Estudio</option>
                        <option value="Cooperacion" {{ $proyecto->tipo==='Cooperacion'?'selected':'' }}>Cooperacion</option>
                    </select>
                </div>
                <div><label class="block text-sm font-medium">Sector de Intervencion</label><input name="sector_intervencion" value="{{ old('sector_intervencion', $proyecto->sector_intervencion) }}" class="w-full border rounded p-2"></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Fuente de Financiamiento</label>
                    <select name="fuente_financiamiento" class="w-full border rounded p-2">
                        <option value="Recursos Fiscales" {{ $proyecto->fuente_financiamiento==='Recursos Fiscales'?'selected':'' }}>Recursos Fiscales</option>
                        <option value="Cooperacion Internacional" {{ $proyecto->fuente_financiamiento==='Cooperacion Internacional'?'selected':'' }}>Cooperacion Internacional</option>
                        <option value="Credito Externo" {{ $proyecto->fuente_financiamiento==='Credito Externo'?'selected':'' }}>Credito Externo</option>
                        <option value="Recursos Propios" {{ $proyecto->fuente_financiamiento==='Recursos Propios'?'selected':'' }}>Recursos Propios</option>
                    </select>
                </div>
                <div><label class="block text-sm font-medium">Ubicacion Geografica</label><input name="ubicacion_geografica" value="{{ old('ubicacion_geografica', $proyecto->ubicacion_geografica) }}" class="w-full border rounded p-2"></div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Datos Financieros y Temporales</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Presupuesto Total</label><input type="number" step="0.01" name="presupuesto" value="{{ old('presupuesto', $proyecto->presupuesto) }}" class="w-full border rounded p-2"></div>
                <div><label class="block text-sm font-medium">Presupuesto Ejecutado</label><input type="number" step="0.01" name="presupuesto_ejecutado" value="{{ old('presupuesto_ejecutado', $proyecto->presupuesto_ejecutado) }}" class="w-full border rounded p-2"></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Fecha Inicio</label><input type="date" name="fecha_inicio" value="{{ old('fecha_inicio', $proyecto->fecha_inicio) }}" class="w-full border rounded p-2"></div>
                <div><label class="block text-sm font-medium">Fecha Fin</label><input type="date" name="fecha_fin" value="{{ old('fecha_fin', $proyecto->fecha_fin) }}" class="w-full border rounded p-2"></div>
            </div>
            <div><label class="block text-sm font-medium">Programa</label>
                <select name="programa_id" class="w-full border rounded p-2">
                    @foreach($programas as $p)<option value="{{ $p->id }}" {{ $proyecto->programa_id==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
                </select>
            </div>
            <div class="bg-gray-50 rounded p-3">
                <p class="text-xs text-gray-500 uppercase font-semibold">Estado actual</p>
                @if($proyecto->estado === 'formulado')
                    <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">Formulado</span>
                @elseif($proyecto->estado === 'en_revision')
                    <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-800">En Revision</span>
                @elseif($proyecto->estado === 'validado')
                    <span class="px-2 py-1 rounded text-xs bg-purple-100 text-purple-800">Validado</span>
                @else
                    <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Aprobado</span>
                @endif
            </div>
        </div>

        <div class="flex gap-2">
            <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Actualizar</button>
            <a href="{{ route('proyectos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>