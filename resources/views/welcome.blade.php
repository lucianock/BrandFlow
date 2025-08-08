<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BrandFlow - Sistema de Gestión de Productos</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <div class="text-center">
                        <!-- Logo -->
                        <div class="flex justify-center mb-8">
                            <div class="bg-white dark:bg-gray-800 rounded-full p-6 shadow-lg">
                                <svg viewBox="0 0 200 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto">
                                    <circle cx="25" cy="25" r="20" fill="url(#gradient)" stroke="#3B82F6" stroke-width="2"/>
                                    <path d="M20 15 L30 25 L20 35 M30 15 L40 25 L30 35" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                    <text x="55" y="32" font-family="Arial, sans-serif" font-size="24" font-weight="bold" fill="#1F2937">BrandFlow</text>
                                    <defs>
                                        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#1E40AF;stop-opacity:1" />
                                        </linearGradient>
                                    </defs>
                    </svg>
                </div>
                                </div>

                        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            Bienvenido a BrandFlow
                        </h1>
                        <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">
                            Sistema de gestión de productos y marcas
                        </p>

                        <!-- Features -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg">
                                <div class="flex justify-center mb-4">
                                    <svg class="h-12 w-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Gestión de Productos</h3>
                                <p class="text-gray-600 dark:text-gray-400">Administra tu catálogo de productos de manera eficiente con imágenes y descripciones detalladas.</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg">
                                <div class="flex justify-center mb-4">
                                    <svg class="h-12 w-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Control de Marcas</h3>
                                <p class="text-gray-600 dark:text-gray-400">Organiza tus productos por marcas y mantén un control total sobre tu inventario.</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg">
                                <div class="flex justify-center mb-4">
                                    <svg class="h-12 w-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Categorización</h3>
                                <p class="text-gray-600 dark:text-gray-400">Clasifica tus productos en categorías para una mejor organización y búsqueda.</p>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Ir al Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Iniciar Sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Registrarse
                                    </a>
                                @endif
                            @endauth
                </div>

                        <!-- Footer -->
                        <div class="mt-16 text-center">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                © 2024 BrandFlow. Sistema de gestión de productos desarrollado con Laravel.
                            </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
