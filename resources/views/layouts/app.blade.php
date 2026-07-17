<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SIPeIP - Sistema Integrado de Planificacion e Inversion Publica</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                        <div>
                            {{ $header }}
                        </div>
                        <div class="text-xs text-gray-400">
                            SIPeIP | Secretaria Nacional de Planificacion
                        </div>
                    </div>
                </header>
            @endisset

            <main class="flex-1 py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg border border-green-200">
                            ✅ {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg border border-red-200">
                            ❌ {{ session('error') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg border border-red-200">
                            <ul>@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul>
                        </div>
                    @endif
                    {{ $slot }}
                </div>
            </main>

            <footer class="bg-white border-t border-gray-200 py-3">
                <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
                    <p class="text-xs text-gray-500">© {{ date('Y') }} SIPeIP - Secretaria Nacional de Planificacion del Ecuador</p>
                    <p class="text-xs text-gray-400">Sistema Integrado de Planificacion e Inversion Publica</p>
                </div>
            </footer>
        </div>
    </body>
</html>