<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cajas en Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

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
            overflow: hidden;
            height: 0;
            opacity: 0;
        }

        .filter-section.visible {
            height: auto;
            opacity: 1;
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

        .ver-mas {
            transition: all 0.3s ease;
        }

        .ver-mas:hover {
            background-color: #ff4500;
            transform: scale(1.05);
        }

        @media (min-width: 768px) {
            .col-md-6 {
                margin-bottom: 0;
            }
        }

        .filter-toggle {
            width: 100%;
            text-align: center;
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid red;
            border-radius: 5px;
            background-color: black;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .filter-toggle:hover {
            background-color: #ff4500;
            color: white;
            box-shadow: 0 0 10px rgba(255, 69, 0, 0.8);
            transform: scale(1.05);
        }

        .filter-toggle:active {
            transform: scale(0.95);
            box-shadow: none;
        }

        @media (min-width: 769px) {
            .filter-section {
                height: auto;
                opacity: 1;
                display: block;
            }

            .filter-toggle {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .filter-section {
                height: 0;
                opacity: 0;
                display: none;
            }

            .filter-section.visible {
                display: block;
                height: auto;
                opacity: 1;
            }

            .filter-toggle {
                margin-bottom: 60px;
                display: inline-block;
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
            <h2 class="text-center mb-5 text-danger animated-title">CAJAS EN VENTA</h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="filter-toggle text-white">
                        <i class="bi bi-funnel-fill"></i> Filtrar
                    </div>

                    <div class="filter-section">
                        <h5>Filtros de Búsqueda</h5>
                        <form method="GET" action="{{ url('cajas-en-venta') }}">
                            @foreach ($filtros as $tipo => $valores)
                            <div class="filter-option mb-3">
                                <label>{{ ucfirst($tipo) }}:</label>
                                <select name="{{ $tipo }}" class="form-select">
                                    <option value="">Seleccione</option>
                                    @foreach ($valores as $filtro)
                                    <option value="{{ $filtro->valor }}" {{ request($tipo) == $filtro->valor ? 'selected' : '' }}>
                                        {{ $filtro->valor }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @endforeach

                            <!-- Año es un caso especial porque necesita un rango -->
                            <div class="filter-option mb-3">
                                <label>Año:</label>
                                <input type="number" name="ano_min" class="form-control mb-2" placeholder="Desde" value="{{ request('ano_min') }}">
                                <input type="number" name="ano_max" class="form-control" placeholder="Hasta" value="{{ request('ano_max') }}">
                            </div>

                            <button type="submit" class="btn btn-danger w-100">Aplicar Filtros</button>
                            <!-- Botón para Limpiar Filtros (con JavaScript) -->
                            <button type="button" class="btn btn-secondary w-100 mt-2" id="clearFilters">Limpiar Filtros</button>
                        </form>
                    </div>
                </div>

                <!-- CARDS -->
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @foreach($cajas->chunk(ceil($cajas->count() / 2)) as $chunk)
                        <div class="col-md-6 mb-4">
                            @foreach($chunk as $caja)
                            <div class="card shadow-sm position-relative model-card mb-4">
                                <div class="img-container d-flex justify-content-center mb-3 position-relative">
                                    @php $imagenes = $caja->imagenes; @endphp

                                    @if (!empty($imagenes) && count($imagenes) > 0)
                                    <img src="data:image/jpeg;base64,{{ $imagenes[0] }}" class="img-fluid" alt="Imagen de la caja">
                                    @else
                                    <img src="{{ asset('images/no-image-available.png') }}" class="img-fluid" alt="No hay imagen disponible">
                                    @endif
                                </div>

                                <div class="d-flex flex-column justify-content-between model-card-body">
                                    <hr style="border: 1px solid #444;">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title">{{ $caja->marca }} - {{ $caja->tamano }} ({{ $caja->ano }})</h5>

                                        <div class="d-flex flex-wrap" style="color: #bbbbbb; gap: 10px;">
                                            <div><strong>Marca<br></strong> <span>{{ $caja->marca }}</span></div>
                                            <div><strong>Tamaño<br></strong> <span>{{ $caja->tamano }}</span></div>
                                            <div><strong>Año<br></strong> <span>{{ $caja->ano }}</span></div>
                                            <div><strong>Capacidad de Carga<br></strong> <span>{{ $caja->capacidad_carga }}</span></div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="price-badge text-white fw-bold" style="border: 2px solid red; background-color: black; padding: 10px; width: 150px; height: 45px; display: flex; justify-content: center; align-items: center;">
                                                MXN${{ number_format($caja->precio, 2) }}
                                            </span>

                                            <form action="{{ route('cajas.toggleDisponible', $caja->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="badge status-badge {{ $caja->disponibilidad == 1 ? 'bg-success' : 'bg-danger' }}" style="padding: 10px; width: 150px; height: 45px; display: flex; justify-content: center; align-items: center; border-radius: 0; border: {{ $caja->disponibilidad == 1 ? 'none' : '2px solid red' }};">
                                                    {{ $caja->disponibilidad == 1 ? 'DISPONIBLE' : 'NO DISPONIBLE' }}
                                                </button>
                                            </form>
                                        </div>

                                        <div class="text-center mt-3">
                                            <a href="{{ route('cajas.show', $caja->id) }}" class="btn btn-danger ver-mas">Ver más</a>
                                        </div>

                                        <hr style="border: 1px solid #444;">

                                        <p style="color: #bbbbbb; margin-top: 10px; margin-bottom: 0;">
                                            <span><strong>Bolsas de Aire<br></strong></span>
                                            <span style="font-weight: bold;">
                                                {{ $caja->bolsas_aire ? 'Equipado con sistema de bolsas de aire' : 'No cuenta con sistema de bolsas de aire' }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                    <table class="table table-auto w-full redspace-nowrap custom-table">

                        <tfoot class="mt-5 w-4">
                            <tr>
                                <td colspan="10">
                                    {{ $cajas->links('pagination::bootstrap-5') }}
                                </td>
                                <td>
                                    <p class="total-text">Total: {{ $cajas->total() }}</p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterToggle = document.querySelector('.filter-toggle');
            const filterSection = document.querySelector('.filter-section');

            if (window.innerWidth <= 768) {
                filterToggle.addEventListener('click', function() {
                    filterSection.classList.toggle('visible');
                });
            }
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para mostrar u ocultar la sección de filtros en pantallas pequeñas
        const filterToggle = document.querySelector('.filter-toggle');
        const filterSection = document.querySelector('.filter-section');

        if (window.innerWidth <= 768) {
            filterToggle.addEventListener('click', function() {
                filterSection.classList.toggle('visible');
            });
        }

        // Función para limpiar los filtros cuando se hace clic en el botón "Limpiar Filtros"
        document.getElementById('clearFilters').addEventListener('click', function() {
            const form = document.querySelector('form'); // Selecciona el formulario
            form.reset(); // Restablece el formulario

            // Opcional: si estás usando navegación con query strings, redirige sin filtros
            window.location.href = "{{ url('cajas-en-venta') }}";
        });
    });
</script>
</body>

</html>