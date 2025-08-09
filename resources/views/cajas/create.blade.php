<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Caja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8" id="formContainer">
                <!-- Formulario para crear una caja -->
                <form method="POST" action="{{ route('cajas.store') }}" enctype="multipart/form-data"
                    class="max-w-sm mx-auto" onsubmit="showLoadingSpinner()">
                    @csrf

                    <!-- Tipo de Caja -->
                    <div class="mb-5">
                        <label for="tipo_caja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Caja</label>
                        <input type="text" name="tipo_caja" id="tipo_caja" value="{{ old('tipo_caja') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('tipo_caja') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tamaño -->
                    <div class="mb-5">
                        <label for="tamano" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tamaño</label>
                        <input type="text" name="tamano" id="tamano" value="{{ old('tamano') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blu>
                        @error('tamano') <span class=" text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Marca -->
                    <div class="mb-5">
                        <label for="marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marca:</label>
                        <input type="text" name="marca" id="marca" value="{{ old('marca') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('marca') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Año -->
                    <div class="mb-5">
                        <label for="ano" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año:</label>
                        <input type="text" name="ano" id="ano" value="{{ old('ano') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('ano') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>


                    <!-- Condición -->
                    <div class="mb-5">
                        <label for="condicion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condición:</label>
                        <input type="text" name="condicion" id="condicion" value="{{ old('condicion') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('condicion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>


                    <!-- Precio -->
                    <div class="mb-5">
                        <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio:</label>
                        <input type="text" name="precio" id="precio" value="{{ old('precio') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('precio') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Disponibilidad -->
                    <label for="disponibilidad">Disponibilidad:</label>
                    <select name="disponibilidad" id="disponibilidad">
                        <option value="1" {{ old('disponibilidad') == '1' ? 'selected' : '' }}>Disponible</option>
                        <option value="0" {{ old('disponibilidad') == '0' ? 'selected' : '' }}>No disponible</option>
                    </select>
                    @error('disponibilidad') <div>{{ $message }}</div> @enderror


                    <!-- Tipo de suspensión  -->
                    <div class="mb-5">
                        <label for="tipo_suspension" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de suspensión:</label>
                        <input type="text" name="tipo_suspension" id="tipo_suspension" value="{{ old('tipo_suspension') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('tipo_suspension') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Bolsas de aire -->
                    <label for="bolsas_aire">Bolsas de aire:</label>
                    <select name="bolsas_aire" id="bolsas_aire">
                        <option value="1" {{ old('bolsas_aire') == '1' ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ old('bolsas_aire') == '0' ? 'selected' : '' }}>No</option>
                    </select>
                    @error('bolsas_aire') <div>{{ $message }}</div> @enderror



                    <!-- Número de ejes -->
                    <div class="mb-5">
                        <label for="numero_ejes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de ejes:</label>
                        <input type="text" name="numero_ejes" id="numero_ejes" value="{{ old('numero_ejes') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('numero_ejes') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>


                    <!-- Frenos -->
                    <div class="mb-5">
                        <label for="frenos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frenos:</label>
                        <input type="text" name="frenos" id="frenos" value="{{ old('frenos') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('frenos') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>


                    <!-- Tipo de puertas: -->
                    <div class="mb-5">
                        <label for="tipo_puertas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de puertas:</label>
                        <input type="text" name="tipo_puertas" id="tipo_puertas" value="{{ old('tipo_puertas') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('tipo_puertas') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Capacidad de carga: -->
                    <div class="mb-5">
                        <label for="capacidad_carga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacidad de carga:</label>
                        <input type="text" name="capacidad_carga" id="capacidad_carga" value="{{ old('capacidad_carga') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('capacidad_carga') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tipo de motor -->
                    <div class="mb-5">
                        <label for="tipo_motor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de motor:</label>
                        <input type="text" name="tipo_motor" id="tipo_motor" value="{{ old('tipo_motor') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('tipo_motor') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Campo Imágenes (Base64) -->
                    <div class="mb-5">
                        <label for="imagenes"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imágenes</label>
                        <input type="file" name="imagenes[]" id="imagenes"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            multiple accept="image/*">
                        @error('imagenes.*')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Repite el mismo formato para el resto de los campos -->

                    <!-- Botón para enviar el formulario -->
                    <div class="flex items-center justify-end">
                        <button type="submit"
                            class="bg-blue-500 dark:bg-blue-700 hover:bg-blue-600 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                            {{ __('Crear Caja') }}
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
                    <p class="loading-text">Subiendo información de la caja...</p>
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

        .upload-duration {
            font-size: 14px;
            margin-top: 10px;
            color: #555;
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
                transform: translateX(0) translateY(0);
                opacity: 0.8;
            }

            100% {
                transform: translateX(33px) translateY(0px);
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
            background-image: repeating-linear-gradient(90deg,
                    white 0%,
                    white 7%,
                    #333 7%,
                    #333 30%);
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            animation: roadMove 2s linear infinite;
        }

        .progress-bar {
            width: 400px;
            height: 12px;
            background-color: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin-top: 10px;
        }

        .progress {
            height: 100%;
            width: 0;
            background-color: red;
            animation: loadProgress 5s ease-in-out forwards, pulse 1.5s ease-in-out infinite;
            box-shadow: 0 0 8px rgba(255, 0, 0, 0.8);
        }

        @keyframes loadProgress {
            0% {
                width: 0;
            }

            100% {
                width: 100%;
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .success-animation {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            animation: fadein 0.5s ease-in-out;
        }

        .checkmark-circle {
            width: 100px;
            height: 100px;
            position: relative;
            margin-top: 20px;
        }

        .checkmark-circle .background {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #28a745;
            position: absolute;
            top: 0;
            left: 0;
        }

        .checkmark {
            width: 80px;
            height: 40px;
            border-radius: 2px;
            border-width: 8px;
            border-style: solid;
            border-color: white;
            border-top: none;
            border-right: none;
            position: absolute;
            top: 25px;
            left: 10px;
            transform: rotate(-45deg);
            animation: drawCheck 0.8s ease-in-out forwards;
        }

        .success-text {
            font-size: 18px;
            color: #28a745;
            margin-top: 10px;
            font-weight: bold;
        }

        @keyframes fadein {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes drawCheck {
            0% {
                height: 0;
                width: 0;
            }

            50% {
                height: 40px;
                width: 0;
            }

            100% {
                height: 40px;
                width: 80px;
            }
        }
    </style>

    <script>
        function showLoadingSpinner() {
            document.getElementById('formContainer').style.display = 'none';
            document.getElementById('loadingSpinner').style.display = 'flex';
        }
    </script>
</x-app-layout>