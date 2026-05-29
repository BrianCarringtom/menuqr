<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-sm text-green-300 bg-green-500/10 border border-green-400/20 rounded-lg p-3"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-blue-100" />

            <x-text-input id="email"
                class="block mt-2 w-full bg-white/10 border border-white/20 text-white placeholder-gray-300 rounded-xl focus:border-blue-400 focus:ring focus:ring-blue-500/30"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-blue-100" />

            <x-text-input id="password"
                class="block mt-2 w-full bg-white/10 border border-white/20 text-white placeholder-gray-300 rounded-xl focus:border-blue-400 focus:ring focus:ring-blue-500/30"
                type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-white/20 bg-white/10 text-blue-500 shadow-sm focus:ring-blue-500"
                    name="remember">

                <span class="ms-2 text-sm text-gray-200">
                    {{ __('Remember me') }}
                </span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-300 hover:text-blue-200 transition duration-200"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Button -->
        <div class="pt-2">
            <x-primary-button
                class="w-full justify-center py-3 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-400 hover:to-blue-600 shadow-lg shadow-blue-900/40 transition-all duration-300 text-white font-semibold">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
