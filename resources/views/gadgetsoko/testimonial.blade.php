@extends('gadgetsoko.layouts.app')

@section('title', 'Testimonial-Page')

@section('content')

@include('gadgetsoko.components.nav')

  <!-- HERO SECTION -->
  <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-24 text-center">
    <h2 class="text-4xl md:text-5xl font-bold mb-4">What Our Customers Say</h2>
    <p class="text-lg md:text-xl max-w-3xl mx-auto">
      Read the experiences of our happy customers and discover why GadgetSoko is Kenya’s trusted electronics store.
    </p>
  </section>

  <!-- FEATURED TESTIMONIALS -->
  <section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-center">
      <!-- Testimonial Card -->
      <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="w-20 h-20 rounded-full mb-4">
        <p class="text-gray-600 italic mb-4">
          "The service was excellent! My laptop arrived faster than expected and works perfectly."
        </p>
        <h4 class="font-semibold text-blue-600">James K.</h4>
        <span class="text-gray-400 text-sm">Laptop Buyer</span>
      </div>

      <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Customer" class="w-20 h-20 rounded-full mb-4">
        <p class="text-gray-600 italic mb-4">
          "GadgetSoko has the best prices on smartphones. I saved a lot and the product quality is excellent!"
        </p>
        <h4 class="font-semibold text-blue-600">Sophia N.</h4>
        <span class="text-gray-400 text-sm">Smartphone Buyer</span>
      </div>

      <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
        <img src="https://randomuser.me/api/portraits/men/56.jpg" alt="Customer" class="w-20 h-20 rounded-full mb-4">
        <p class="text-gray-600 italic mb-4">
          "I’m impressed with their headphones selection. Great sound quality and delivery was fast!"
        </p>
        <h4 class="font-semibold text-blue-600">Daniel O.</h4>
        <span class="text-gray-400 text-sm">Headphones Buyer</span>
      </div>
    </div>
  </section>

  <!-- ALL TESTIMONIALS GRID -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center mb-12">
      <h3 class="text-3xl font-bold text-gray-800">More Customer Experiences</h3>
      <p class="text-gray-600 mt-2">See why thousands trust GadgetSoko for electronics in Kenya.</p>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      <!-- Testimonial -->
      <div class="bg-gray-50 rounded-xl shadow p-6 text-center">
        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Customer" class="w-16 h-16 rounded-full mx-auto mb-4">
        <p class="text-gray-600 italic mb-3">
          "Great service, fast delivery, and top-notch quality electronics!"
        </p>
        <h4 class="font-semibold text-blue-600">Faith M.</h4>
        <span class="text-gray-400 text-sm">Camera Buyer</span>
      </div>

      <div class="bg-gray-50 rounded-xl shadow p-6 text-center">
        <img src="https://randomuser.me/api/portraits/men/77.jpg" alt="Customer" class="w-16 h-16 rounded-full mx-auto mb-4">
        <p class="text-gray-600 italic mb-3">
          "I bought my first gaming laptop from GadgetSoko. The experience was amazing!"
        </p>
        <h4 class="font-semibold text-blue-600">Brian K.</h4>
        <span class="text-gray-400 text-sm">Gaming Buyer</span>
      </div>

      <div class="bg-gray-50 rounded-xl shadow p-6 text-center">
        <img src="https://randomuser.me/api/portraits/women/88.jpg" alt="Customer" class="w-16 h-16 rounded-full mx-auto mb-4">
        <p class="text-gray-600 italic mb-3">
          "Highly recommend GadgetSoko! Excellent prices and reliable delivery."
        </p>
        <h4 class="font-semibold text-blue-600">Rachel N.</h4>
        <span class="text-gray-400 text-sm">Smartwatch Buyer</span>
      </div>

      <div class="bg-gray-50 rounded-xl shadow p-6 text-center">
        <img src="https://randomuser.me/api/portraits/men/90.jpg" alt="Customer" class="w-16 h-16 rounded-full mx-auto mb-4">
        <p class="text-gray-600 italic mb-3">
          "Fast shipping, great packaging, and quality gadgets. Love it!"
        </p>
        <h4 class="font-semibold text-blue-600">Kevin W.</h4>
        <span class="text-gray-400 text-sm">Tablet Buyer</span>
      </div>
    </div>
  </section>

  <!-- CTA SECTION -->
  <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white text-center">
    <h3 class="text-3xl md:text-4xl font-bold mb-4">Want to Experience It Yourself?</h3>
    <p class="text-lg mb-6 max-w-2xl mx-auto">Browse our latest products and join thousands of satisfied customers today.</p>
    <a href="products.html" class="bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-yellow-300 transition">Shop Now</a>
  </section>

@include('gadgetsoko.components.footer')
@endsection