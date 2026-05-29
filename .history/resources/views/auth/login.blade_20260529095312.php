<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="w-full max-w-md mx-auto">

        <!-- CARD LOGIN -->
        <div class="bg-white/95 backdrop-blur-xl shadow-2xl rounded-3xl p-8 border border-gray-100">

            <!-- LOGO / TITULO -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-gray-800">
                    Bienvenido
                </h1>

                <p class="text-gray-500 mt-2 text-sm">
                    Inicia sesión para continuar
                </p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- EMAIL -->
                <div>
                    <x-input-label for="email" :value="__('Correo electrónico')" class="text-gray-700 font-semibold mb-2" />

                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-2xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 shadow-sm"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                        placeholder="ejemplo@email.com" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- PASSWORD -->
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 font-semibold mb-2" />

                    <x-text-input id="password"
                        class="block mt-1 w-full rounded-2xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 shadow-sm"
                        type="password" name="password" required autocomplete="current-password"
                        placeholder="••••••••" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- REMEMBER -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">

                        <span class="ms-2 text-sm text-gray-600">
                            Recordarme
                        </span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition"
                            href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <!-- BOTON -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:scale-[1.02] hover:shadow-xl transition-all duration-300 text-white font-bold py-3 rounded-2xl">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
