<x-guest-layout>
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-indigo-900 to-slate-800 px-4">

        <div class="w-full max-w-md">
            <!-- Card -->
            <div class="bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl rounded-3xl p-8">

                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-white">
                        Bienvenido 👋
                    </h1>
                    <p class="text-gray-300 mt-2 text-sm">
                        Inicia sesión para continuar
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-green-300 text-sm" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-gray-200" />

                        <x-text-input id="email"
                            class="block mt-2 w-full rounded-xl border-0 bg-white/20 text-white placeholder-gray-300 focus:bg-white/30 focus:ring-2 focus:ring-indigo-400"
                            type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                            placeholder="correo@ejemplo.com" />

                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-gray-200" />

                        <x-text-input id="password"
                            class="block mt-2 w-full rounded-xl border-0 bg-white/20 text-white placeholder-gray-300 focus:bg-white/30 focus:ring-2 focus:ring-indigo-400"
                            type="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
                    </div>

                    <!-- Remember -->
                    <div class="flex items-center justify-between text-sm">
                        <label for="remember_me" class="inline-flex items-center text-gray-300">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-500 bg-transparent text-indigo-500 focus:ring-indigo-400"
                                name="remember">

                            <span class="ms-2">
                                {{ __('Remember me') }}
                            </span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-indigo-300 hover:text-white transition"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Button -->
                    <div class="pt-2">
                        <x-primary-button
                            class="w-full justify-center rounded-xl bg-indigo-500 hover:bg-indigo-400 transition-all duration-300 shadow-lg shadow-indigo-500/40 py-3 text-base font-semibold">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
