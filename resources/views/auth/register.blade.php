<x-guest-layout class="bg-black min-h-screen flex items-center justify-center">
    <x-authentication-card class="bg-black text-white flex items-center justify-center">
        <x-slot name="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Mi Logo" class="w-200 h-400 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500" />
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="bg-gray-800 p-6 rounded-lg shadow-lg animate-fade-in">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" class="text-white" />
                <x-input id="name" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-red-500 focus:ring-red-500 transition duration-300 transform hover:scale-105 focus:scale-105" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-white" />
                <x-input id="email" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-red-500 focus:ring-red-500 transition duration-300 transform hover:scale-105 focus:scale-105" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-white" />
                <x-input id="password" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-red-500 focus:ring-red-500 transition duration-300 transform hover:scale-105 focus:scale-105" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-white" />
                <x-input id="password_confirmation" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-red-500 focus:ring-red-500 transition duration-300 transform hover:scale-105 focus:scale-105" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms" class="text-white">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" class="text-red-600 transition duration-300 transform hover:scale-105 focus:scale-105" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-red-500 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-red-500 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-red-500 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4 bg-red-600 hover:bg-red-700 text-white transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
