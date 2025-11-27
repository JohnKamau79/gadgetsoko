@extends('layouts.app')

@section('title', 'Product-Page')

@section('content')

{{-- HERO SECTION --}}
<section class="relative bg-gradient-to-r from-teal-500 via-teal-600 to-indigo-700 dark:from-gray-900 dark:via-indigo-900 dark:to-gray-800 text-white py-32 px-6 overflow-hidden">
    <!-- Floating Shapes -->
    <div class="absolute -top-20 -left-20 w-56 h-56 bg-white/20 dark:bg-gray-700/20 rounded-full filter blur-3xl animate-pulse-slow"></div>
    <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-indigo-300/20 dark:bg-indigo-700/20 rounded-full filter blur-3xl animate-pulse-slow"></div>

    <div class="relative z-10 max-w-7xl mx-auto text-center md:text-left">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 drop-shadow-lg">Explore Our Gadgets</h1>
        <p class="text-lg md:text-xl mb-8 max-w-2xl drop-shadow-sm">Find the latest electronics, gadgets, and accessories at unbeatable prices.</p>

        {{-- Search + Cart --}}
        <div class="flex flex-col md:flex-row justify-center md:justify-start max-w-lg mx-auto md:mx-0 gap-4 md:gap-6 items-center">
            <!-- Search Form -->
            <form action="{{ route('products.search') }}" method="GET" class="flex w-full md:w-auto">
                <input type="text" name="query" value="{{ request('query') }}" placeholder="Search products..."
                    class="w-full md:w-64 px-4 py-3 rounded-l-lg border border-gray-200 dark:border-gray-700 focus:outline-none focus:ring-2 focus:ring-white text-gray-800 dark:text-gray-100">
                <button type="submit" class="bg-yellow-400 text-gray-900 px-6 rounded-r-lg hover:bg-yellow-300 transition">Search</button>
            </form>

            <!-- Conspicuous Cart -->
            <div x-data="{ open: false }" class="relative mt-2 md:mt-0">
                <button @click="open = !open" class="relative p-3 rounded-full bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl focus:outline-none transition">
                    <svg class="w-8 h-8 text-gray-800 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13l-1.5-7M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-2 py-0.5 font-bold shadow">{{ $quantity ?? 0 }}</span>
                </button>

                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 shadow-lg rounded-lg py-2 z-50">
                    @forelse ($cartItems ?? [] as $cartItem)
                        <div class="px-4 py-2 border-b flex justify-between items-center">
                            <span class="text-sm text-gray-700 dark:text-gray-200 truncate">{{ $cartItem->product->title }}</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">${{ $cartItem->product->price }}</span>
                        </div>
                    @empty
                        <p class="px-4 py-2 text-gray-700 dark:text-gray-200 text-sm">No items in cart</p>
                    @endforelse
                    <div class="px-4 py-2 text-center">
                        <a href="{{ route('cart') }}" class="text-indigo-600 dark:text-indigo-400 text-sm font-semibold hover:underline">View Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- FILTERS --}}
<section class="sticky top-0 bg-white dark:bg-gray-900 shadow-md z-20 py-4 px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        {{-- Category Filter --}}
        <form action="{{ route('products.filter') }}" method="GET" class="flex gap-2 items-center">
            <label class="font-semibold text-gray-700 dark:text-gray-300">Category:</label>
            <select name="category" onchange="this.form.submit()"
                class="border border-gray-300 dark:border-gray-600 rounded-lg p-2 focus:ring-2 focus:ring-teal-500 dark:bg-gray-700 dark:text-gray-100">
                <option value="">All</option>
                <option value="Smartphone" {{ request('category') == 'Smartphone' ? 'selected' : '' }}>Smartphones</option>
                <option value="Laptops" {{ request('category') == 'Laptops' ? 'selected' : '' }}>Laptops</option>
                <option value="Cameras" {{ request('category') == 'Cameras' ? 'selected' : '' }}>Cameras</option>
                <option value="Accessories" {{ request('category') == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                <option value="Headset" {{ request('category') == 'Headset' ? 'selected' : '' }}>Headset</option>
                <option value="TV" {{ request('category') == 'TV' ? 'selected' : '' }}>TVs</option>
            </select>
        </form>

        {{-- Price Filter --}}
        <form action="{{ route('products.filter') }}" method="GET" class="flex gap-2 items-center">
            <label class="font-semibold text-gray-700 dark:text-gray-300">Price:</label>
            <select name="price" onchange="this.form.submit()"
                class="border border-gray-300 dark:border-gray-600 rounded-lg p-2 focus:ring-2 focus:ring-teal-500 dark:bg-gray-700 dark:text-gray-100">
                <option value="">All Prices</option>
                <option value="under100" {{ request('price') == 'under100' ? 'selected' : '' }}>Under Ksh 100</option>
                <option value="100-500" {{ request('price') == '100-500' ? 'selected' : '' }}>Ksh 100 - Ksh 500</option>
                <option value="500-1000" {{ request('price') == '500-1000' ? 'selected' : '' }}>Ksh 500 - Ksh 1000</option>
                <option value="over1000" {{ request('price') == 'over1000' ? 'selected' : '' }}>Over Ksh 1000</option>
            </select>
        </form>
    </div>
</section>

{{-- PRODUCTS GRID --}}
<section class="py-16 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($products as $product)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-lg transition p-4 flex flex-col">
                {{-- Image without white background --}}
                <div class="w-full h-48 mb-4 overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                        class="w-full h-full object-contain transition-transform duration-500 hover:scale-105">
                </div>
                <h4 class="font-semibold text-lg mb-1 text-teal-500 dark:text-teal-400">{{ $product->title }}</h4>
                <p class="font-bold text-blue-600 dark:text-gray-300 mb-4">Ksh {{ number_format($product->price, 2) }}</p>
                <a href="{{ route('productdetails', $product) }}"
                    class="mt-auto bg-teal-500 dark:bg-teal-400 text-white dark:text-gray-900 text-center py-2 rounded-lg font-medium hover:bg-amber-400 dark:hover:bg-amber-500 transition">
                    View Details
                </a>
            </div>
        @endforeach
    </div>

    <div class="mt-12 flex justify-center">
        {{ $products->links() }}
    </div>
</section>

{{-- CTA SECTION --}}
<section class="py-16 bg-gradient-to-r from-teal-500 to-teal-400 dark:from-gray-900 dark:to-indigo-900 text-white text-center">
    <h3 class="text-3xl md:text-4xl font-bold mb-4">Find Your Perfect Gadget Today</h3>
    <p class="text-lg mb-6 max-w-2xl mx-auto">Browse our wide range of electronics and enjoy unbeatable prices and fast delivery.</p>
    <a href="{{ route('contact') }}"
        class="bg-white dark:bg-teal-400 dark:text-gray-900 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-teal-500 transition">
        Contact Us
    </a>
</section>

@endsection
