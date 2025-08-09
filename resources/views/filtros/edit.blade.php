<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Filtro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form method="POST" action="{{ route('filtros.update', $filtro->id) }}" class="max-w-3xl mx-auto">
                    @csrf
                    @method('PATCH')

                    <!-- Sección -->
                    <div class="mb-5">
                        <label for="seccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sección</label>
                        <select name="seccion" id="seccion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                            <option value="cajas" {{ old('seccion', $filtro->seccion) == 'cajas' ? 'selected' : '' }}>Cajas</option>
                            <option value="unidades" {{ old('seccion', $filtro->seccion) == 'unidades' ? 'selected' : '' }}>Unidades</option>
                        </select>
                    </div>

                    <!-- Tipo de Filtro -->
                    <div class="mb-5">
                        <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Filtro</label>
                        <input type="text" name="tipo" id="tipo" value="{{ old('tipo', $filtro->tipo) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>

                    <!-- Valor del Filtro -->
                    <div class="mb-5">
                        <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor del Filtro</label>
                        <input type="text" name="valor" id="valor" value="{{ old('valor', $filtro->valor) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>

                    <!-- Botones para guardar o cancelar -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Guardar</button>
                    <a href="{{ route('filtros.index') }}" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
