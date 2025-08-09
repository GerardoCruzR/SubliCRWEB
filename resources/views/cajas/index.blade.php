<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cajas Disponibles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">

                <!-- Botón para crear una nueva caja -->
                <div class="mb-4">
                    <a href="{{ route('cajas.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        {{ __('Crear Nueva Caja') }}
                    </a>
                </div>

                <!-- Mostrar la lista de cajas -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full whitespace-nowrap">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Tipo de Caja</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Tamaño</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Marca</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Año</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Condición</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Precio</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Disponibilidad</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Suspensión</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Bolsas de Aire</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Número de Ejes</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Frenos</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Tipo de Puertas</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Capacidad de Carga</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Tipo de Motor</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Imágenes</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cajas as $caja)
                            <tr>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->tipo_caja }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->tamano }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->marca }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->ano }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->condicion }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->precio }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                    {{ $caja->disponibilidad ? 'Disponible' : 'No disponible' }}
                                </td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->tipo_suspension }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->bolsas_aire ? 'Sí' : 'No' }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->numero_ejes }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->frenos }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->tipo_puertas }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->capacidad_carga }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $caja->tipo_motor }}</td>

                                <!-- Mostrar imágenes -->
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                    @if ($caja->imagenes && is_array($caja->imagenes))
                                    <div class="d-flex justify-content-center align-content-center align-items-center">
                                        <img src="data:image/jpeg;base64,{{ $caja->imagenes[0] }}" alt="Imagen de la caja" class="h-16 w-16 object-cover mb-2">
                                        <span>Total Imagenes: {{ count($caja->imagenes) }}</span>
                                    </div>
                                    @else
                                    No Image
                                    @endif
                                </td>

                                <!-- Botón para cambiar disponibilidad de la caja -->
                                <td class="border px-4 py-2 text-center">
                                    <form action="{{ route('cajas.toggleDisponible', $caja->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                                            {{ $caja->disponibilidad ? 'Marcar No Disponible' : 'Marcar Disponible' }}
                                        </button>
                                    </form>
                                </td>


                               
                                <!-- Botones de acciones -->
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('cajas.edit', $caja->id) }}" class="btn-edit mr-2">Editar</a>
                                        <!-- Formulario para eliminar la caja -->
                                        <form action="{{ route('cajas.destroy', $caja->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta caja?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $cajas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Estilos para los botones de acciones -->
<style>
    .btn-edit,
    .btn-delete {
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .btn-edit {
        background-color: cyan;
        /* Color para el botón de editar */
    }

    .btn-edit:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-delete {
        background-color: #cc0000;
        /* Color para el botón de eliminar */
    }

    .btn-delete:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Confirmación de eliminación -->
<script>
    function confirmDelete(id) {
        alertify.confirm("¿Confirmar la eliminación del registro?",
            function() {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/cajas/' + id;
                form.innerHTML = '@csrf @method('
                DELETE ')';
                document.body.appendChild(form);
                form.submit();
                alertify.success('Registro eliminado');
            },
            function() {
                alertify.error('Cancelado');
            });
    }
</script>