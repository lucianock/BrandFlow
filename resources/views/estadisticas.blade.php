<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Estadísticas y Analíticas
            </h2>
            <button onclick="window.print()" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Exportar Reporte
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Estadísticas Generales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Productos</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['total_productos'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Marcas</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['total_marcas'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-purple-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Categorías</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['total_categorias'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-yellow-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Precio Promedio</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">${{ number_format($stats['precio_promedio'], 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos y Análisis -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Productos por Marca -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Productos por Marca</h3>
                    </div>
                    <div class="p-6">
                        @if($productosPorMarca->count() > 0)
                            <div class="space-y-4">
                                @foreach($productosPorMarca as $marca)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                                            <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $marca->mkNombre }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="w-32 bg-gray-200 dark:bg-gray-700 rounded-full h-2 mr-3">
                                                @php
                                                    $porcentaje = $stats['total_productos'] > 0 ? ($marca->productos_count / $stats['total_productos']) * 100 : 0;
                                                @endphp
                                                <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $porcentaje }}%"></div>
                                            </div>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $marca->productos_count }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-center py-4">No hay datos disponibles</p>
                        @endif
                    </div>
                </div>

                <!-- Productos por Categoría -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Productos por Categoría</h3>
                    </div>
                    <div class="p-6">
                        @if($productosPorCategoria->count() > 0)
                            <div class="space-y-4">
                                @foreach($productosPorCategoria as $categoria)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                            <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $categoria->catNombre }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="w-32 bg-gray-200 dark:bg-gray-700 rounded-full h-2 mr-3">
                                                @php
                                                    $porcentaje = $stats['total_productos'] > 0 ? ($categoria->productos_count / $stats['total_productos']) * 100 : 0;
                                                @endphp
                                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ $porcentaje }}%"></div>
                                            </div>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $categoria->productos_count }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-center py-4">No hay datos disponibles</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Rangos de Precio -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg mb-8">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Distribución de Precios</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($rangosPrecio as $rango => $cantidad)
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $cantidad }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">${{ $rango }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Top Productos -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Productos Más Caros -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Productos Más Caros</h3>
                    </div>
                    <div class="p-6">
                        @if($productosCaros->count() > 0)
                            <div class="space-y-4">
                                @foreach($productosCaros as $producto)
                                    <div class="flex items-center space-x-4 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <img src="/imgs/{{ $producto->prdImagen }}" alt="{{ $producto->prdNombre }}" class="w-12 h-12 object-cover rounded-lg">
                                        <div class="flex-1">
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $producto->prdNombre }}</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $producto->getMarca->mkNombre }}</p>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-sm font-bold text-green-600 dark:text-green-400">${{ number_format($producto->prdPrecio, 2) }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-center py-4">No hay productos disponibles</p>
                        @endif
                    </div>
                </div>

                <!-- Productos Más Baratos -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Productos Más Baratos</h3>
                    </div>
                    <div class="p-6">
                        @if($productosBaratos->count() > 0)
                            <div class="space-y-4">
                                @foreach($productosBaratos as $producto)
                                    <div class="flex items-center space-x-4 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <img src="/imgs/{{ $producto->prdImagen }}" alt="{{ $producto->prdNombre }}" class="w-12 h-12 object-cover rounded-lg">
                                        <div class="flex-1">
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $producto->prdNombre }}</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $producto->getMarca->mkNombre }}</p>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-sm font-bold text-blue-600 dark:text-blue-400">${{ number_format($producto->prdPrecio, 2) }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-center py-4">No hay productos disponibles</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
