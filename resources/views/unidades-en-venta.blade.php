<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unidades en Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <style>
        /* Estilo para la animación del título */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            50% {
                opacity: 0.5;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-title {
            animation: fadeInUp 1s ease-in-out forwards;
            opacity: 0;
            transition: color 0.3s, transform 0.3s;
        }

        .animated-title:hover {
            color: #ff4500;
            transform: scale(1.1);
            text-shadow: 0 0 10px rgba(255, 69, 0, 0.8);
        }

        /* Animación para el filtro */
        .filter-section {
            transition: height 0.3s ease, opacity 0.3s ease;
            /* Para la animación de ocultar/mostrar */
            overflow: hidden;
            /* Para ocultar el contenido al cerrar */
            height: 0;
            /* Inicia oculta */
            opacity: 0;
            /* Inicia oculta */
        }

        .filter-section.visible {
            height: auto;
            opacity: 1;
            /* Aparece cuando se hace visible */
        }

        .status-badge {
            top: 10px;
            left: 10px;
            z-index: 10;
            padding: 8px 15px;
            font-size: 14px;
        }

        .model-card .img-container {
            position: relative;
        }

        .model-card img {
            max-width: 100%;
            max-height: 150px;
            object-fit: contain;
            display: block;
            border-radius: 5px;
            margin-left: auto;
            margin-right: auto;
        }


        .model-card {
            background-color: #1d1f1e;
            color: white;
            border: 1px solid #444;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 550px;
            transition: transform 0.2s;
            min-height: 400px;
            /* Ajuste para garantizar el mismo tamaño mínimo en todas las tarjetas */
        }

        .model-card:hover {
            transform: scale(1.02);
        }

        .model-card-body {
            flex-grow: 1;
        }

        .price-badge {
            font-size: 16px;
            padding: 5px 8px;
        }

        .card-title {
            font-size: 20px;
            color: white;
        }

        .card-body .d-flex div {
            font-size: 14px;
        }

        .model-section {
            background-color: #272a28;
        }

        /* Estilos para los filtros */
        .filter-section {
            background-color: #2b2e2e;
            border-radius: 5px;
            padding: 30px;
            position: sticky !important;
            top: 10px;
            /* Ajusta la distancia desde el borde superior */

        }

        .filter-section h5 {
            color: white;
        }

        .filter-option {
            color: #bbbbbb;
        }

        .filter-option label {
            margin-bottom: 0.5rem;
        }

        /* Efecto hover para el botón "Ver más" */
        .ver-mas {
            transition: all 0.3s ease;
            /* Transición suave de todos los estilos */
        }

        .ver-mas:hover {
            background-color: #ff4500;
            /* Cambiar color de fondo en hover */
            transform: scale(1.05);
            /* Aumentar ligeramente el tamaño en hover */
        }

        @media (min-width: 768px) {
            .col-md-6 {
                margin-bottom: 0;
            }
        }

        /* Estilo del botón de "Abrir Filtros" */
        .filter-toggle {
            width: 100%;
            /* El botón tendrá un ancho del 100% */
            text-align: center;
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid red;
            /* Borde rojo */
            border-radius: 5px;
            /* Bordes redondeados */
            background-color: black;
            font-weight: bold;
            transition: all 0.3s ease;
            /* Transición suave */
        }

        /* Efecto hover: Cambia el color de fondo y agrega sombra */
        .filter-toggle:hover {
            background-color: #ff4500;
            color: white;
            box-shadow: 0 0 10px rgba(255, 69, 0, 0.8);
            transform: scale(1.05);
            /* Ligeramente más grande */
        }

        /* Efecto al hacer clic (active): se presiona ligeramente */
        .filter-toggle:active {
            transform: scale(0.95);
            /* Reducir un poco el tamaño para simular presión */
            box-shadow: none;
            /* Eliminar la sombra al presionar */
        }

        /* Mostrar el botón solo en pantallas pequeñas */
        /* Mostrar la sección del filtro en pantallas grandes */
        @media (min-width: 769px) {
            .filter-section {
                height: auto;
                opacity: 1;
                display: block;
                /* Asegurarse que esté visible */
            }

            .filter-toggle {
                display: none;
                /* Ocultar el botón "Filtrar" en pantallas grandes */
            }
        }

        /* En pantallas pequeñas, el filtro está oculto inicialmente */
        @media (max-width: 768px) {
            .filter-section {
                height: 0;
                opacity: 0;
                display: none;
                /* Ocultar por defecto en pantallas pequeñas */

            }

            .filter-section.visible {
                display: block;
                height: auto;
                /* Mostrar el filtro cuando el usuario lo activa */
                opacity: 1;
            }

            .filter-toggle {
                margin-bottom: 60px;
                display: inline-block;
                /* Mostrar el botón solo en pantallas pequeñas */
            }
        }

        /* Estilo para la tabla de paginación */
        .custom-table {
            background-color: #272a28 !important;
            /* Fondo negro */
            color: #fff !important;
            /* Texto blanco para mejor legibilidad */
        }

        .custom-table,
        .custom-table> :not(caption)>*>* {
            background-color: #272a28 !important;
            /* Fondo negro */
            color: #fff !important;
            /* Texto blanco */
        }

        .text-muted {
            color: #fff !important;
        }

        .active>.page-link,
        .page-link.active {
            z-index: 3;
            color: white;
            /* Color del texto blanco */
            background-color: red;
            /* Fondo rojo para la página activa */
            border-color: red;
            /* Borde rojo para la página activa */
        }

        .justify-content-sm-between {
            justify-content: space-evenly !important;
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <x-header />

    <section class="model-section py-5">
        <div class="container">
            <h2 class="text-center mb-5 text-danger animated-title">UNIDADES EN VENTA</h2>

            <div class="row">

                <div class="col-md-4">
                    <!-- Sección de filtros -->
                    <!-- Botón para abrir filtros -->
                    <div class="filter-toggle text-white">
                        <i class="bi bi-funnel-fill"></i> Filtrar
                    </div>

                    <div class="filter-section">
                        <h5>Filtros de Búsqueda</h5>

                        <form method="GET" action="{{ url('unidades-en-venta') }}" id="filterForm">
                            <div class="filter-option mb-3">
                                <label>Motor:</label>
                                <select name="motor" class="form-select">
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach ($filtros['motor'] as $filtro)
                                    <option value="{{ $filtro->valor }}">
                                        {{ $filtro->valor }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-option mb-3">
                                <label>Transmisión:</label>
                                <select name="transmision" class="form-select">
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach ($filtros['transmision'] as $filtro)
                                    <option value="{{ $filtro->valor }}">
                                        {{ $filtro->valor }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-option mb-3">
                                <label>Año del Modelo:</label>
                                <select name="ano" class="form-select">
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach ($filtros['ano'] as $filtro)
                                    <option value="{{ $filtro->valor }}">
                                        {{ $filtro->valor }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-option mb-3">
                                <label>Kilometraje:</label>
                                <select name="kilometraje" class="form-select">
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach ($filtros['kilometraje'] as $filtro)
                                    <option value="{{ $filtro->valor }}">
                                        {{ $filtro->valor }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-option mb-3">
                                <label>Color:</label>
                                <select name="color" class="form-select">
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach ($filtros['color'] as $filtro)
                                    <option value="{{ $filtro->valor }}">
                                        {{ $filtro->valor }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-option mb-3">
                                <label>Combustible:</label>
                                <select name="combustible" class="form-select">
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach ($filtros['combustible'] as $filtro)
                                    <option value="{{ $filtro->valor }}">
                                        {{ $filtro->valor }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Botón de Aplicar Filtros -->
                            <button type="submit" class="btn btn-danger w-100">Aplicar Filtros</button>

                            <!-- Botón para Limpiar Filtros (con JavaScript) -->
                            <button type="button" class="btn btn-secondary w-100 mt-2" id="clearFilters">Limpiar Filtros</button>
                        </form>
                    </div>


                    <script>
                        // Función para limpiar los filtros y recargar la página sin los parámetros en la URL
                        document.getElementById('clearFilters').addEventListener('click', function() {
                            // Redirigir a la URL base sin parámetros para limpiar los filtros
                            window.location.href = "{{ url('unidades-en-venta') }}";
                        });
                    </script>

                    <script>
                        // Al hacer clic en el botón "Limpiar Filtros", reinicia el formulario y elimina los filtros
                        document.getElementById('clearFilters').addEventListener('click', function() {
                            document.getElementById('filterForm').reset();
                        });
                    </script>
                </div>



                <!--CARDS -->
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @foreach ($unidades as $unidad)
                        <div class="col-md-6 mb-4">
                            <div class="model-card">
                                <div class="img-container">
                                    @if (!empty($unidad->imagenes) && count($unidad->imagenes) > 0)
                                    <img src="data:image/jpeg;base64,{{ $unidad->imagenes[0] }}" class="img-fluid" alt="Imagen del camión">
                                    @else
                                    <img src="{{ asset('images/no-image-available.png') }}" class="img-fluid" alt="No hay imagen disponible">
                                    @endif
                                </div>
                                <style>
                                    .img-fluid {
                                        align-items: center;
                                    }
                                </style>
                                <div class="d-flex flex-column justify-content-between model-card-body">
                                    <hr style="border: 1px solid #444;">

                                    <div class="card-body pt-0">
                                        <h5 class="card-title">
                                            {{ $unidad->modelo }} {{ $unidad->ano }}
                                        </h5>

                                        <div class="d-flex flex-wrap" style="color: #bbbbbb; gap: 10px;">
                                            <div>
                                                <strong>Modelo <br></strong> <span>{{ $unidad->modelo }}</span>
                                            </div>
                                            <div>
                                                <strong>Motor<br></strong> <span>{{ $unidad->motor }}</span>
                                            </div>
                                            <div>
                                                <strong>Transmisión <br></strong> <span>{{ $unidad->transmision }}</span>
                                            </div>
                                            <div>
                                                <strong>Eje <br></strong> <span>{{ $unidad->ejes_delanteros }} Ejes</span>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="price-badge text-white fw-bold"
                                                style="border: 2px solid red; background-color: black; padding: 10px; width: 150px; height: 45px; display: flex; justify-content: center; align-items: center;">
                                                MXN${{ number_format($unidad->precio, 2) }}
                                            </span>

                                            <span class="badge status-badge {{ $unidad->disponible == 1 ? 'bg-success' : 'bg-danger' }}"
                                                style="padding: 10px; width: 150px; height: 45px; display: flex; justify-content: center; align-items: center; border-radius: 0;
                                     {{ $unidad->disponible == 1 ? 'border: none;' : 'border: 2px solid red;' }}">
                                                {{ $unidad->disponible == 1 ? 'DISPONIBLE' : 'NO DISPONIBLE' }}
                                            </span>
                                        </div>

                                        <div class="text-center mt-3">
                                            <a href="{{ route('unidades.show', $unidad->id) }}" class="btn btn-danger ver-mas">Ver más</a>
                                        </div>

                                        <hr style="border: 1px solid #444;">
                                        <p style="color: #bbbbbb; margin-top: 10px; margin-bottom: 0;">
                                            <span><strong>Diferenciales <br></strong></span>
                                            <span style="font-weight: bold;">{{ $unidad->diferencial ?? 'No disponible' }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <table class="table table-auto w-full redspace-nowrap custom-table">
                        <tfoot class="mt-5 w-4">
                            <tr>
                                <td colspan="10">{{ $unidades->links('pagination::bootstrap-5') }}</td>
                                <td>
                                    <p class="total-text">Total: {{ $unidades->total() }}</p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                >
            </div>
        </div>
    </section>


    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterToggle = document.querySelector('.filter-toggle');
            const filterSection = document.querySelector('.filter-section');

            // Solo agregar funcionalidad de clic en pantallas pequeñas
            if (window.innerWidth <= 768) {
                filterToggle.addEventListener('click', function() {
                    filterSection.classList.toggle('visible');
                });
            }
        });
    </script>

</body>

</html>