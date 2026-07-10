<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Sistema de Planificación Pública - SNP</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto px-4">
        <!-- Bienvenida -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-1">Bienvenido, {{ auth()->user()->name }}</h3>
            <p class="text-gray-500">Rol: <span class="font-semibold text-blue-600">{{ auth()->user()->rol?->nombre ?? 'Sin rol asignado' }}</span></p>
        </div>

        <!-- Tarjetas de módulos -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <a href="{{ route('entidades.index') }}" class="bg-blue-600 text-white rounded-lg p-4 shadow hover:bg-blue-700">
                <p class="text-3xl font-bold">🏛️</p>
                <p class="text-lg font-semibold mt-2">Entidades</p>
                <p class="text-xs opacity-80">Gestión institucional</p>
            </a>
            <a href="{{ route('planes.index') }}" class="bg-green-600 text-white rounded-lg p-4 shadow hover:bg-green-700">
                <p class="text-3xl font-bold">📋</p>
                <p class="text-lg font-semibold mt-2">Planes</p>
                <p class="text-xs opacity-80">Planificación estratégica</p>
            </a>
            <a href="{{ route('programas.index') }}" class="bg-purple-600 text-white rounded-lg p-4 shadow hover:bg-purple-700">
                <p class="text-3xl font-bold">📁</p>
                <p class="text-lg font-semibold mt-2">Programas</p>
                <p class="text-xs opacity-80">Gestión de programas</p>
            </a>
            <a href="{{ route('proyectos.index') }}" class="bg-yellow-600 text-white rounded-lg p-4 shadow hover:bg-yellow-700">
                <p class="text-3xl font-bold">🏗️</p>
                <p class="text-lg font-semibold mt-2">Proyectos</p>
                <p class="text-xs opacity-80">Inversión pública</p>
            </a>
            <a href="{{ route('metas.index') }}" class="bg-red-600 text-white rounded-lg p-4 shadow hover:bg-red-700">
                <p class="text-3xl font-bold">🎯</p>
                <p class="text-lg font-semibold mt-2">Metas</p>
                <p class="text-xs opacity-80">Seguimiento de metas</p>
            </a>
            <a href="{{ route('indicadores.index') }}" class="bg-indigo-600 text-white rounded-lg p-4 shadow hover:bg-indigo-700">
                <p class="text-3xl font-bold">📊</p>
                <p class="text-lg font-semibold mt-2">Indicadores</p>
                <p class="text-xs opacity-80">Medición y evaluación</p>
            </a>
            <a href="{{ route('objetivos.index') }}" class="bg-teal-600 text-white rounded-lg p-4 shadow hover:bg-teal-700">
                <p class="text-3xl font-bold">🎖️</p>
                <p class="text-lg font-semibold mt-2">Objetivos</p>
                <p class="text-xs opacity-80">OE - ODS - PDN</p>
            </a>
            <a href="{{ route('auditorias.index') }}" class="bg-gray-700 text-white rounded-lg p-4 shadow hover:bg-gray-800">
                <p class="text-3xl font-bold">🔍</p>
                <p class="text-lg font-semibold mt-2">Auditoría</p>
                <p class="text-xs opacity-80">Registro de actividades</p>
            </a>
        </div>

        <!-- Info del sistema -->
        <div class="bg-white rounded-lg shadow p-6">
            <h4 class="font-semibold text-gray-700 mb-3">Acerca del Sistema</h4>
            <p class="text-gray-600 text-sm">Sistema Integrado de Planificación e Inversión Pública (SIPeIP) — Secretaría Nacional de Planificación del Ecuador. Permite gestionar planes, programas, proyectos, metas e indicadores alineados al Plan Nacional de Desarrollo y los ODS.</p>
        </div>
    </div>
</x-app-layout>