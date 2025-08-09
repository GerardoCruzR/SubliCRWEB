<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Caja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form method="POST" action="{{ route('cajas.update', $caja->id) }}" enctype="multipart/form-data" class="max-w-3xl mx-auto">
                    @csrf
                    @method('PUT')

                    <!-- Tipo de Caja -->
                    <div class="mb-5">
                        <label for="tipo_caja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Caja</label>
                        <input type="text" name="tipo_caja" id="tipo_caja" value="{{ old('tipo_caja', $caja->tipo_caja) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>

                    <!-- Tamaño -->
                    <div class="mb-5">
                        <label for="tamano" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tamaño</label>
                        <input type="text" name="tamano" id="tamano" value="{{ old('tamano', $caja->tamano) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>

                    <!-- Marca -->
                    <div class="mb-5">
                        <label for="marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marca</label>
                        <input type="text" name="marca" id="marca" value="{{ old('marca', $caja->marca) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Año -->
                    <div class="mb-5">
                        <label for="ano" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año</label>
                        <input type="number" name="ano" id="ano" value="{{ old('ano', $caja->ano) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Condición -->
                    <div class="mb-5">
                        <label for="condicion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condición</label>
                        <input type="text" name="condicion" id="condicion" value="{{ old('condicion', $caja->condicion) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Precio -->
                    <div class="mb-5">
                        <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                        <input type="number" name="precio" id="precio" value="{{ old('precio', $caja->precio) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Tipo de Suspensión -->
                    <div class="mb-5">
                        <label for="tipo_suspension" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Suspensión</label>
                        <input type="text" name="tipo_suspension" id="tipo_suspension" value="{{ old('tipo_suspension', $caja->tipo_suspension) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Bolsas de Aire -->
                    <div class="mb-5">
                        <label for="bolsas_aire" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bolsas de Aire</label>
                        <select name="bolsas_aire" id="bolsas_aire" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                            <option value="1" {{ old('bolsas_aire', $caja->bolsas_aire) == 1 ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('bolsas_aire', $caja->bolsas_aire) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <!-- Número de Ejes -->
                    <div class="mb-5">
                        <label for="numero_ejes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de Ejes</label>
                        <input type="number" name="numero_ejes" id="numero_ejes" value="{{ old('numero_ejes', $caja->numero_ejes) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Frenos -->
                    <div class="mb-5">
                        <label for="frenos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frenos</label>
                        <input type="text" name="frenos" id="frenos" value="{{ old('frenos', $caja->frenos) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Tipo de Puertas -->
                    <div class="mb-5">
                        <label for="tipo_puertas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Puertas</label>
                        <input type="text" name="tipo_puertas" id="tipo_puertas" value="{{ old('tipo_puertas', $caja->tipo_puertas) }}" placeholder="Ejemplo: Puertas de cortina, Puertas batientes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>


                    <!-- Capacidad de Carga -->
                    <div class="mb-5">
                        <label for="capacidad_carga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacidad de Carga</label>
                        <input type="text" name="capacidad_carga" id="capacidad_carga" value="{{ old('capacidad_carga', $caja->capacidad_carga) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Tipo de Motor (Solo para cajas refrigeradas) -->
                    <div class="mb-5">
                        <label for="tipo_motor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Motor (Solo para cajas refrigeradas)</label>
                        <input type="text" name="tipo_motor" id="tipo_motor" value="{{ old('tipo_motor', $caja->tipo_motor) }}" placeholder="Ejemplo: Carrier, Thermo King" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Imágenes actuales con opción de eliminar -->
                    <div class="mb-5">
                        <label for="imagenes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imágenes actuales</label>
                        <p class="text-gray-600 dark:text-gray-300">Selecciona las imágenes para eliminarlas.</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @if($caja->imagenes && is_array($caja->imagenes))
                            @foreach($caja->imagenes as $index => $imagen)
                            <div class="relative">
                                <img src="data:image/jpeg;base64,{{ $imagen }}" alt="Imagen de la caja" class="h-32 w-full object-cover mb-2 rounded-lg">
                                <input type="checkbox" name="imagenes_a_eliminar[]" value="{{ $index }}" class="form-checkbox h-4 w-4 text-red-600">
                                <label class="ml-2 text-red-600">Eliminar</label>
                            </div>
                            @endforeach
                            @else
                            <p>No hay imágenes disponibles.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Subir nuevas imágenes -->
                    <div class="mb-5">
                        <label for="imagenes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir nuevas imágenes</label>
                        <input type="file" name="imagenes[]" id="imagenes" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <!-- Botones para guardar o cancelar -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Guardar</button>
                    <a href="{{ route('cajas.index') }}" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>