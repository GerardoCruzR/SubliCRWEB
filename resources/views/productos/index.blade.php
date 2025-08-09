<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Productos') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <a href="{{ route('productos.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-md hover:bg-indigo-500">Nuevo producto</a>
                    <a href="{{ route('catalogo.publico') }}" class="ml-2 inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-semibold rounded-md hover:bg-gray-500">Ver catálogo</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Imagen</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Nombre</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Categoría</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Precio desde</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Variantes</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @forelse ($productos as $p)
                                <tr>
                                    <td class="px-4 py-2">
                                        @if ($p->imagen_publica)
                                            <img src="{{ $p->imagen_publica }}" alt="{{ $p->nombre }}" class="h-16 w-16 object-cover rounded" />
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ $p->nombre }}</td>
                                    <td class="px-4 py-2">{{ $p->categoria }}</td>
                                    <td class="px-4 py-2">{{ money_mx($p->precio_desde) }}</td>
                                    <td class="px-4 py-2">{{ $p->variantes->count() }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                        <a href="{{ route('productos.show', $p->id) }}" class="text-blue-600 hover:underline">Ver</a>
                                        <a href="{{ route('productos.edit', $p->id) }}" class="text-indigo-600 hover:underline">Editar</a>
                                        <form action="{{ route('productos.destroy', $p->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-2 text-center text-gray-500">No hay productos</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
