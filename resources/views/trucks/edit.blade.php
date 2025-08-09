<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Edit Truck') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form method="POST" action="{{ route('trucks.update', $truck->id) }}" enctype="multipart/form-data" class="max-w-3xl mx-auto">
                    @csrf
                    @method('PUT')

                    <!-- Marca -->
                    <div class="mb-5">
                        <label for="marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marca</label>
                        <input type="text" name="marca" id="marca" value="{{ old('marca', $truck->marca) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>

                    <!-- Modelo -->
                    <div class="mb-5">
                        <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
                        <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $truck->modelo) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>

                    <!-- Año -->
                    <div class="mb-5">
                        <label for="ano" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año</label>
                        <input type="number" name="ano" id="ano" value="{{ old('ano', $truck->ano) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>

                    <!-- Motor -->
                    <div class="mb-5">
                        <label for="motor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motor</label>
                        <input type="text" name="motor" id="motor" value="{{ old('motor', $truck->motor) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Transmisión -->
                    <div class="mb-5">
                        <label for="transmision" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transmisión</label>
                        <input type="text" name="transmision" id="transmision" value="{{ old('transmision', $truck->transmision) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Documentación actual -->
                    <div class="mb-5">
                        <label for="documentacion_actual" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Documentación actual</label>
                        <p class="text-gray-600 dark:text-gray-300" style="color: red;">Selecciona los documentos para eliminarlos.</p> <!-- Mensaje añadido -->
                        <div class="flex flex-wrap space-x-4">
                            @if($truck->documentacion)
                            @php
                            $documentacion = is_array($truck->documentacion) ? $truck->documentacion : json_decode($truck->documentacion);
                            @endphp
                            @foreach($documentacion as $index => $documento)
                            <div class="relative">
                                <a href="data:application/octet-stream;base64,{{ $documento }}" target="_blank" class="text-blue-500 underline">
                                    Ver documento {{ $index + 1 }}
                                </a>
                                <input type="checkbox" name="documentos_a_eliminar[]" value="{{ $index }}" class="ml-2">
                            </div>
                            @endforeach
                            @else
                            <p>No hay documentación disponible.</p>
                            @endif
                        </div>
                    </div>



                    <!-- Campo para subir nueva documentación -->
                    <div class="mb-5">
                        <label for="documentacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir nueva documentación</label>
                        <input type="file" name="documentacion[]" id="documentacion" multiple
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Kilometraje -->
                    <div class="mb-5">
                        <label for="kilometraje" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kilometraje</label>
                        <input type="number" name="kilometraje" id="kilometraje" value="{{ old('kilometraje', $truck->kilometraje) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Torque -->
                    <div class="mb-5">
                        <label for="torque" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Torque</label>
                        <input type="number" name="torque" id="torque" value="{{ old('torque', $truck->torque) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Color -->
                    <div class="mb-5">
                        <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                        <input type="text" name="color" id="color" value="{{ old('color', $truck->color) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Combustible -->
                    <div class="mb-5">
                        <label for="combustible" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Combustible</label>
                        <input type="text" name="combustible" id="combustible" value="{{ old('combustible', $truck->combustible) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Número de Serie -->
                    <div class="mb-5">
                        <label for="numero_serie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de Serie</label>
                        <input type="text" name="numero_serie" id="numero_serie" value="{{ old('numero_serie', $truck->numero_serie) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Ejes Delanteros -->
                    <div class="mb-5">
                        <label for="ejes_delanteros" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ejes Delanteros</label>
                        <input type="text" name="ejes_delanteros" id="ejes_delanteros" value="{{ old('ejes_delanteros', $truck->ejes_delanteros) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Ejes Traseros -->
                    <div class="mb-5">
                        <label for="ejes_traseros" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ejes Traseros</label>
                        <input type="text" name="ejes_traseros" id="ejes_traseros" value="{{ old('ejes_traseros', $truck->ejes_traseros) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Diferencial -->
                    <div class="mb-5">
                        <label for="diferencial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diferencial</label>
                        <input type="text" name="diferencial" id="diferencial" value="{{ old('diferencial', $truck->diferencial) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Tipo de Camarote -->
                    <div class="mb-5">
                        <label for="tipo_camarote" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Camarote</label>
                        <input type="text" name="tipo_camarote" id="tipo_camarote" value="{{ old('tipo_camarote', $truck->tipo_camarote) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                         <!-- Imágenes actuales con opción de orden -->
                         <div class="mb-5">
                        <label for="imagenes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imágenes actuales</label>
                        <p class="text-gray-600 dark:text-gray-300" style="color: red;">Selecciona las imágenes para eliminarlas y ajusta su orden.</p>

                        <!-- Botón para seleccionar todas las imágenes -->
                        <div class="mb-2">
                            <button type="button" id="select-all" class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                                Seleccionar Todas
                            </button>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @if($truck->imagenes)
                            @php
                            $imagenes = is_array($truck->imagenes) ? $truck->imagenes : json_decode($truck->imagenes);
                            @endphp
                            @foreach($imagenes as $index => $imagen)
                            <div class="relative bg-gray-50 border border-gray-200 rounded-lg p-2">
                                <img src="data:image/jpeg;base64,{{ $imagen }}" alt="Imagen del camión" class="h-32 w-full object-cover mb-2 rounded-lg">
                                
                                <!-- Campo numérico para ordenar imágenes -->
                                <label for="orden_imagen_{{ $index }}" class="block text-sm font-medium text-gray-700 dark:text-white">Orden</label>
                                <input type="number" name="orden_imagenes[{{ $index }}]" value="{{ $index + 1 }}" id="orden_imagen_{{ $index }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">

                                <!-- Checkbox para eliminar imágenes -->
                                <div class="flex items-center mt-2">
                                    <input type="checkbox" name="imagenes_a_eliminar[]" value="{{ $index }}" class="form-checkbox h-4 w-4 text-red-600 transition duration-150 ease-in-out">
                                    <label class="ml-2 text-red-600" title="Eliminar imagen">Eliminar</label>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No hay imágenes disponibles.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Botón para eliminar imágenes seleccionadas con ícono -->
                    <div class="mb-5">
                        <button type="submit" formaction="{{ route('trucks.update', $truck->id) }}" formmethod="POST" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                            <i class="bi bi-trash-fill"></i> Eliminar Imágenes Seleccionadas
                        </button>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ordenar imágenes</button>
                    </div>

                    <!-- Campo para subir nuevas imágenes -->
                    <div class="mb-5">
                        <label for="imagenes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir nuevas imágenes</label>
                        <input type="file" name="imagenes[]" id="imagenes" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Precio -->
                    <div class="mb-5">
                        <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                        <input type="number" name="precio" id="precio" value="{{ old('precio', $truck->precio) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Datos Adicionales -->
                    <div class="mb-5">
                        <label for="datos_adicionales" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Datos Adicionales</label>
                        <textarea name="datos_adicionales" id="datos_adicionales" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">{{ old('datos_adicionales', $truck->datos_adicionales) }}</textarea>
                    </div>

                    <!-- Botones para guardar o cancelar -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                    <a href="{{ route('trucks.index') }}" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('select-all').addEventListener('click', function() {
        const checkboxes = document.querySelectorAll('.form-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = true);
    });
</script>