<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8"
                id="formContainer">
                <!-- Formulario para crear un camión -->
                <form method="POST" action="{{ route('trucks.store') }}" enctype="multipart/form-data"
                    class="max-w-sm mx-auto" onsubmit="showLoadingSpinner()">
                    @csrf
                    <!-- Campo Nombre del Artículo -->
                    <div class="mb-5">
                        <label for="nombre_articulo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del
                            Artículo</label>
                        <input list="articulos" name="nombre_articulo" id="nombre_articulo"
                            value="{{ old('nombre_articulo') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        <datalist id="articulos">
                            <option value="Taza Sublimada">
                            <option value="Taza Personalizada">
                            <option value="Termo Sublimable">
                            <option value="Termo Personalizado">
                            <option value="Termo Yeti">
                            <option value="Camiseta Sublimada">
                            <option value="Camiseta Personalizada">
                            <option value="Almohadilla Sublimada">
                            <option value="Almohadilla Personalizada">
                            <option value="Coaster de Madera Sublimado">
                            <option value="Coaster Personalizado">
                            <option value="Bolso Sublimado">
                            <option value="Bolso Personalizado">
                            <option value="Gorra Sublimada">
                            <option value="Gorra Personalizada">
                            <option value="Póster Personalizado">
                            <option value="Placa Sublimada">
                            <option value="Foto sobre lienzo">
                            <option value="Pared 3D Personalizada">
                            <option value="Rompecabezas Sublimado">
                            <option value="Rompecabezas Personalizado">
                            <option value="Termo de Viaje">
                            <option value="Mochila Sublimada">
                            <option value="Mochila Personalizada">
                            <option value="Portavasos Sublimado">
                            <option value="Taza de Viaje Sublimada">
                            <option value="Cinturón Personalizado">
                            <option value="Pañuelo Sublimado">
                        </datalist>
                        @error('nombre_articulo')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- ¿El artículo ocupa talla o capacidad? -->
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            ¿El artículo ocupa talla o capacidad?
                        </label>
                        <select id="tipo_medida" name="tipo_medida"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white"
                            onchange="mostrarCampos()">
                            <option value="">Seleccionar</option>
                            <option value="talla">Talla</option>
                            <option value="capacidad">Capacidad</option>
                        </select>
                    </div>

                    <!-- Tallas (visible si aplica) -->
                    <div id="campo_talla" class="mb-5 hidden">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tallas
                            disponibles</label>

                        <!-- Checkbox para seleccionar las tallas -->
                        <div id="talla-options" class="flex flex-wrap gap-2">
                            <div class="flex items-center">
                                <input type="checkbox" name="talla[]" value="XS" id="talla-xs"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="talla-xs" class="ml-2 text-sm text-gray-900 dark:text-white">XS</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="talla[]" value="S" id="talla-s"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="talla-s" class="ml-2 text-sm text-gray-900 dark:text-white">S</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="talla[]" value="M" id="talla-m"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="talla-m" class="ml-2 text-sm text-gray-900 dark:text-white">M</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="talla[]" value="L" id="talla-l"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="talla-l" class="ml-2 text-sm text-gray-900 dark:text-white">L</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="talla[]" value="XL" id="talla-xl"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="talla-xl" class="ml-2 text-sm text-gray-900 dark:text-white">XL</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="talla[]" value="XXL" id="talla-xxl"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="talla-xxl" class="ml-2 text-sm text-gray-900 dark:text-white">XXL</label>
                            </div>
                        </div>
                    </div>


                    <!-- Capacidad (visible si aplica) -->
                    <div id="campo_capacidad" class="mb-5 hidden">
                        <label for="capacidad"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacidad (en oz o
                            ml)</label>
                        <input type="text" name="capacidad" id="capacidad" placeholder="Ej. 11 oz, 500 ml"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Colores disponibles -->
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Colores
                            disponibles</label>

                        <!-- Cuadros de color -->
                        <div id="color-options" class="flex flex-wrap gap-2">
                            <!-- Colores predefinidos -->
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Rojo"
                                style="background-color: red;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Negro"
                                style="background-color: black;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Blanco"
                                style="background-color: white;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Azul"
                                style="background-color: blue;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Verde"
                                style="background-color: green;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Amarillo"
                                style="background-color: yellow;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Rosa"
                                style="background-color: pink;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Morado"
                                style="background-color: purple;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Naranja"
                                style="background-color: orange;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Gris"
                                style="background-color: gray;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Turquesa"
                                style="background-color: turquoise;"></div>
                            <div class="w-8 h-8 rounded cursor-pointer border border-gray-400" data-color="Lima"
                                style="background-color: lime;"></div>
                        </div>

                        <!-- Input donde se guarda el string -->
                        <input type="text" name="colores" id="colores" readonly
                            class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white"
                            placeholder="Selecciona los colores disponibles" />
                        <small class="text-gray-500 dark:text-gray-400">Haz clic en los colores para
                            seleccionarlos</small>
                    </div>

                    <!-- Script para manejar selección -->
                    <script>
                        const colorOptions = document.querySelectorAll('#color-options div');
                        const colorInput = document.getElementById('colores');
                        let selectedColors = [];

                        colorOptions.forEach(box => {
                            box.addEventListener('click', () => {
                                const color = box.getAttribute('data-color');

                                if (selectedColors.includes(color)) {
                                    selectedColors = selectedColors.filter(c => c !== color);
                                    box.classList.remove('ring-2', 'ring-black');
                                } else {
                                    selectedColors.push(color);
                                    box.classList.add('ring-2', 'ring-black');
                                }

                                colorInput.value = selectedColors.join(',');
                            });
                        });
                    </script>


                    <!-- Tipo de Impresión (checkboxes) -->
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                            Impresión</label>
                        <div class="grid grid-cols-2 gap-2">
                            @php
                                $impresiones = ['Sublimación Completa', 'Vinil Textil', 'Vinil Adhesivo', 'Serigrafía', 'DTF', 'Grabado Láser', 'Otra'];
                            @endphp
                            @foreach ($impresiones as $impresion)
                                <label class="flex items-center space-x-2 text-gray-900 dark:text-white">
                                    <input type="checkbox" name="tipo_impresion[]" value="{{ $impresion }}"
                                        class="form-checkbox rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                                    <span>{{ $impresion }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Cantidad en stock -->
                    <div class="mb-5">
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad
                            en stock</label>
                        <input type="number" name="stock" id="stock" min="0"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                    </div>




                    <!-- Campo Disponibilidad en Stock -->
                    <div class="mb-5">
                        <label for="disponibilidad"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disponibilidad en
                            Stock</label>
                        <select name="disponibilidad" id="disponibilidad"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="En stock">En stock</option>
                            <option value="Agotado">Agotado</option>
                            <option value="Bajo pedido">Bajo pedido</option>
                        </select>
                    </div>

                    <!-- Campo SKU o Código Interno -->
                    <div class="mb-5">
                        <label for="sku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKU o
                            Código Interno</label>
                        <input type="text" name="sku" id="sku" placeholder="Ej. SKU-00123"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>


                    <!-- Campo Precio -->
                    <div class="mb-5">
                        <label for="precio"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                        <input type="number" name="precio" id="precio" value="{{ old('precio') }}" step="0.01"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('precio')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <script>
                        function mostrarCampos() {
                            const tipo = document.getElementById('tipo_medida').value;
                            document.getElementById('campo_talla').classList.add('hidden');
                            document.getElementById('campo_capacidad').classList.add('hidden');

                            if (tipo === 'talla') {
                                document.getElementById('campo_talla').classList.remove('hidden');
                            } else if (tipo === 'capacidad') {
                                document.getElementById('campo_capacidad').classList.remove('hidden');
                            }
                        }
                    </script>


                    <!-- Campo Documentación (PDF/Word) -->
                    <div class="mb-5">
                        <label for="documentacion"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Documentación
                            (PDF/Word)</label>
                        <input type="file" name="documentacion[]" id="documentacion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            multiple>
                        @error('documentacion.*')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
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

                    <!-- Botón para enviar el formulario -->
                    <div class="flex items-center justify-end">
                        <button type="submit"
                            class="bg-blue-500 dark:bg-blue-700 hover:bg-blue-600 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                            {{ __('Create Truck') }}
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
                        <img src="{{ asset('img/enviado.png') }}" alt="Camión de envío" class="truck-icon">
                    </div>
                    <div class="road"></div>
                    <p class="loading-text">Subiendo información de la unidad...</p>
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
            // Ocultar el formulario y mostrar el loader
            document.getElementById('formContainer').style.display = 'none';
            document.getElementById('loadingSpinner').style.display = 'flex';
        }
    </script>
</x-app-layout>
--funcioan