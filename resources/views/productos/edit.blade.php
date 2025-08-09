<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar producto') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('productos.update', $producto) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                    </div>

                    <div class="mb-4">
                        <label for="categoria" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Categoría</label>
                        <input type="text" id="categoria" name="categoria" value="{{ old('categoria', $producto->categoria) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900">{{ old('descripcion', $producto->descripcion) }}</textarea>
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
