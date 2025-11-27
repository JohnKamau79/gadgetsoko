<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}" class="space-y-6 bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg border border-white/20 dark:border-gray-700">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-200" />
        <x-text-input id="email" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600
                         focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500
                         dark:bg-gray-700 dark:text-gray-100 px-4 py-3"
                      type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
    </div>

    <!-- Password -->
    <div>
        <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-200" />
        <x-text-input id="password" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600
                         focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500
                         dark:bg-gray-700 dark:text-gray-100 px-4 py-3"
                      type="password" name="password" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
    </div>

    <!-- Remember Me -->
    <div class="flex items-center justify-between">
        <label for="remember_me" class="inline-flex items-center text-gray-700 dark:text-gray-200">
            <input id="remember_me" type="checkbox" name="remember"
                   class="rounded border-gray-300 text-teal-400 shadow-sm focus:ring-teal-400 dark:focus:ring-teal-500">
            <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
        </label>

        @if (Route::has('password.request'))
            <a class="text-sm text-teal-600 dark:text-teal-400 hover:underline" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
    </div>

    <!-- Login Button -->
    <x-primary-button class="w-full py-3 text-lg font-semibold bg-teal-500 hover:bg-teal-400
                           dark:bg-teal-600 dark:hover:bg-teal-500 transition rounded-lg shadow-md">
        {{ __('Log in') }}
    </x-primary-button>

    <!-- Register Link -->
    <p class="mt-4 text-center text-gray-600 dark:text-gray-300 text-sm">
        Not registered?
        <a href="{{ route('register') }}" class="text-teal-600 dark:text-teal-400 hover:underline">Create an account</a>
    </p>
</form>

</x-guest-layout>
