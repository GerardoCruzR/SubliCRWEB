<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight animate__animated animate__fadeInDown">
            {{ __('Gestión de Filtros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8 animate__animated animate__fadeInUp">

                <!-- Botón para crear un nuevo filtro -->
                <div class="mb-4">
                    <a href="{{ route('filtros.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded animate__animated animate__pulse animate__infinite">
                        {{ __('Agregar Nuevo Filtro') }}
                    </a>
                </div>

                <!-- Formulario de filtrado dinámico con selects -->
                <form method="GET" action="{{ route('filtros.index') }}" class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="animate__animated animate__fadeInLeft">
                            <label for="seccion" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Filtrar por Sección:</label>
                            <select name="seccion" id="seccion" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-200">
                                <option value="">Todas</option>
                                <option value="cajas" {{ request('seccion') == 'cajas' ? 'selected' : '' }}>Cajas</option>
                                <option value="unidades" {{ request('seccion') == 'unidades' ? 'selected' : '' }}>Unidades</option>
                            </select>
                        </div>
                        <div class="animate__animated animate__fadeInLeft">
                            <label for="tipo" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Filtrar por Tipo:</label>
                            <select name="tipo" id="tipo" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-200">
                                <option value="">Todos</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo }}" {{ request('tipo') == $tipo ? 'selected' : '' }}>
                                        {{ $tipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="animate__animated animate__fadeInRight">
                            <label for="valor" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Filtrar por Valor:</label>
                            <select name="valor" id="valor" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-200">
                                <option value="">Todos</option>
                                @foreach ($valores as $valor)
                                    <option value="{{ $valor }}" {{ request('valor') == $valor ? 'selected' : '' }}>
                                        {{ $valor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-end animate__animated animate__fadeInUp">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                {{ __('Filtrar') }}
                            </button>
                            <a href="{{ route('filtros.index') }}" class="ml-2 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                {{ __('Limpiar Filtros') }}
                            </a>
                        </div>
                    </div>
                </form>

                <!-- Mostrar la lista de filtros -->
                <div class="overflow-x-auto animate__animated animate__fadeInUp">
                    <table class="table-auto w-full whitespace-nowrap">
                        <thead class="animate__animated animate__bounceIn">
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">#</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Sección</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Tipo</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Valor</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filtros as $filtro)
                            <tr class="animate__animated animate__fadeInUp">
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $filtro->id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center font-bold text-blue-500">{{ $filtro->seccion }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $filtro->tipo }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $filtro->valor }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('filtros.edit', $filtro->id) }}" class="btn-edit mr-2">Editar</a>
                                        <!-- Formulario para eliminar el filtro -->
                                        <form action="{{ route('filtros.destroy', $filtro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este filtro?');">
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
                <div class="mt-4 animate__animated animate__fadeInUp">
                    {{ $filtros->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Estilos para los botones de acciones y animaciones -->
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
    }

    .btn-edit:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-delete {
        background-color: #cc0000;
    }

    .btn-delete:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Animaciones en las tablas */
    table tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.05);
        transition: background-color 0.3s ease-in-out;
    }
</style>

<!-- Incluyendo Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
