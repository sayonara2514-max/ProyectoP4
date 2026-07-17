<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Nueva Entidad</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto px-4">
    <form method="POST" action="{{ route('entidades.store') }}" class="space-y-4">
        @csrf
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Identificacion Institucional</h3>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Codigo Oficial</label><input name="codigo" value="{{ old('codigo') }}" class="w-full border rounded p-2" placeholder="Ej: SNP-001"></div>
                <div><label class="block text-sm font-medium">Nombre de la Entidad</label><input name="nombre" value="{{ old('nombre') }}" class="w-full border rounded p-2" required></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Sector</label><input name="sector" value="{{ old('sector') }}" class="w-full border rounded p-2" placeholder="Ej: Planificacion"></div>
                <div><label class="block text-sm font-medium">Subsector</label><input name="subsector" value="{{ old('subsector') }}" class="w-full border rounded p-2" placeholder="Ej: Planificacion Nacional"></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium">Nivel de Gobierno</label>
                    <select name="nivel_gobierno" class="w-full border rounded p-2">
                        <option value="Nacional">Nacional</option>
                        <option value="Provincial">Provincial</option>
                        <option value="Municipal">Municipal</option>
                        <option value="Parroquial">Parroquial</option>
                    </select>
                </div>
                <div><label class="block text-sm font-medium">Estado</label>
                    <select name="estado" class="w-full border rounded p-2">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="font-semibold text-gray-700 border-b pb-2">Direccion Estrategica</h3>
            <div><label class="block text-sm font-medium">Mision</label><textarea name="mision" rows="3" class="w-full border rounded p-2" placeholder="Descripcion de la mision institucional...">{{ old('mision') }}</textarea></div>
            <div><label class="block text-sm font-medium">Vision</label><textarea name="vision" rows="3" class="w-full border rounded p-2" placeholder="Descripcion de la vision institucional...">{{ old('vision') }}</textarea></div>
            <div><label class="block text-sm font-medium">Estructura Organizacional</label><textarea name="estructura" rows="3" class="w-full border rounded p-2" placeholder="Descripcion de la estructura organizacional...">{{ old('estructura') }}</textarea></div>
        </div>

        <div class="flex gap-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
            <a href="{{ route('entidades.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>