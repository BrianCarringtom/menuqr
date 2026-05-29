<div class="w-full max-w-md">

    <!-- Card -->
    <div class="bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl rounded-3xl p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-6">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo"
                class="w-24 h-24 object-contain"
            >

        </div>

        <!-- Title -->
        <div class="text-center mb-8">

            <h1 class="text-4xl font-bold text-white">
                Bienvenido
            </h1>

            <p class="text-gray-300 mt-2">
                Inicia sesión para continuar
            </p>

        </div>

        <!-- Session -->
        @if (session('status'))
            <div class="mb-4 text-green-400 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- Email -->
            <div class="mb-5">

                <label class="block text-sm text-gray-200 mb-2">
                    Correo electrónico
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="correo@empresa.com"
                >

                @error('email')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Password -->
            <div class="mb-5">

                <label class="block text-sm text-gray-200 mb-2">
                    Contraseña
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="••••••••"
                >

                @error('password')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Remember -->
            <div class="flex items-center justify-between mb-6">

                <label class="flex items-center gap-2 text-sm text-gray-300">

                    <input
                        type="checkbox"
                        name="remember"
                        class="rounded border-gray-500 bg-transparent"
                    >

                    Recuérdame

                </label>

                @if (Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm text-blue-400 hover:text-blue-300 transition"
                    >
                        ¿Olvidaste tu contraseña?
                    </a>

                @endif

            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 text-white font-semibold shadow-lg"
            >
                Iniciar sesión
            </button>

        </form>

    </div>

</div>