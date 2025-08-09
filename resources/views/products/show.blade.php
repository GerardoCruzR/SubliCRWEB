<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-lg rounded-3xl p-6">
                <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">{{ $producto->nombre }}</h1>
                <p class="mb-2 text-gray-700 dark:text-gray-300"><strong>Categoría:</strong> {{ $producto->categoria }}</p>
                <p class="mb-4 text-gray-700 dark:text-gray-300">{{ $producto->descripcion }}</p>
                <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">&larr; Volver</a>
            </div>
        </div>
    </div>
</x-app-layout>
