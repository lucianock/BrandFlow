<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Agregar nueva categoría
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- inicio contenido -->
                    @include('layouts.mensajes')

                    <form method="POST" action="/categoria/store" class="max-w-md mx-auto">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="catNombre" :value="__('Nombre de la categoría')" />
                            <x-text-input id="catNombre" class="block mt-1 w-full" type="text" name="catNombre" :value="old('catNombre')" required autofocus />
                            <x-input-error :messages="$errors->get('catNombre')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Agregar categoría') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <!-- fin contenido -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
