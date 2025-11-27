<section class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-gray-600 dark:text-gray-300 text-sm">
            {{ __("Update your account's profile information, email, and avatar.") }}
        </p>
    </header>

    {{-- Verification form --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Profile Update Form --}}
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- First Name --}}
        <div>
            <x-input-label for="firstName" :value="__('First Name')" />
            <x-text-input id="firstName" name="firstName" type="text" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-400 focus:outline-none"
                :value="old('firstName', $user->firstName)" required autofocus autocomplete="given-name" />
            <x-input-error class="mt-2" :messages="$errors->get('firstName')" />
        </div>

        {{-- Last Name --}}
        <div>
            <x-input-label for="lastName" :value="__('Last Name')" />
            <x-text-input id="lastName" name="lastName" type="text" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-400 focus:outline-none"
                :value="old('lastName', $user->lastName)" required autocomplete="family-name" />
            <x-input-error class="mt-2" :messages="$errors->get('lastName')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-400 focus:outline-none"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 text-sm">
                    <p class="text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-400">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Avatar --}}
        <div>
            <x-input-label for="avatar" :value="__('Profile Avatar')" />
            @if ($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-20 h-20 rounded-full mb-2 border border-gray-200 dark:border-gray-600 shadow-sm">
            @endif
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-400 focus:outline-none" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        {{-- Submit Button --}}
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-teal-600 dark:bg-teal-500 hover:bg-teal-500 dark:hover:bg-teal-400 transition">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-300"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
