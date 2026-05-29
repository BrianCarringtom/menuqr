<x-guest-layout>

    <!-- FONDO -->
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#0f172a] via-[#111827] to-[#1e3a8a] p-4 overflow-hidden">

        <!-- CARD -->
        <div class="w-full max-w-6xl bg-white rounded-[35px] shadow-2xl overflow-hidden flex flex-col lg:flex-row">

            <!-- PANEL IZQUIERDO -->
            <div
                class="relative lg:w-1/2 bg-gradient-to-b from-blue-700 to-blue-500 text-white flex flex-col justify-center items-center p-10 overflow-hidden">

                <!-- EFECTOS -->
                <div class="absolute top-0 right-[-80px] w-72 h-72 bg-white/10 rounded-full"></div>
                <div class="absolute top-20 right-[-100px] w-80 h-80 bg-white/10 rounded-full"></div>
                <div class="absolute top-40 right-[-120px] w-96 h-96 bg-white/10 rounded-full"></div>

                <!-- LOGO -->
                <div class="relative z-10 text-center">

                    <!-- ICONO -->
                    <div
                        class="w-24 h-24 mx-auto rounded-full bg-white flex items-center justify-center shadow-2xl mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-blue-600" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2C8 2 5 5 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-4-3-7-7-7zm0 9.5A2.5 2.5 0 1112 6a2.5 2.5 0 010 5.5z" />
                        </svg>

                    </div>

                    <h1 class="text-4xl font-extrabold mb-3">
                        Bienvenido
                    </h1>

                    <p class="text-blue-100 text-sm leading-relaxed max-w-sm mx-auto">
                        Accede a tu panel profesional y administra tu plataforma
                        de forma rápida, segura y moderna.
                    </p>

                </div>

            </div>

            <!-- FORMULARIO -->
            <div class="lg:w-1/2 p-8 sm:p-12 flex items-center">

                <div class="w-full">

                    <!-- TITULO -->
                    <div class="mb-8 text-center lg:text-left">
                        <h2 class="text-4xl font-extrabold text-gray-800">
                            Iniciar Sesión
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Ingresa tus datos para continuar
                        </p>
                    </div>

                    <!-- SESSION -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- FORM -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- EMAIL -->
                        <div>
                            <x-input-label for="email" :value="__('Correo electrónico')" class="text-gray-700 font-semibold mb-2" />

                            <x-text-input id="email"
                                class="block w-full rounded-2xl border-0 bg-gray-100 focus:bg-white focus:ring-2 focus:ring-blue-500 py-4 px-5 text-gray-700 shadow-sm transition"
                                type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="username" placeholder="correo@ejemplo.com" />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- PASSWORD -->
                        <div>
                            <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 font-semibold mb-2" />

                            <x-text-input id="password"
                                class="block w-full rounded-2xl border-0 bg-gray-100 focus:bg-white focus:ring-2 focus:ring-blue-500 py-4 px-5 text-gray-700 shadow-sm transition"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="••••••••" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- OPCIONES -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                            <!-- REMEMBER -->
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                                    name="remember">

                                <span class="ms-2 text-sm text-gray-600">
                                    Recordarme
                                </span>
                            </label>

                            <!-- FORGOT -->
                            @if (Route::has('password.request'))
                                <a class="text-sm font-medium text-blue-600 hover:text-blue-800 transition"
                                    href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif

                        </div>

                        <!-- BOTON -->
                        <button type="submit"
                            class="w-full py-4 rounded-2xl bg-gradient-to-r from-blue-700 to-blue-500 hover:scale-[1.02] hover:shadow-2xl transition-all duration-300 text-white font-bold text-lg">
                            Entrar
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
