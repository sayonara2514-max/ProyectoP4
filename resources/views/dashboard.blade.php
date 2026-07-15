<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Sistema de Planificacion Publica - SNP</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-1">Bienvenido, {{ auth()->user()->name }}</h3>
            <p class="text-gray-500">Rol: <span class="font-semibold text-blue-600">{{ auth()->user()->rol?->nombre ?? 'Sin rol asignado' }}</span></p>
        </div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">

    @if(auth()->user()->rol?->nombre === 'Administrador')
        <a href="{{ route('entidades.index') }}" class="bg-indigo-600 text-white rounded-lg p-4 shadow hover:bg-indigo-700">
            <p class="text-3xl">🏛️</p>
            <p class="text-lg font-semibold mt-2">Entidades</p>
            <p class="text-xs opacity-80">Configuracion institucional</p>
        </a>
        <a href="{{ route('objetivos.index') }}" class="bg-teal-600 text-white rounded-lg p-4 shadow hover:bg-teal-700">
            <p class="text-3xl">🎖️</p>
            <p class="text-lg font-semibold mt-2">Objetivos</p>
            <p class="text-xs opacity-80">OE - ODS - PDN</p>
        </a>
        <a href="{{ route('roles.index') }}" class="bg-gray-600 text-white rounded-lg p-4 shadow hover:bg-gray-700">
            <p class="text-3xl">👥</p>
            <p class="text-lg font-semibold mt-2">Roles</p>
            <p class="text-xs opacity-80">Gestion de roles</p>
        </a>
        <a href="{{ route('usuarios.index') }}" class="bg-gray-800 text-white rounded-lg p-4 shadow hover:bg-gray-900">
            <p class="text-3xl">👤</p>
            <p class="text-lg font-semibold mt-2">Usuarios</p>
            <p class="text-xs opacity-80">Gestion de usuarios</p>
        </a>
        <a href="{{ route('planes.index') }}" class="bg-green-600 text-white rounded-lg p-4 shadow hover:bg-green-700">
            <p class="text-3xl">📋</p>
            <p class="text-lg font-semibold mt-2">Planes</p>
            <p class="text-xs opacity-80">Planificacion estrategica</p>
        </a>
        <a href="{{ route('programas.index') }}" class="bg-purple-600 text-white rounded-lg p-4 shadow hover:bg-purple-700">
            <p class="text-3xl">📁</p>
            <p class="text-lg font-semibold mt-2">Programas</p>
            <p class="text-xs opacity-80">Gestion de programas</p>
        </a>
        <a href="{{ route('proyectos.index') }}" class="bg-yellow-600 text-white rounded-lg p-4 shadow hover:bg-yellow-700">
            <p class="text-3xl">🏗️</p>
            <p class="text-lg font-semibold mt-2">Proyectos</p>
            <p class="text-xs opacity-80">Inversion publica</p>
        </a>
        <a href="{{ route('auditorias.index') }}" class="bg-red-700 text-white rounded-lg p-4 shadow hover:bg-red-800">
            <p class="text-3xl">🔍</p>
            <p class="text-lg font-semibold mt-2">Auditoria</p>
            <p class="text-xs opacity-80">Registro de actividades</p>
        </a>
    @endif

    @if(auth()->user()->rol?->nombre === 'Técnico de Planificación')
        <a href="{{ route('planes.index') }}" class="bg-green-600 text-white rounded-lg p-4 shadow hover:bg-green-700">
            <p class="text-3xl">📋</p>
            <p class="text-lg font-semibold mt-2">Planes</p>
            <p class="text-xs opacity-80">Planificacion estrategica</p>
        </a>
        <a href="{{ route('programas.index') }}" class="bg-purple-600 text-white rounded-lg p-4 shadow hover:bg-purple-700">
            <p class="text-3xl">📁</p>
            <p class="text-lg font-semibold mt-2">Programas</p>
            <p class="text-xs opacity-80">Gestion de programas</p>
        </a>
        <a href="{{ route('proyectos.index') }}" class="bg-yellow-600 text-white rounded-lg p-4 shadow hover:bg-yellow-700">
            <p class="text-3xl">🏗️</p>
            <p class="text-lg font-semibold mt-2">Proyectos</p>
            <p class="text-xs opacity-80">Inversion publica</p>
        </a>
    @endif

    @if(auth()->user()->rol?->nombre === 'Revisor Institucional')
        <a href="{{ route('planes.index') }}" class="bg-green-600 text-white rounded-lg p-4 shadow hover:bg-green-700">
            <p class="text-3xl">📋</p>
            <p class="text-lg font-semibold mt-2">Planes en Revision</p>
            <p class="text-xs opacity-80">Revisar y validar planes</p>
        </a>
        <a href="{{ route('proyectos.index') }}" class="bg-yellow-600 text-white rounded-lg p-4 shadow hover:bg-yellow-700">
            <p class="text-3xl">🏗️</p>
            <p class="text-lg font-semibold mt-2">Proyectos en Revision</p>
            <p class="text-xs opacity-80">Revisar y validar proyectos</p>
        </a>
    @endif

    @if(auth()->user()->rol?->nombre === 'Autoridad Validante')
        <a href="{{ route('planes.index') }}" class="bg-green-600 text-white rounded-lg p-4 shadow hover:bg-green-700">
            <p class="text-3xl">📋</p>
            <p class="text-lg font-semibold mt-2">Planes para Aprobar</p>
            <p class="text-xs opacity-80">Aprobar planes validados</p>
        </a>
        <a href="{{ route('proyectos.index') }}" class="bg-yellow-600 text-white rounded-lg p-4 shadow hover:bg-yellow-700">
            <p class="text-3xl">🏗️</p>
            <p class="text-lg font-semibold mt-2">Proyectos para Aprobar</p>
            <p class="text-xs opacity-80">Aprobar proyectos validados</p>
        </a>
    @endif

    @if(auth()->user()->rol?->nombre === 'Auditor')
        <a href="{{ route('auditorias.index') }}" class="bg-red-700 text-white rounded-lg p-4 shadow hover:bg-red-800">
            <p class="text-3xl">🔍</p>
            <p class="text-lg font-semibold mt-2">Auditoria</p>
            <p class="text-xs opacity-80">Registro de actividades</p>
        </a>
    @endif

</div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h4 class="font-semibold text-gray-700 mb-3">Acerca del Sistema</h4>
            <p class="text-gray-600 text-sm">Sistema Integrado de Planificacion e Inversion Publica (SIPeIP) - Secretaria Nacional de Planificacion del Ecuador. Permite gestionar planes, programas, proyectos e indicadores alineados al Plan Nacional de Desarrollo y los ODS.</p>
        </div>
    </div>
</x-app-layout>