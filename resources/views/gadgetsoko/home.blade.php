@extends('gadgetsoko.layouts.app')

@section('title', 'Home-Page')

@section('content')

@include('gadgetsoko.components.nav')
  <!-- HERO SECTION -->
  <section id="home" class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between py-20 px-6">
      <div class="md:w-1/2 space-y-6">
        <h2 class="text-4xl md:text-5xl font-bold leading-tight">
          Explore the Latest & Greatest in <span class="text-yellow-400">Electronics</span>
        </h2>
        <p class="text-gray-100 text-lg">
          From cutting-edge smartphones to high-performance laptops, we bring you quality gadgets at unbeatable prices.
        </p>
        <a href="#products" class="inline-block bg-yellow-400 text-gray-900 font-semibold px-6 py-3 rounded-lg shadow hover:bg-yellow-300 transition">
          Shop Now
        </a>
      </div>
      <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
        <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8" alt="Electronics" class="rounded-2xl shadow-lg w-4/5">
      </div>
    </div>
  </section>

  <!-- FEATURED PRODUCTS -->
  <section id="products" class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto text-center mb-12">
      <h3 class="text-3xl font-bold text-gray-800 mb-4">Featured Products</h3>
      <p class="text-gray-600">Top-selling gadgets handpicked just for you</p>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-6">
      <!-- Product Card -->
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">
        <img src="https://images.unsplash.com/photo-1512499617640-c2f999098a1e" alt="Laptop" class="rounded-lg mb-4 w-full h-48 object-cover">
        <h4 class="font-semibold text-lg">Dell Inspiron 15</h4>
        <p class="text-gray-600 text-sm mb-3">Powerful laptop for everyday use.</p>
        <p class="font-bold text-blue-600 mb-2">Ksh 26,749</p>
        <a href="#" class="block bg-blue-600 text-white text-center py-2 rounded-lg font-medium hover:bg-blue-500 transition">View Details</a>
      </div>

      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">
        <img src="https://images.unsplash.com/photo-1603791440384-56cd371ee9a7" alt="Phone" class="rounded-lg mb-4 w-full h-48 object-cover">
        <h4 class="font-semibold text-lg">iPhone 14 Pro</h4>
        <p class="text-gray-600 text-sm mb-3">Redefining smartphone experience.</p>
        <p class="font-bold text-blue-600 mb-2">Ksh 101,099</p>
        <a href="#" class="block bg-blue-600 text-white text-center py-2 rounded-lg font-medium hover:bg-blue-500 transition">View Details</a>
      </div>

      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">
        <img src="https://images.unsplash.com/photo-1611078489935-c4312e3b65b3" alt="Headphones" class="rounded-lg mb-4 w-full h-48 object-cover">
        <h4 class="font-semibold text-lg">Sony WH-1000XM5</h4>
        <p class="text-gray-600 text-sm mb-3">Noise cancelling like never before.</p>
        <p class="font-bold text-blue-600 mb-2">Ksh 40,399</p>
        <a href="#" class="block bg-blue-600 text-white text-center py-2 rounded-lg font-medium hover:bg-blue-500 transition">View Details</a>
      </div>

      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">
        <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f" alt="Camera" class="rounded-lg mb-4 w-full h-48 object-cover">
        <h4 class="font-semibold text-lg">Canon EOS R10</h4>
        <p class="text-gray-600 text-sm mb-3">Capture every moment beautifully.</p>
        <p class="font-bold text-blue-600 mb-2">Ksh 70,999</p>
        <a href="#" class="block bg-blue-600 text-white text-center py-2 rounded-lg font-medium hover:bg-blue-500 transition">View Details</a>
      </div>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center px-6 space-y-10 md:space-y-0 md:space-x-10">
      <div class="md:w-1/2">
        <img src="https://images.unsplash.com/photo-1581091870622-3d7c1e0f6a1e" alt="Store" class="rounded-2xl shadow-lg w-full">
      </div>
      <div class="md:w-1/2 space-y-5">
        <h3 class="text-3xl font-bold text-gray-800">About GadgetSoko</h3>
        <p class="text-gray-600">
          Founded in 2025, GadgetSoko aims to revolutionize how you buy electronics online. Our goal is to provide top-quality gadgets, competitive prices, and exceptional customer service.
        </p>
        <p class="text-gray-600">
          We partner with trusted brands to ensure all our products meet global standards. Whether you're a tech enthusiast or a casual buyer, you'll find something you love.
        </p>
        <a href="#contact" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-500 transition">
          Learn More
        </a>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section id="testimonials" class="py-16 bg-gray-100 text-center">
    <h3 class="text-3xl font-bold mb-8">What Our Customers Say</h3>
    <div class="max-w-5xl mx-auto grid md:grid-cols-3 gap-8 px-6">
      <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-600 italic">"Great customer service and fast delivery! I got my new laptop within two days."</p>
        <h4 class="mt-4 font-semibold text-blue-600">— Sarah N.</h4>
      </div>
      <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-600 italic">"GadgetSoko has the best prices in Nairobi. My go-to store for all electronics."</p>
        <h4 class="mt-4 font-semibold text-blue-600">— Brian K.</h4>
      </div>
      <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-600 italic">"Super reliable and the product quality exceeded my expectations. Highly recommend!"</p>
        <h4 class="mt-4 font-semibold text-blue-600">— Faith M.</h4>
      </div>
    </div>
  </section>

 <!-- CONTACT FORM -->
  <section id="contact" class="py-16 bg-white">
    <div class="max-w-4xl mx-auto text-center mb-10">
      <h3 class="text-3xl font-bold text-gray-800">Get In Touch</h3>
      <p class="text-gray-600 mt-2">We’d love to hear from you. Fill out the form below and we’ll get back to you soon.</p>
    </div>

    <form class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 px-6">
      <input type="text" placeholder="Your Name" class="border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-blue-500 outline-none">
      <input type="email" placeholder="Your Email" class="border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-blue-500 outline-none">
      <textarea placeholder="Your Message" rows="5" class="md:col-span-2 border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
      <button type="submit" class="md:col-span-2 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-500 transition">Send Message</button>
    </form>
  </section>

@include('gadgetsoko.components.footer')
@endsection
