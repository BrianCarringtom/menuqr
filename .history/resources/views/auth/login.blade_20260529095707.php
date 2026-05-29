<x-guest-layout>

    <!-- CONTENEDOR -->
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#0f172a] via-[#111827] to-[#1d4ed8] p-4">

        <!-- CARD -->
        <div
            class="w-full max-w-6xl bg-white rounded-[35px] overflow-hidden shadow-[0_20px_60px_rgba(0,0,0,0.35)] grid lg:grid-cols-2">

            <!-- LADO IZQUIERDO -->
            <div
                class="relative hidden lg:flex flex-col justify-center items-center bg-gradient-to-b from-blue-700 to-blue-500 p-14 overflow-hidden">

                <!-- EFECTOS -->
                <div class="absolute top-0 right-[-120px] w-80 h-80 bg-white/10 rounded-full"></div>
                <div class="absolute top-20 right-[-140px] w-96 h-96 bg-white/10 rounded-full"></div>
                <div class="absolute bottom-[-100px] left-[-100px] w-72 h-72 bg-white/10 rounded-full"></div>

                <!-- IMAGEN -->
                <div class="relative z-10 text-center">

                    <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1200&auto=format&fit=crop"
                        alt="Office"
                        class="w-[320px] h-[220px] object-cover rounded-3xl shadow-2xl border-4 border-white/20">

                    <h2 class="text-white text-4xl font-extrabold mt-8">
                        Bienvenido
                    </h2>

                    <p class="text-blue-100 mt-4 leading-relaxed max-w-sm">
                        Accede a tu plataforma profesional y administra todo
                        desde un solo lugar.
                    </p>

                </div>

            </div>

            <!-- LADO DERECHO -->
            <div class="relative flex items-center justify-center p-6 sm:p-10 lg:p-14">

                <!-- FONDO DECORACION -->
                <div class="absolute top-[-80px] right-[-80px] w-60 h-60 bg-blue-100 rounded-full blur-3xl opacity-50">
                </div>

                <div class="w-full max-w-md relative z-10">

                    <!-- MOBILE IMAGE -->
                    <div class="lg:hidden mb-8 text-center">

                        <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1200&auto=format&fit=crop"
                            alt="Office" class="w-full h-48 object-cover rounded-3xl shadow-xl">

                    </div>

                    <!-- TITULO -->
                    <div class="mb-8">
                        <h1 class="text-4xl font-extrabold text-gray-800">
                            Iniciar Sesión
                        </h1>

                        <p class="text-gray-500 mt-2">
                            Ingresa tus datos para continuar
                        </p>
                    </div>

                    <!-- STATUS -->
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

                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                                    name="remember">

                                <span class="ms-2 text-sm text-gray-600">
                                    Recordarme
                                </span>
                            </label>

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

                            Ingresar

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
