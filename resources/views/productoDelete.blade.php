<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Confirmar Eliminación de Producto
            </h2>
            <a href="/productos" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Volver a Productos
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('layouts.mensajes')

                    <!-- Alerta de advertencia -->
                    <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-red-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800 dark:text-red-200">
                                    Advertencia
                                </h3>
                                <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                                    <p>Esta acción no se puede deshacer. Una vez eliminado, el producto no podrá ser recuperado y su imagen será eliminada permanentemente.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información del producto -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                            Información del producto a eliminar:
                        </h3>
                        
                        <!-- Imagen del producto -->
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="flex-shrink-0">
                                <img src="/imgs/{{ $producto->prdImagen }}" 
                                     alt="{{ $producto->prdNombre }}" 
                                     class="h-20 w-20 object-cover rounded-lg border border-gray-200 dark:border-gray-600">
                            </div>
                            <div class="flex-1 min-w-0">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-3">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ID del Producto:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $producto->idProducto }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre del Producto:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 font-medium">{{ $producto->prdNombre }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Precio:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">${{ number_format($producto->prdPrecio, 2) }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Marca:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $producto->getMarca->mkNombre }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Categoría:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $producto->getCate->catNombre }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Estado:</dt>
                                        <dd class="mt-1">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $producto->prdActivo ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                                {{ $producto->prdActivo ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="mt-4">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Descripción:</dt>
                            <dd class="text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-600 p-3 rounded-lg border border-gray-200 dark:border-gray-600">
                                {{ $producto->prdDescripcion }}
                            </dd>
                        </div>
                    </div>

                    <!-- Formulario de confirmación -->
                    <form action="/producto/delete/{{ $producto->idProducto }}" method="post" class="space-y-6">
                        @csrf
                        @method('DELETE')
                        
                        <!-- Campo de confirmación -->
                        <div>
                            <x-input-label for="confirmacion" :value="__('Para confirmar la eliminación, escriba el nombre exacto del producto')" />
                            <x-text-input id="confirmacion" 
                                         class="block mt-1 w-full" 
                                         type="text" 
                                         name="confirmacion" 
                                         required 
                                         autofocus 
                                         placeholder="Escriba: {{ $producto->prdNombre }}" />
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                Debe escribir exactamente: <strong>{{ $producto->prdNombre }}</strong>
                            </p>
                        </div>

                        <div class="flex items-center justify-end space-x-4">
                            <a href="/productos" 
                               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                </svg>
                                Cancelar
                            </a>
                            
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                Confirmar Eliminación
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
