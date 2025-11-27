<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
          class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 max-w-lg mx-auto space-y-4">
        @csrf

        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-gray-100 mb-6">Welcome to GadgetSoko</h2>

        <!-- First Name + Last Name Flexed -->
        <div class="flex gap-4">
            <div class="flex-1">
                <x-input-label for="firstName" :value="__('First Name')" class="text-gray-700 dark:text-gray-200"/>
                <x-text-input id="firstName" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600
                                 focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500 dark:bg-gray-700 dark:text-gray-100 px-4 py-2"
                              type="text" name="firstName" :value="old('firstName')" required autofocus />
                <x-input-error :messages="$errors->get('firstName')" class="mt-1 text-sm text-red-500"/>
            </div>

            <div class="flex-1">
                <x-input-label for="lastName" :value="__('Last Name')" class="text-gray-700 dark:text-gray-200"/>
                <x-text-input id="lastName" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600
                                 focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500 dark:bg-gray-700 dark:text-gray-100 px-4 py-2"
                              type="text" name="lastName" :value="old('lastName')" required />
                <x-input-error :messages="$errors->get('lastName')" class="mt-1 text-sm text-red-500"/>
            </div>
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-200"/>
            <x-text-input id="email" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600
                             focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500 dark:bg-gray-700 dark:text-gray-100 px-4 py-2"
                          type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500"/>
        </div>

        <!-- Role + Avatar Flexed -->
        <div class="flex gap-4">
            <div class="flex-1">
                <x-input-label for="role" :value="__('Role')" class="text-gray-700 dark:text-gray-200"/>
                <select id="role" name="role" class="block mt-1 w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2
                                                  focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500 dark:bg-gray-700 dark:text-gray-100">
                    <option value="">-- Select Role --</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="retailer" {{ old('role') == 'retailer' ? 'selected' : '' }}>Retailer</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-1 text-sm text-red-500"/>
            </div>

            <div class="flex-1">
                <x-input-label for="avatar" :value="__('Avatar')" class="text-gray-700 dark:text-gray-200"/>
                <x-text-input id="avatar" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600
                                 focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500 dark:bg-gray-700 dark:text-gray-100 px-4 py-2"
                              type="file" name="avatar" accept="image/*"/>
                <x-input-error :messages="$errors->get('avatar')" class="mt-1 text-sm text-red-500"/>
            </div>
        </div>

        <!-- Password + Confirm Password Flexed -->
        <div class="flex gap-4">
            <div class="flex-1">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-200"/>
                <x-text-input id="password" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600
                                 focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500 dark:bg-gray-700 dark:text-gray-100 px-4 py-2"
                              type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500"/>
            </div>

            <div class="flex-1">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-200"/>
                <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600
                                 focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500 dark:bg-gray-700 dark:text-gray-100 px-4 py-2"
                              type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-500"/>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-between mt-4">
            <a class="text-sm text-gray-600 dark:text-gray-300 hover:underline" href="{{ route('login') }}">
                Already registered?
            </a>

            <x-primary-button class="bg-teal-500 hover:bg-teal-400 dark:bg-teal-600 dark:hover:bg-teal-500 text-white rounded-lg px-4 py-2">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
