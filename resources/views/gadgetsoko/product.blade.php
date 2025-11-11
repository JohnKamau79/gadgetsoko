@extends('gadgetsoko.layouts.app')

@section('title', 'Product-Page')

@section('content')

@include('gadgetsoko.components.nav')

  <!-- HERO / PAGE TITLE -->
  <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-24 text-center">
    <h2 class="text-4xl md:text-5xl font-bold mb-4">Our Products</h2>
    <p class="text-lg md:text-xl max-w-3xl mx-auto">
      Explore our wide range of electronics, gadgets, and accessories.
    </p>
        <a href="{{ route('products.create') }}" class="bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-yellow-300 transition">Create Post</a>

  </section>

  <!-- FILTERS SECTION -->
  <section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
      <!-- Category Filter -->
      <div class="flex space-x-4 items-center">
        <label for="category" class="font-semibold">Category:</label>
        <select id="category" class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
          <option>All</option>
          <option>Phones</option>
          <option>Laptops</option>
          <option>Cameras</option>
          <option>Accessories</option>
          <option>Headphones</option>
        </select>
      </div>

      <!-- Price Filter -->
      <div class="flex space-x-4 items-center">
        <label for="price" class="font-semibold">Price:</label>
        <select id="price" class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
          <option>All</option>
          <option>Under $100</option>
          <option>$100 - $500</option>
          <option>$500 - $1000</option>
          <option>Above $1000</option>
        </select>
      </div>
    </div>
  </section>

  <!-- PRODUCTS GRID -->
  <section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      
      @foreach($products as $product)
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex flex-col">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="rounded-lg mb-4 w-full h-48 object-cover">
        <h4 class="font-semibold text-lg mb-1">{{ $product->title }}</h4>
        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 70) }}</p>
        <p class="font-bold text-blue-600 mb-4">${{ number_format($product->price, 2) }}</p>
        <a href="#" class="mt-auto bg-blue-600 text-white text-center py-2 rounded-lg font-medium hover:bg-blue-500 transition">View Details</a>
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
    <p class="text-lg mb-6 max-w-2xl mx-auto">Browse our wide range of electronics and enjoy unbeatable prices and fast delivery.</p>
    <a href="contact.html" class="bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-yellow-300 transition">Contact Us</a>
  </section>

@include('gadgetsoko.components.footer')
@endsection