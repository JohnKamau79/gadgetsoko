<nav x-data="{ open: false }" class="bg-lightBg dark:bg-darkBg shadow-md sticky top-0 z-50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}">
                    <h1 class="text-3xl font-bold text-primary dark:text-primary-dark transition-colors duration-300">GadgetSoko</h1>
                </a>
            </div>

            <!-- Desktop Links -->
            <div class="hidden sm:flex space-x-8 ml-10">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-indigo-dark dark:text-lavender">Home</x-nav-link>
                <x-nav-link :href="route('product')" :active="request()->routeIs('product')" class="text-indigo-dark dark:text-lavender">Products</x-nav-link>
                <x-nav-link :href="route('testimonial')" :active="request()->routeIs('testimonial')" class="text-indigo-dark dark:text-lavender">Reviews</x-nav-link>
                <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="text-indigo-dark dark:text-lavender">Contact</x-nav-link>
            </div>

            <!-- Right Controls (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <!-- Profile Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 px-3 py-2 rounded-md bg-lightBg dark:bg-darkBg text-indigo-dark dark:text-lavender hover:bg-indigo-light dark:hover:bg-indigo-dark transition-colors duration-300">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->firstName }}" class="w-10 h-10 rounded-full object-cover">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</x-dropdown-link>
                        <x-dropdown-link :href="route('dashboard')">Dashboard</x-dropdown-link>
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

                <!-- Desktop Theme Toggle -->
                <button id="themeToggle" class="relative w-14 h-7 rounded-full bg-indigo-light dark:bg-indigo-500 focus:outline-none transition-colors duration-300">
                    <span id="toggleIndicator" class="absolute left-1 top-1 w-5 h-5 bg-lightText dark:bg-darkBg rounded-full shadow-md transition-transform duration-300"></span>
                </button>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-indigo-dark dark:text-lavender hover:bg-indigo-light dark:hover:bg-indigo-dark transition-colors duration-300 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-4 pb-1">
            <div class="px-4 space-y-1">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-indigo-dark dark:text-lavender">Home</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('product')" :active="request()->routeIs('product')" class="text-indigo-dark dark:text-lavender">Products</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('testimonial')" :active="request()->routeIs('testimonial')" class="text-indigo-dark dark:text-lavender">Reviews</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="text-indigo-dark dark:text-lavender">Contact</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="text-indigo-dark dark:text-lavender">Profile</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-indigo-dark dark:text-lavender">Dashboard</x-responsive-nav-link>

                

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-indigo-dark dark:text-lavender">
                        Log Out
                    </x-responsive-nav-link>
                </form>

                <!-- Theme Toggle (Mobile) -->
                <div class="flex justify-end mt-4 px-2">
                    <button id="themeToggleMobile" class="relative w-14 h-7 rounded-full bg-indigo-light dark:bg-indigo-dark focus:outline-none transition-colors duration-300">
                        <span id="toggleIndicatorMobile" class="absolute left-1 top-1 w-5 h-5 bg-lightText dark:bg-darkBg rounded-full shadow-md transition-transform duration-300"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- THEME TOGGLE SCRIPT -->
<script>
    const toggleBtn = document.getElementById("themeToggle");
    const indicator = document.getElementById("toggleIndicator");
    const toggleMobile = document.getElementById("themeToggleMobile");
    const indicatorMobile = document.getElementById("toggleIndicatorMobile");

    function initTheme() {
        if (localStorage.theme === "dark") {
            document.documentElement.classList.add("dark");
            indicator.classList.add("translate-x-7");
            indicatorMobile.classList.add("translate-x-7");
        }
    }

    function toggleTheme() {
        document.documentElement.classList.toggle("dark");
        const isDark = document.documentElement.classList.contains("dark");

        if (isDark) {
            localStorage.theme = "dark";
            indicator.classList.add("translate-x-7");
            indicatorMobile.classList.add("translate-x-7");
        } else {
            localStorage.theme = "light";
            indicator.classList.remove("translate-x-7");
            indicatorMobile.classList.remove("translate-x-7");
        }
    }

    toggleBtn.addEventListener("click", toggleTheme);
    toggleMobile.addEventListener("click", toggleTheme);

    initTheme();
</script>
