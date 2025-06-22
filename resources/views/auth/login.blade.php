<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-between mt-6">
                <div class="text-sm">
                    @if (Route::has('password.request'))
                        <a class="underline text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <!-- Register link -->
            <div class="mt-4 text-center text-sm">
                <span class="text-gray-600">Belum punya akun?</span>
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Daftar</a>
            </div>
        </form>
    </div>
</x-guest-layout>
