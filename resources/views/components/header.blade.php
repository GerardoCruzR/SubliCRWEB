<header class="bg-dark text-light py-3">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-relative">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand navbar-center flex justify-center" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Mi Logo" style="width: 170px; height: auto;" class="transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500" />
            </a>


            <style>
                .titillium-bold {
                    font-family: 'Titillium Web', sans-serif;
                    font-weight: bold;
                }

                .nav-item {
                    margin: 0 15px;
                    /* Añade separación horizontal entre los elementos */
                }
            </style>

            <!-- Botón de menú hamburguesa con borde rojo -->
            <button class="navbar-toggler navbar-toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-bold" href="{{ route('about-us') }}">Quiénes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-bold" href="{{ route('unidades.en.venta') }}">Unidades en venta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-bold" href="{{ route('cajas.en.venta') }}">Cajas en venta</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <!-- Autenticación -->
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-outline-light d-flex align-items-center border border-danger" href="{{ route('login') }}" style="padding: 6px 12px;">
                            <span class="fw-bold">Inicia sesión</span>
                            <i class="bi bi-person ms-2"></i>
                        </a>
                    </li>
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<style>
    /*nav*/
    /* Estilo para el borde rojo del botón de menú hamburguesa */
    .navbar-toggler-custom {
        border: 2px solid red;
        border-radius: 0.25rem;
    }

    /* Estilo adicional para el ícono del menú hamburguesa */
    .navbar-toggler-custom .navbar-toggler-icon {
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"%3E%3Cpath stroke="%23d3d3d3" stroke-width="2" d="M5 7h20M5 15h20M5 23h20"/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 1.5em 1.5em;
        width: 1.5em;
        height: 1.5em;
    }

    /* Estilo para centrar el logo en vista grande */
    @media (min-width: 992px) {
        .navbar-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            /* Ajuste adicional para asegurarse de que el logo esté en el centro */
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .navbar-collapse {
            display: flex;
            justify-content: flex-end;
            /* Ajusta el menú a la derecha */
        }
    }

    /*fin nav*/
</style>