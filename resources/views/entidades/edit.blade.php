<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Editar Entidad</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <form method="POST" action="{{ route('entidades.update', $entidad->id) }}" class="space-y-4">
        @csrf @method('PUT')
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Identificacion Institucional</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Codigo Oficial</label><input name="codigo" value="{{ old('codigo', $entidad->codigo) }}" class="w-full border rounded p-2"></div>
                <div><label class="block text-sm font-medium">Nombre de la Entidad</label><input name="nombre" value="{{ old('nombre', $entidad->nombre) }}" class="w-full border rounded p-2" required></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Sector</label><input name="sector" value="{{ old('sector', $entidad->sector) }}" class="w-full border rounded p-2"></div>
                <div><label class="block text-sm font-medium">Subsector</label><input name="subsector" value="{{ old('subsector', $entidad->subsector) }}" class="w-full border rounded p-2"></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Nivel de Gobierno</label>
                    <select name="nivel_gobierno" class="w-full border rounded p-2">
                        <option value="Nacional" {{ $entidad->nivel_gobierno==='Nacional'?'selected':'' }}>Nacional</option>
                        <option value="Provincial" {{ $entidad->nivel_gobierno==='Provincial'?'selected':'' }}>Provincial</option>
                        <option value="Municipal" {{ $entidad->nivel_gobierno==='Municipal'?'selected':'' }}>Municipal</option>
                        <option value="Parroquial" {{ $entidad->nivel_gobierno==='Parroquial'?'selected':'' }}>Parroquial</option>
                    </select>
                </div>
                <div><label class="block text-sm font-medium">Estado</label>
                    <select name="estado" class="w-full border rounded p-2">
                        <option value="Activo" {{ $entidad->estado==='Activo'?'selected':'' }}>Activo</option>
                        <option value="Inactivo" {{ $entidad->estado==='Inactivo'?'selected':'' }}>Inactivo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Direccion Estrategica</h3>
            <div><label class="block text-sm font-medium">Mision</label><textarea name="mision" rows="3" class="w-full border rounded p-2">{{ old('mision', $entidad->mision) }}</textarea></div>
            <div><label class="block text-sm font-medium">Vision</label><textarea name="vision" rows="3" class="w-full border rounded p-2">{{ old('vision', $entidad->vision) }}</textarea></div>
            <div><label class="block text-sm font-medium">Estructura Organizacional</label><textarea name="estructura" rows="3" class="w-full border rounded p-2">{{ old('estructura', $entidad->estructura) }}</textarea></div>
        </div>

        <div class="flex gap-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
            <a href="{{ route('entidades.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>