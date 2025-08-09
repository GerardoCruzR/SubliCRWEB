<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $producto->nombre }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <p class="mb-4"><strong>Categoría:</strong> {{ $producto->categoria }}</p>
                @if($producto->descripcion)
                    <p>{{ $producto->descripcion }}</p>
                @else
                    <p class="text-gray-600">Sin descripción.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
