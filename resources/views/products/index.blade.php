<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-lg rounded-3xl p-6">
                <div class="mb-6">
                    <a href="{{ route('products.create') }}"
                       class="inline-flex items-center justify-center px-6 py-3 text-white font-bold bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 rounded-xl shadow-md transition-all duration-200">
                        ➕ Crear Producto
                    </a>
                </div>
                <div class="overflow-x-auto rounded-xl shadow-sm">
                    <table class="min-w-full table-auto border-collapse bg-white dark:bg-gray-800 text-sm rounded-xl overflow-hidden">
                        <thead class="bg-gradient-to-r from-gray-200 to-gray-300 dark:from-gray-700 dark:to-gray-800 text-gray-700 dark:text-white uppercase text-xs font-bold tracking-wider">
                            <tr>
                                <th class="px-4 py-3 text-center">ID</th>
                                <th class="px-4 py-3 text-center">Nombre</th>
                                <th class="px-4 py-3 text-center">Categoría</th>
                                <th class="px-4 py-3 text-center">Precio Desde</th>
                                <th class="px-4 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800 dark:text-gray-200">
                            @foreach ($productos as $producto)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-150">
                                    <td class="px-4 py-3 text-center">{{ $producto->id }}</td>
                                    <td class="px-4 py-3 text-center">{{ $producto->nombre }}</td>
                                    <td class="px-4 py-3 text-center">{{ $producto->categoria }}</td>
                                    <td class="px-4 py-3 text-center">
                                        @if($producto->precio_desde)
                                            ${{ number_format($producto->precio_desde, 2) }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('products.edit', $producto->id) }}" class="btn-edit">✏️ Editar</a>
                                            <form action="{{ route('products.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Eliminar producto?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">🗑️ Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white font-bold">
                            <tr>
                                <td colspan="4" class="px-4 py-3">
                                    {{ $productos->links() }}
                                </td>
                                <td class="px-4 py-3 text-center">Total: {{ $productos->total() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .btn-edit,
    .btn-delete {
        padding: 0.5rem 1rem;
        font-weight: bold;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 14px;
    }
    .btn-edit {
        background: linear-gradient(to right, #06b6d4, #3b82f6);
        color: white;
    }
    .btn-edit:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(59, 130, 246, 0.4);
    }
    .btn-delete {
        background: linear-gradient(to right, #ef4444, #b91c1c);
        color: white;
    }
    .btn-delete:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(239, 68, 68, 0.4);
    }
</style>
