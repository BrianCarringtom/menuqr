<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-sm text-green-400" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" class="text-gray-200" />

            <x-text-input id="email"
                class="block mt-2 w-full rounded-xl border-0 bg-white/10 text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                placeholder="correo@empresa.com" />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <x-input-label for="password" :value="__('Contraseña')" class="text-gray-200" />

            <x-text-input id="password"
                class="block mt-2 w-full rounded-xl border-0 bg-white/10 text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500"
                type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember -->
        <div class="flex items-center justify-between mt-5">

            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-600 bg-white/10 text-indigo-500 shadow-sm focus:ring-indigo-500"
                    name="remember">

                <span class="ms-2 text-sm text-gray-300">
                    Recuérdame
                </span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-300 hover:text-white transition" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif

        </div>

        <!-- Botón -->
        <div class="mt-8">
            <button type="submit"
                class="w-full py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 transition-all duration-300 text-white font-semibold shadow-lg shadow-indigo-500/30">
                Iniciar sesión
            </button>
        </div>

    </form>

</x-guest-layout>
