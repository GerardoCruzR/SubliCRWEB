<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear producto') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('productos.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                    </div>

                    <div class="mb-4">
                        <label for="categoria" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Categoría</label>
                        <input type="text" id="categoria" name="categoria" value="{{ old('categoria') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="imagen_url_principal" class="block text-sm font-medium text-gray-700 dark:text-gray-200">URL de imagen principal</label>
                        <input type="url" id="imagen_url_principal" name="imagen_url_principal" value="{{ old('imagen_url_principal') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                    </div>

                    <div class="mb-4">
                        <label for="variantes0precio" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Precio</label>
                        <input type="number" step="0.01" id="variantes0precio" name="variantes[0][precio]" value="{{ old('variantes.0.precio') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                    </div>

                    <div class="mb-4">
                        <label for="variantes0stock" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Stock</label>
                        <input type="number" id="variantes0stock" name="variantes[0][stock]" value="{{ old('variantes.0.stock') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('productos.index') }}" class="mr-3 text-gray-600 hover:underline">Cancelar</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
