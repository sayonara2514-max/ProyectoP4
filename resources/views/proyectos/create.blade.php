<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nuevo Proyecto de Inversion</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <form method="POST" action="{{ route('proyectos.store') }}" class="space-y-4">
        @csrf
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Identificacion del Proyecto</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Codigo</label><input name="codigo" value="{{ old('codigo') }}" class="w-full border rounded p-2" placeholder="Ej: PRY-2026-001"></div>
                <div><label class="block text-sm font-medium">Nombre del Proyecto</label><input name="nombre" value="{{ old('nombre') }}" class="w-full border rounded p-2" required></div>
            </div>
            <div><label class="block text-sm font-medium">Descripcion</label><textarea name="descripcion" rows="3" class="w-full border rounded p-2">{{ old('descripcion') }}</textarea></div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Tipo de Proyecto</label>
                    <select name="tipo" class="w-full border rounded p-2">
                        <option value="Inversion">Inversion</option>
                        <option value="Preinversion">Preinversion</option>
                        <option value="Estudio">Estudio</option>
                        <option value="Cooperacion">Cooperacion</option>
                    </select>
                </div>
                <div><label class="block text-sm font-medium">Sector de Intervencion</label><input name="sector_intervencion" value="{{ old('sector_intervencion') }}" class="w-full border rounded p-2" placeholder="Ej: Salud, Educacion..."></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Fuente de Financiamiento</label>
                    <select name="fuente_financiamiento" class="w-full border rounded p-2">
                        <option value="Recursos Fiscales">Recursos Fiscales</option>
                        <option value="Cooperacion Internacional">Cooperacion Internacional</option>
                        <option value="Credito Externo">Credito Externo</option>
                        <option value="Recursos Propios">Recursos Propios</option>
                    </select>
                </div>
                <div><label class="block text-sm font-medium">Ubicacion Geografica</label><input name="ubicacion_geografica" value="{{ old('ubicacion_geografica') }}" class="w-full border rounded p-2" placeholder="Ej: Quito, Pichincha"></div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Datos Financieros y Temporales</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Presupuesto Total</label><input type="number" step="0.01" name="presupuesto" value="{{ old('presupuesto') }}" class="w-full border rounded p-2" required></div>
                <div><label class="block text-sm font-medium">Presupuesto Ejecutado</label><input type="number" step="0.01" name="presupuesto_ejecutado" value="{{ old('presupuesto_ejecutado', 0) }}" class="w-full border rounded p-2"></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Fecha Inicio</label><input type="date" name="fecha_inicio" value="{{ old('fecha_inicio') }}" class="w-full border rounded p-2" required></div>
                <div><label class="block text-sm font-medium">Fecha Fin</label><input type="date" name="fecha_fin" value="{{ old('fecha_fin') }}" class="w-full border rounded p-2" required></div>
            </div>
            <div><label class="block text-sm font-medium">Programa</label>
                <select name="programa_id" class="w-full border rounded p-2" required>
                    <option value="">Seleccione...</option>
                    @foreach($programas as $p)<option value="{{ $p->id }}" {{ old('programa_id')==$p->id?'selected':'' }}>{{ $p->nombre }}</option>@endforeach
                </select>
            </div>
        </div>

        <div class="flex gap-2">
            <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Guardar</button>
            <a href="{{ route('proyectos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>