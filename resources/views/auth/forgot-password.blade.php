<x-guest-layout>
    <div class="min-h-screen md:grid md:grid-cols-2">
        
        <div class="relative hidden flex-col items-center justify-center bg-black p-12 text-white md:flex">
            <div class="absolute inset-0 opacity-80 animated-gradient"></div>
            
            <div class="relative z-10 text-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/Logo_1.svg') }}" alt="Mi Logo" class="mx-auto mb-8 h-24 w-auto" />
                </a>
                <h1 class="text-4xl font-bold leading-tight tracking-tight text-white">
                    ¿Olvidaste tu Contraseña?
                </h1>
                <p class="mt-4 max-w-md text-lg text-white/80">
                    No te preocupes, estamos aquí para ayudarte a recuperar el acceso.
                </p>
            </div>
        </div>

        <div class="flex items-center justify-center bg-gray-100 p-6 sm:p-12">
            <x-authentication-card class="w-full max-w-md">
                <x-slot name="logo">
                    <div class="mb-6 text-center md:hidden">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/Logo_1.svg') }}" alt="Mi Logo" class="mx-auto mb-4 h-16 w-auto" />
                        </a>
                        <h2 class="text-2xl font-bold text-gray-800">Recuperar Contraseña</h2>
                    </div>
                </x-slot>

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('No hay problema. Solo indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecer la contraseña que te permitirá elegir una nueva.') }}
                </div>

                @session('status')
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ $value }}
                    </div>
                @endsession

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Correo Electrónico') }}" class="text-sm font-medium text-gray-700" />
                        <div class="relative mt-1">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" /><path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" /></svg>
                            </span>
                            <x-input id="email" class="block w-full rounded-md border-gray-300 pl-10 shadow-sm focus:border-cyan-500 focus:ring-cyan-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                    </div>

                    <div>
                        <x-button class="flex w-full justify-center rounded-md bg-black px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                            {{ __('Enviar Enlace de Restablecimiento') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>
    </div>
</x-guest-layout>