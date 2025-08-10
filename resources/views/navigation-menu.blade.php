<nav x-data="{ open: false }" class="bg-black border-b border-gray-700">
    <!-- Menú de Navegación Principal -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="d-flex justify-content-center align-items-center bg-dark py-3">
                <!-- Logo -->
                <div class="d-flex align-items-center">
                    <a href="{{ url('/') }}" class="mx-4">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-img" />
                    </a>
                </div>

                <!-- Navegación -->
                <div class="d-flex">
                    <!-- Primera dirección -->
                    <x-nav-link :href="route('productos.index')" :active="request()->routeIs('productos.*')" class="nav-link-custom mx-3">
                        Productos
                    </x-nav-link>
                    <x-nav-link :href="route('catalogo.publico')" :active="request()->is('catalogo')" class="nav-link-custom mx-3">
                        Catálogo
                    </x-nav-link>

                    <!-- Segunda dirección -->
                    <a href="{{ url('/cajas') }}" class="nav-link-custom mx-3">
                        Cajas
                    </a>

                    <!-- Tercera dirección -->
                    <a href="{{ url('/filtros') }}" class="nav-link-custom mx-3">
                        Filtros
                    </a>
                </div>
            </div>
            <style>
                /* Ajuste del logo */
                .logo-img {
                    height: 24px;
                    padding-right: 10px;
                    /* Tamaño ajustado del logo */
                    width: auto;
                }

                /* Estilo de los enlaces */
                .nav-link-custom {
                    color: white;
                    font-size: 1.1rem;
                    text-decoration: none;
                    transition: color 0.3s ease, text-shadow 0.3s ease;
                }

                /* Efecto hover para los enlaces */
                .nav-link-custom:hover {
                    color: #ff4500;
                    text-shadow: 0px 0px 5px rgba(255, 69, 0, 0.8);
                }

                /* Alineación centrada del contenedor principal */
                .d-flex {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                /* Espaciado entre enlaces */
                .mx-3 {
                    margin-left: 1rem;
                    margin-right: 1rem;
                }

                .mx-4 {
                    margin-left: 1.5rem;
                    margin-right: 1.5rem;
                }
            </style>


            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Menú Desplegable de Equipos -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::check())
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-black hover:text-red-500 focus:outline-none focus:bg-gray-800 active:bg-gray-800 transition ease-in-out duration-150">
                                    {{ Auth::user()->currentTeam->name ?? 'Sin Equipo' }}

                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-60 bg-black text-black">
                                <!-- Gestión de Equipos -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Gestionar Equipo') }}
                                </div>

                                <!-- Configuraciones del Equipo -->
                                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                    class="text-black hover:text-red-500">
                                    {{ __('Configuración del Equipo') }}
                                </x-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-dropdown-link href="{{ route('teams.create') }}"
                                    class="text-black hover:text-red-500">
                                    {{ __('Crear Nuevo Equipo') }}
                                </x-dropdown-link>
                                @endcan

                                @if (Auth::user()->allTeams()->count() > 1)
                                <div class="border-t border-gray-600"></div>
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Cambiar Equipos') }}
                                </div>
                                @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" />
                                @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif

                <!-- Menú Desplegable de Configuraciones -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Auth::check() && Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @elseif (Auth::check())
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-black hover:text-red-500 focus:outline-none focus:bg-gray-800 active:bg-gray-800 transition ease-in-out duration-150">
                                    {{ Auth::user()->name ?? 'Invitado' }}

                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Gestión de Cuenta -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Gestionar Cuenta') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}" class="text-black hover:text-red-500">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="{{ route('cajas.index') }}" class="text-black hover:text-red-500">
                                {{ __('Cajas disponibles') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="{{ route('filtros.index') }}" class="text-black hover:text-red-500">
                                {{ __('Filtros') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}"
                                class="text-black hover:text-red-500">
                                {{ __('Tokens API') }}
                            </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-600"></div>

                            <!-- Autenticación -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                                    class="text-black hover:text-red-500">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Ícono de Menú -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-800 focus:outline-none focus:bg-gray-800 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú de Navegación Responsivo -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('productos.index') }}" :active="request()->routeIs('productos.*')"
                class="text-black hover:text-red-500">
                {{ __('Productos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('catalogo.publico') }}" :active="request()->is('catalogo')"
                class="text-black hover:text-red-500">
                {{ __('Catálogo') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="flex items-center px-4">
                @if (Auth::check() && Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="shrink-0 me-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                @if (Auth::check())
                <div>
                    <div class="font-medium text-base text-black">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                </div>
                @else
                <div>
                    <div class="font-medium text-base text-black">Invitado</div>
                </div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.show') }}" class="text-black hover:text-red-500">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Autenticación -->
                @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                        class="text-black hover:text-red-500">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
                @endif
            </div>
        </div>
    </div>
</nav>