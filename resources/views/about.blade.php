@extends('layouts.app')

@section('title', 'About-Page')

@section('content')

  <!-- HERO SECTION -->
  <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-24">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h2 class="text-4xl md:text-5xl font-bold mb-4">About GadgetSoko</h2>
      <p class="text-lg md:text-xl text-gray-100 max-w-3xl mx-auto">
        Discover our journey, values, and mission to bring the best electronics to your fingertips.
      </p>
    </div>
  </section>

  <!-- MISSION & VISION -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
      <div>
        <img src="https://images.unsplash.com/photo-1581091870622-3d7c1e0f6a1e" alt="Company Office" class="rounded-2xl shadow-lg w-full">
      </div>
      <div class="space-y-6">
        <h3 class="text-3xl font-bold text-gray-800">Our Mission</h3>
        <p class="text-gray-600">
          To provide cutting-edge electronics that enhance daily life, offering top-quality products with unbeatable service and value.
        </p>
        <h3 class="text-3xl font-bold text-gray-800">Our Vision</h3>
        <p class="text-gray-600">
          To become Kenya’s leading online electronics store, trusted for innovation, quality, and customer satisfaction.
        </p>
      </div>
    </div>
  </section>

  <!-- TEAM MEMBERS -->
  <section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6 text-center mb-12">
      <h3 class="text-3xl font-bold text-gray-800 mb-4">Meet Our Team</h3>
      <p class="text-gray-600">A passionate group of tech enthusiasts dedicated to bringing you the best gadgets.</p>
    </div>
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      <!-- Team Member -->
      <div class="bg-white rounded-xl shadow p-6 text-center">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team Member" class="w-24 h-24 rounded-full mx-auto mb-4">
        <h4 class="font-semibold text-lg">James Kariuki</h4>
        <p class="text-gray-500 text-sm">Founder & CEO</p>
      </div>

      <div class="bg-white rounded-xl shadow p-6 text-center">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team Member" class="w-24 h-24 rounded-full mx-auto mb-4">
        <h4 class="font-semibold text-lg">Sophia Mwangi</h4>
        <p class="text-gray-500 text-sm">Head of Operations</p>
      </div>

      <div class="bg-white rounded-xl shadow p-6 text-center">
        <img src="https://randomuser.me/api/portraits/men/56.jpg" alt="Team Member" class="w-24 h-24 rounded-full mx-auto mb-4">
        <h4 class="font-semibold text-lg">Daniel Otieno</h4>
        <p class="text-gray-500 text-sm">Tech Specialist</p>
      </div>

      <div class="bg-white rounded-xl shadow p-6 text-center">
        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Team Member" class="w-24 h-24 rounded-full mx-auto mb-4">
        <h4 class="font-semibold text-lg">Faith Njeri</h4>
        <p class="text-gray-500 text-sm">Customer Support Lead</p>
      </div>
    </div>
  </section>

  <!-- COMPANY TIMELINE -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center mb-12">
      <h3 class="text-3xl font-bold text-gray-800">Our Journey</h3>
      <p class="text-gray-600 mt-2">Milestones that shaped GadgetSoko</p>
    </div>

    <div class="max-w-4xl mx-auto relative">
      <!-- Timeline Line -->
      <div class="border-l-2 border-blue-600 absolute h-full left-1/2 transform -translate-x-1/2"></div>

      <!-- Timeline Item -->
      <div class="mb-8 flex justify-between items-center w-full">
        <div class="order-1 w-5/12"></div>
        <div class="z-20 flex items-center order-1 bg-blue-600 shadow-xl w-8 h-8 rounded-full">
          <span class="mx-auto text-white font-semibold text-sm">1</span>
        </div>
        <div class="order-1 bg-blue-100 rounded-lg shadow-xl w-5/12 px-6 py-4 text-left">
          <h4 class="font-semibold text-gray-800">2025</h4>
          <p class="text-gray-600">GadgetSoko was founded, aiming to bring affordable electronics to Nairobi residents.</p>
        </div>
      </div>

      <div class="mb-8 flex justify-between items-center w-full flex-row-reverse">
        <div class="order-1 w-5/12"></div>
        <div class="z-20 flex items-center order-1 bg-blue-600 shadow-xl w-8 h-8 rounded-full">
          <span class="mx-auto text-white font-semibold text-sm">2</span>
        </div>
        <div class="order-1 bg-blue-100 rounded-lg shadow-xl w-5/12 px-6 py-4 text-left">
          <h4 class="font-semibold text-gray-800">2026</h4>
          <p class="text-gray-600">Launched our first online store with over 500 products and gained our first 1000 customers.</p>
        </div>
      </div>

      <div class="mb-8 flex justify-between items-center w-full">
        <div class="order-1 w-5/12"></div>
        <div class="z-20 flex items-center order-1 bg-blue-600 shadow-xl w-8 h-8 rounded-full">
          <span class="mx-auto text-white font-semibold text-sm">3</span>
        </div>
        <div class="order-1 bg-blue-100 rounded-lg shadow-xl w-5/12 px-6 py-4 text-left">
          <h4 class="font-semibold text-gray-800">2027</h4>
          <p class="text-gray-600">Expanded to regional delivery across Kenya and introduced premium electronics categories.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA SECTION -->
  <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white text-center">
    <h3 class="text-3xl md:text-4xl font-bold mb-4">Ready to Explore Our Products?</h3>
    <p class="text-lg mb-6 max-w-2xl mx-auto">Check out our latest gadgets and bring your tech dreams to life today!</p>
    <a href="products.html" class="bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-yellow-300 transition">Shop Now</a>
  </section>

@endsection