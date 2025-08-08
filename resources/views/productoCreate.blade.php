<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Crear Nuevo Producto
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

                    <form action="/producto/store" method="post" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div>
                            <x-input-label for="prdNombre" :value="__('Nombre del Producto')" />
                            <x-text-input id="prdNombre" 
                                         class="block mt-1 w-full" 
                                         type="text" 
                                         name="prdNombre" 
                                         :value="old('prdNombre')" 
                                         required 
                                         autofocus 
                                         placeholder="Ingrese el nombre del producto" />
                            <x-input-error :messages="$errors->get('prdNombre')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="prdPrecio" :value="__('Precio del Producto')" />
                            <x-text-input id="prdPrecio" 
                                         class="block mt-1 w-full" 
                                         type="number" 
                                         name="prdPrecio" 
                                         :value="old('prdPrecio')" 
                                         required 
                                         step="0.01" 
                                         min="0"
                                         placeholder="0.00" />
                            <x-input-error :messages="$errors->get('prdPrecio')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="idMarca" :value="__('Marca')" />
                            <select id="idMarca" 
                                    name="idMarca" 
                                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                                    required>
                                <option value="">Seleccione una marca</option>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->idMarca }}" {{ old('idMarca') == $marca->idMarca ? 'selected' : '' }}>
                                        {{ $marca->mkNombre }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('idMarca')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="idCategoria" :value="__('Categoría')" />
                            <select id="idCategoria" 
                                    name="idCategoria" 
                                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                                    required>
                                <option value="">Seleccione una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->idCategoria }}" {{ old('idCategoria') == $categoria->idCategoria ? 'selected' : '' }}>
                                        {{ $categoria->catNombre }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('idCategoria')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="prdDescripcion" :value="__('Descripción')" />
                            <textarea id="prdDescripcion" 
                                      name="prdDescripcion" 
                                      rows="4"
                                      class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                      placeholder="Ingrese la descripción del producto">{{ old('prdDescripcion') }}</textarea>
                            <x-input-error :messages="$errors->get('prdDescripcion')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="prdImagen" :value="__('Imagen del Producto (Opcional)')" />
                            <input type="file" 
                                   id="prdImagen" 
                                   name="prdImagen" 
                                   accept="image/*"
                                   class="block mt-1 w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900/20 dark:file:text-indigo-400" />
                            <x-input-error :messages="$errors->get('prdImagen')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end space-x-4">
                            <a href="/productos" 
                               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                </svg>
                                Cancelar
                            </a>
                            
                            <x-primary-button class="bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:ring-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Crear Producto
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
