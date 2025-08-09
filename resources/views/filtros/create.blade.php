<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo Filtro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8" id="formContainer">

                <!-- Mensaje de éxito con animación -->
                @if (session('success'))
                <div id="success-message" class="bg-green-500 text-white text-center py-2 px-4 rounded-lg mb-6 animate__animated animate__fadeInDown">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                </div>
                @endif

                <!-- Formulario de creación de filtro -->
                <form action="{{ route('filtros.store') }}" method="POST" onsubmit="showLoadingSpinner()">
                    @csrf

                    <!-- Campo para la Sección -->
                    <div class="mb-5">
                        <label for="seccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sección</label>
                        <select name="seccion" id="seccion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="cajas">Cajas</option>
                            <option value="unidades">Unidades</option>
                        </select>
                    </div>

                    <!-- Campo para Tipo de Filtro -->
                    <div class="mb-5">
                        <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Filtro</label>
                        <input list="tipos_filtros" name="tipo" id="tipo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Seleccione o ingrese un nuevo tipo" required>

                        <datalist id="tipos_filtros">
                            @foreach ($tipos_filtros as $tipo)
                            <option value="{{ $tipo }}">{{ ucfirst($tipo) }}</option>
                            @endforeach
                        </datalist>
                    </div>



                    <!-- Campo para Valor del Filtro -->
                    <div class="mb-5">
                        <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor del Filtro</label>
                        <input type="text" name="valor" id="valor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>

                    <!-- Botón para Crear el Filtro -->
                    <div class="flex items-center justify-end">
                        <button type="submit"
                            class="bg-blue-500 dark:bg-blue-700 hover:bg-blue-600 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                            {{ __('Crear Filtro') }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Loader oculto al inicio -->
            <div id="loadingSpinner" class="loader" style="display: none;">
                <div class="loader-content">
                    <div class="wind-effect">
                        <div class="wind-lines">
                            <div class="line line1"></div>
                            <div class="line line2"></div>
                            <div class="line line3"></div>
                        </div>
                        <img src="{{ asset('img/enviado.png') }}" alt="Cargando caja" class="truck-icon">
                    </div>
                    <div class="road"></div>
                    <p class="loading-text">Guardando filtro...</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .loader {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .loader-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadein 0.5s ease-in-out;
        }

        .wind-effect {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            user-select: none;
            -webkit-user-drag: none;
        }

        .wind-lines {
            position: absolute;
            left: -100px;
            top: 25px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .line {
            width: 80px;
            height: 4px;
            background-color: gray;
            border-radius: 2px;
            opacity: 0.8;
            animation: windMove 2s linear infinite;
        }

        .line1 {
            animation-delay: 0s;
        }

        .line2 {
            animation-delay: 0.5s;
        }

        .line3 {
            animation-delay: 1s;
        }

        @keyframes windMove {
            0% {
                transform: translateX(0);
                opacity: 0.8;
            }

            100% {
                transform: translateX(33px);
                opacity: 0;
            }
        }

        .truck-icon {
            width: 100px;
            margin-bottom: 0px;
            position: relative;
            z-index: 1;
            animation: truckMove 0.5s ease-in-out infinite alternate;
        }

        @keyframes truckMove {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-3px);
            }
        }

        .road {
            width: 400px;
            height: 20px;
            background-color: #333;
            position: relative;
            overflow: hidden;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        .road::before {
            content: '';
            display: block;
            width: 100%;
            height: 6px;
            background-image: repeating-linear-gradient(90deg, white 0%, white 7%, #333 7%, #333 30%);
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            animation: roadMove 2s linear infinite;
        }
    </style>

    <script>
        function showLoadingSpinner() {
            document.getElementById('formContainer').style.display = 'none';
            document.getElementById('loadingSpinner').style.display = 'flex';
        }
    </script>
</x-app-layout>