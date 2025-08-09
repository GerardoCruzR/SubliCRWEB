<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('products.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="categoria" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría</label>
                        <input type="text" name="categoria" id="categoria" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <div id="variants">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-200">Variantes</h3>
                        <div class="variant border p-4 rounded-lg mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">SKU</label>
                                <input type="text" name="variantes[0][sku]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio</label>
                                <input type="number" step="0.01" name="variantes[0][precio]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock</label>
                                <input type="number" name="variantes[0][stock]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
