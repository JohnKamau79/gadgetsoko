@extends('layouts.app')

@section('title', 'Product-Page')

@section('content')

    {{-- <!-- HERO / PAGE TITLE -->
    <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-24 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">Our Products</h2>
        <p class="text-lg md:text-xl max-w-3xl mx-auto">
            Explore our wide range of electronics, gadgets, and accessories.
        </p>


    </section> --}}

@section('header')

    <div class="flex gap-20 items-center justify-between h-16">
        <!-- Search Bar -->
        <form action="{{ route('products.search') }}" method="GET" class="mb-6 m-auto flex">
            <input type="text" name="query" value="{{ request('query') }}" placeholder="Search products..."
                class="w-full px-48 text-xl py-4 rounded-l border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="px-4 py-4 bg-blue-600 text-white rounded-r hover:bg-blue-700">
                Search
            </button>
        </form>

        <!-- Cart Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <!-- Cart Icon -->
            <button @click="open = !open" class="relative focus:outline-none">
                <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13l-1.5-7M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
                </svg>
                <span
                    class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">{{ $quantity }}</span>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false"
                class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg py-2 z-50">
                <!-- Example Item -->

                @forelse ($cartItems as $cartItem)
                    <div class="px-4 py-2 border-b flex justify-between items-center">
                        <span class="text-sm text-gray-700">{{ $cartItem->product->title }}</span>
                        <span class="text-xs text-gray-500">${{ $cartItem->product->price }}</span>
                    </div>

                @empty
                    <p class="px-4 py-2 text-gray-700 text-sm">No items in cart</p>
                @endforelse


                <div class="px-4 py-2 text-center">
                    <a href="{{ route('cart') }}" class="text-indigo-600 text-sm font-semibold hover:underline">View
                        Cart</a>
                </div>
            </div>
        </div>

    </div>
    <!-- FILTERS SECTION -->
    <section class=" my-3">
        <div
            class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row md:justify-around md:items-center space-y-4 md:space-y-0">
            <!-- Category Filter -->
            <form action="{{ route('products.filter') }}" method="GET">
                <div class="flex space-x-4 items-center">
                    <label for="category" class="font-semibold mr-2">Category:</label>
                    <select name="category" id="category" onchange="this.form.submit()"
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="">All</option>
                        <option value="Smartphone" {{ request('category') == 'Smartphone' ? 'selected' : '' }}>Smartphones
                        </option>
                        <option value="Laptops" {{ request('category') == 'Laptops' ? 'selected' : '' }}>Laptops</option>
                        <option value="Cameras" {{ request('category') == 'Cameras' ? 'selected' : '' }}>Cameras</option>
                        <option value="Accessories" {{ request('category') == 'Accessories' ? 'selected' : '' }}>
                            Accessories</option>
                        <option value="Headset" {{ request('category') == 'Headset' ? 'selected' : '' }}>Headset
                        </option>
                        <option value="TV" {{ request('category') == 'TV' ? 'selected' : '' }}>TVs
                        </option>
                    </select>
                </div>
            </form>

            <!-- Price Filter -->
            <form action="{{ route('products.filter') }}" method="GET">
                <div class="flex space-x-4 items-center">
                    <label for="price" class="font-semibold">Price:</label>
                    <select id="price" name="price" onchange="this.form.submit()"
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="">All Prices</option>
                        <option value="under100" {{ request('price') == 'under100' ? 'selected' : '' }}>Under $100</option>
                        <option value="100-500" {{ request('price') == '100-500' ? 'selected' : '' }}>$100 - $500</option>
                        <option value="500-1000" {{ request('price') == '500-1000' ? 'selected' : '' }}>$500 - $1000
                        </option>
                        <option value="over1000" {{ request('price') == 'over1000' ? 'selected' : '' }}>Over $1000
                        </option>
                    </select>
                </div>
            </form>
        </div>
    </section>
@endsection

{{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if (session('error'))
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
 
    
<!-- PRODUCTS GRID -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($products as $product)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex flex-col">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                    class="rounded-lg mb-4 w-full h-48 object-cover">
                <h4 class="font-semibold text-lg mb-1">{{ $product->title }}</h4>
                {{-- <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 10) }}</p> --}}
                <p class="font-bold text-blue-600 mb-4">${{ number_format($product->price, 2) }}</p>
                <a href="{{ route('productdetails', $product) }}"
                    class="mt-auto bg-blue-600 text-white text-center py-2 rounded-lg font-medium hover:bg-blue-500 transition">View
                    Details</a>
            </div>
        @endforeach

    </div>

    <div class="mt-12 flex justify-center">
        {{ $products->links() }}
    </div>
</section>

{{-- <!-- PAGINATION -->
  <section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-6 flex justify-center space-x-3">
      <a href="#" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-500 transition">1</a>
      <a href="#" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 transition">2</a>
      <a href="#" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 transition">3</a>
      <a href="#" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 transition">Next</a>
    </div>
  </section> --}}

<!-- CTA SECTION -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white text-center">
    <h3 class="text-3xl md:text-4xl font-bold mb-4">Find Your Perfect Gadget Today</h3>
    <p class="text-lg mb-6 max-w-2xl mx-auto">Browse our wide range of electronics and enjoy unbeatable prices and fast
        delivery.</p>
    <a href="contact.html"
        class="bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-yellow-300 transition">Contact
        Us</a>
</section>

@endsection
