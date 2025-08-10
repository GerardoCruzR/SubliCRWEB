<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Detalle de producto') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex mb-4">
                    @if ($producto->imagen_publica)
                        <img src="{{ $producto->imagen_publica }}" alt="{{ $producto->nombre }}" class="w-32 h-32 object-cover rounded" />
                    @endif
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold">{{ $producto->nombre }}</h3>
                        <p class="text-gray-500">{{ $producto->categoria }}</p>
                        <p class="mt-2">{{ $producto->descripcion }}</p>
                    </div>
                </div>

                <h4 class="text-lg font-semibold mb-2">Variantes</h4>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">SKU</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Precio</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Stock</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Atributos</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($producto->variantes as $v)
                                <tr>
                                    <td class="px-4 py-2">{{ $v->sku }}</td>
                                    <td class="px-4 py-2">{{ money_mx($v->precio) }}</td>
                                    <td class="px-4 py-2">{{ $v->stock }}</td>
                                    <td class="px-4 py-2">
                                        @php
                                            $pairs = [];
                                            foreach (collect($v->atributos)->filter() as $key => $val) {
                                                $pairs[] = $key . ': ' . $val;
                                            }
                                        @endphp
                                        {{ implode(', ', $pairs) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
