<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-lg rounded-3xl p-6 transition-all duration-300">
                <div class="mb-6">
                    <a href="{{ route('trucks.create') }}"
                        class="inline-flex items-center justify-center px-6 py-3 text-white font-bold bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 rounded-xl shadow-md transition-all duration-200">
                        🍵 Crear Artículo
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl shadow-sm">
                    <table class="min-w-full table-auto border-collapse bg-white dark:bg-gray-800 text-sm rounded-xl overflow-hidden">
                        <thead class="bg-gradient-to-r from-gray-200 to-gray-300 dark:from-gray-700 dark:to-gray-800 text-gray-700 dark:text-white uppercase text-xs font-bold tracking-wider">
                            <tr>
                                <th class="px-4 py-3 text-center">ID</th>
                                <th class="px-4 py-3 text-center">Nombre Artículo</th>
                                <th class="px-4 py-3 text-center">Talla/Capacidad</th>
                                <th class="px-4 py-3 text-center">Colores</th>
                                <th class="px-4 py-3 text-center">Tipo de Impresión</th>
                                <th class="px-4 py-3 text-center">Stock y Disponibilidad</th>
                                <th class="px-4 py-3 text-center">Precio</th>
                                <th class="px-4 py-3 text-center">PDF</th>
                                <th class="px-4 py-3 text-center">Imágenes</th>
                                <th class="px-4 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800 dark:text-gray-200">
                            @foreach ($trucks as $truck)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-150">
                                    <td class="px-4 py-3 text-center">{{ $truck->id }}</td>
                                    <td class="px-4 py-3 text-center">{{ $truck->nombre_articulo }}</td>
                                    <td class="px-4 py-3 text-center">{{ $truck->talla ?? $truck->capacidad }}</td>
                                    <td class="px-4 py-3 text-center">{{ $truck->colores }}</td>
                                    <td class="px-4 py-3 text-center">{{ $truck->tipo_impresion }}</td>
                                    <td class="px-4 py-3 text-center">
                                        @if ($truck->stock && $truck->disponibilidad)
                                            {{ $truck->stock }} / {{ $truck->disponibilidad }}
                                        @elseif ($truck->stock)
                                            {{ $truck->stock }}
                                        @elseif ($truck->disponibilidad)
                                            {{ $truck->disponibilidad }}
                                        @else
                                            No especificado
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">${{ number_format($truck->precio, 2) }}</td>
                                    <td class="px-4 py-3 text-center">
                                        @if ($truck->documentacion && is_array($truck->documentacion))
                                            @foreach ($truck->documentacion as $index => $documento)
                                                <a href="data:application/pdf;base64,{{ $documento }}" target="_blank"
                                                    class="text-blue-500 hover:underline">Ver PDF {{ $index + 1 }}</a><br>
                                            @endforeach
                                        @else
                                            No Document
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        @if ($truck->imagenes && is_array($truck->imagenes))
                                            <div class="flex flex-col items-center">
                                                <img src="data:image/jpeg;base64,{{ $truck->imagenes[0] }}"
                                                    class="h-16 w-16 object-cover rounded-lg shadow" alt="Imagen">
                                                <span class="text-xs mt-1">Total: {{ count($truck->imagenes) }}</span>
                                            </div>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('trucks.edit', $truck->id) }}"
                                                class="btn-edit">✏️ Editar</a>
                                            <button type="button" onclick="confirmDelete('{{ $truck->id }}')"
                                                class="btn-delete">🗑️ Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white font-bold">
                            <tr>
                                <td colspan="9" class="px-4 py-3">
                                    {{ $trucks->links() }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    Total: {{ $trucks->total() }}
                                </td>
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
<script>
    function confirmDelete(id) {
        alertify.confirm("¿Confirmar la eliminación del registro?",
            function () {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/trucks/' + id;
                form.innerHTML = '@csrf @method('DELETE')';
                document.body.appendChild(form);
                form.submit();
                alertify.success('Registro eliminado');
            },
            function () {
                alertify.error('Cancelado');
            });
    }
</script>
