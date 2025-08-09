<x-guest-layout>
    <x-authentication-card>
        <!-- Sección para el logo personalizado -->
        <x-slot name="logo">
            <!-- Logo con enlace a la página principal y animación -->
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" 
                     class="w-50 h-20 fill-current text-gray-500 transition-transform duration-300 ease-in-out transform hover:scale-110 cursor-pointer">
            </a>
        </x-slot>
        
        <div x-data="{ recovery: false }">
            <!-- Mensaje en caso de usar el código de autenticación -->
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-show="! recovery">
                {{ __('Por favor, confirma el acceso a tu cuenta ingresando el código de autenticación proporcionado por tu aplicación de autenticación.') }}
            </div>

            <!-- Mensaje en caso de usar el código de recuperación -->
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-cloak x-show="recovery">
                {{ __('Por favor, confirma el acceso a tu cuenta ingresando uno de tus códigos de recuperación de emergencia.') }}
            </div>

            <!-- Manejo de errores de validación -->
            <x-validation-errors class="mb-4" />

            <!-- Formulario de autenticación -->
            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <!-- Campo de código de autenticación -->
                <div class="mt-4" x-show="! recovery">
                    <x-label for="code" value="{{ __('Código') }}" />
                    <x-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <!-- Campo de código de recuperación -->
                <div class="mt-4" x-cloak x-show="recovery">
                    <x-label for="recovery_code" value="{{ __('Código de recuperación') }}" />
                    <x-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <!-- Enlaces y botones -->
                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                            x-show="! recovery"
                            x-on:click="
                                recovery = true;
                                $nextTick(() => { $refs.recovery_code.focus() })
                            ">
                        {{ __('Usar un código de recuperación') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                            x-cloak
                            x-show="recovery"
                            x-on:click="
                                recovery = false;
                                $nextTick(() => { $refs.code.focus() })
                            ">
                        {{ __('Usar un código de autenticación') }}
                    </button>

                    <!-- Botón de enviar -->
                    <x-button class="ms-4 bg-black text-white hover:bg-red-600">
                        {{ __('Iniciar sesión') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
