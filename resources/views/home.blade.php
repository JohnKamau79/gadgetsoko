@extends('layouts.app')

@section('title', 'GadgetSoko')

@section('content')

{{-- ALERTS --}}
@if(session('success'))
<div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 mb-4" role="alert">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 mb-4" role="alert">
    {{ session('error') }}
</div>
@endif

<!-- HERO SECTION -->
<section id="home" class="relative bg-gray-900 text-white min-h-screen flex items-center">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 space-y-6">
            <h1 class="text-5xl font-extrabold leading-tight">GadgetSoko <span class="text-teal-400">Empowers Your Tech Life</span></h1>
            <p class="text-gray-300 text-lg">Premium gadgets, unbeatable deals, and fast delivery — all under one roof.</p>
            <a href="#products" class="inline-block bg-teal-400 text-gray-900 font-bold px-8 py-3 rounded-lg shadow hover:bg-teal-500 transition">Shop Now</a>
        </div>
        <div class="md:w-1/2 mt-12 md:mt-0">
            <img src="https://images.unsplash.com/photo-1593642532973-d31b6557fa68" alt="Tech Gadgets" class="rounded-xl shadow-xl w-full md:w-4/5 mx-auto">
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section id="products" class="py-24 bg-gray-300 min-h-screen flex flex-col justify-center">
    <div class="container mx-auto px-6 text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Featured Products</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-6">Handpicked gadgets you’ll love. Browse our top sellers below.</p>
    </div>
    <div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach([
            ['name'=>'Dell Inspiron 15','price'=>'Ksh 26,749','img'=>'https://images.unsplash.com/photo-1512499617640-c2f999098a1e','desc'=>'Everyday laptop for work & play.'],
            ['name'=>'iPhone 14 Pro','price'=>'Ksh 101,099','img'=>'https://images.unsplash.com/photo-1603791440384-56cd371ee9a7','desc'=>'Next-level smartphone experience.'],
            ['name'=>'Sony WH-1000XM5','price'=>'Ksh 40,399','img'=>'https://images.unsplash.com/photo-1611078489935-c4312e3b65b3','desc'=>'Top-notch noise cancellation headphones.'],
            ['name'=>'Canon EOS R10','price'=>'Ksh 70,999','img'=>'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f','desc'=>'High-quality mirrorless camera.'],
            ['name'=>'Samsung Galaxy S23','price'=>'Ksh 85,500','img'=>'https://images.unsplash.com/photo-1603791440384-56cd371ee9a7','desc'=>'Latest Android flagship.'],
            ['name'=>'Bose QC45','price'=>'Ksh 39,500','img'=>'https://images.unsplash.com/photo-1611078489935-c4312e3b65b3','desc'=>'Premium noise-cancelling headphones.'],
            ['name'=>'MacBook Air','price'=>'Ksh 120,000','img'=>'https://images.unsplash.com/photo-1512499617640-c2f999098a1e','desc'=>'Lightweight high-performance laptop.'],
            ['name'=>'GoPro Hero 11','price'=>'Ksh 60,000','img'=>'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f','desc'=>'Adventure-ready camera.']
        ] as $product)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 flex flex-col">
            <img src="{{ $product['img'] }}" alt="{{ $product['name'] }}" class="h-48 w-full object-cover">
            <div class="p-4 flex flex-col flex-1">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $product['name'] }}</h3>
                <p class="text-gray-500 text-sm flex-1">{{ $product['desc'] }}</p>
                <div class="mt-3 flex justify-between items-center">
                    <span class="text-teal-500 font-bold">{{ $product['price'] }}</span>
                    <a href="#" class="bg-blue-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-blue-500 transition">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center mt-8">
        <a href="#all-products" class="bg-yellow-400 text-gray-900 font-bold px-8 py-3 rounded-lg hover:bg-yellow-300 transition">See More Products</a>
    </div>
</section>
<!-- TEAM MEMBERS -->
<section id="team" class="py-16 bg-gray-100 text-center">
    <h2 class="text-4xl font-bold text-gray-800 mb-8">Meet the Team</h2>
    <p class="text-gray-600 mb-8">Dedicated tech enthusiasts bringing you the best gadgets.</p>
    <div class="container mx-auto px-6 grid grid-cols-2 sm:grid-cols-4 gap-6">
        @foreach([
            ['name'=>'James Kariuki','role'=>'Founder & CEO','img'=>'https://randomuser.me/api/portraits/men/32.jpg'],
            ['name'=>'Sophia Mwangi','role'=>'Head of Operations','img'=>'https://randomuser.me/api/portraits/women/44.jpg'],
            ['name'=>'Daniel Otieno','role'=>'Tech Specialist','img'=>'https://randomuser.me/api/portraits/men/56.jpg'],
            ['name'=>'Faith Njeri','role'=>'Customer Support Lead','img'=>'https://randomuser.me/api/portraits/women/65.jpg'],
        ] as $member)
        <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition">
            <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-20 h-20 rounded-full mx-auto mb-2">
            <h4 class="font-bold text-teal-400">{{ $member['name'] }}</h4>
            <p class="text-gray-600 text-sm">{{ $member['role'] }}</p>
        </div>
        @endforeach
    </div>
</section>

  <!-- COMPANY TIMELINE -->
  <section class="py-16 bg-gray-300">
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

<!-- REVIEWS -->
<section id="reviews" class="py-20 bg-white text-center">
    <h2 class="text-4xl font-bold text-gray-800 mb-6">Customer Reviews</h2>
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
            <p class="text-gray-600 italic">"Great service and fast delivery! Highly recommended."</p>
            <h4 class="mt-4 font-semibold text-teal-400">— Sarah N.</h4>
        </div>
        <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
            <p class="text-gray-600 italic">"Best electronics store in Nairobi. Quality products and affordable prices."</p>
            <h4 class="mt-4 font-semibold text-teal-400">— Brian K.</h4>
        </div>
        <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
            <p class="text-gray-600 italic">"Fast response and great support. Loved my new laptop!"</p>
            <h4 class="mt-4 font-semibold text-teal-400">— Faith M.</h4>
        </div>
    </div>
    <a href="#all-reviews" class="bg-teal-400 text-gray-900 font-bold px-6 py-3 rounded-lg hover:bg-teal-500 transition">View More Reviews</a>
</section>

<!-- CONTACT SECTION -->
<section id="contact" class="py-24 bg-gray-900 text-white min-h-screen flex items-center">
    <div class="container mx-auto px-6 md:flex md:space-x-12">
        <div class="md:w-1/2 bg-gray-800 p-10 rounded-xl shadow-lg">
            <h3 class="text-3xl font-bold mb-6">Send a Message</h3>
            <form action="#" method="POST" class="space-y-4">
                <input type="text" name="name" placeholder="Your Name" class="w-full p-3 rounded-lg outline-none focus:ring-2 focus:ring-teal-400" required>
                <input type="email" name="email" placeholder="Your Email" class="w-full p-3 rounded-lg outline-none focus:ring-2 focus:ring-teal-400" required>
                <input type="text" name="subject" placeholder="Subject" class="w-full p-3 rounded-lg outline-none focus:ring-2 focus:ring-teal-400" required>
                <textarea name="message" rows="5" placeholder="Your Message" class="w-full p-3 rounded-lg outline-none focus:ring-2 focus:ring-teal-400" required></textarea>
                <button type="submit" class="w-full bg-teal-400 text-gray-900 py-3 rounded-lg font-bold hover:bg-teal-500 transition">Send</button>
            </form>
        </div>
        <div class="md:w-1/2 mt-12 md:mt-0 space-y-6">
            <div>
                <h4 class="text-2xl font-bold mb-2">Contact Info</h4>
                <p>Email: support@gadgetsoko.com</p>
                <p>Phone: +254 712 345 678</p>
                <p>Address: Westlands, Nairobi, Kenya</p>
            </div>
            <div>
                <h4 class="text-2xl font-bold mb-2">Business Hours</h4>
                <p>Mon-Fri: 9AM - 6PM</p>
                <p>Sat: 10AM - 4PM</p>
                <p>Sun: Closed</p>
            </div>
            <div>
                <h4 class="text-2xl font-bold mb-2">Find Us</h4>
                <img src="https://via.placeholder.com/400x200?text=Map" alt="Map" class="rounded-xl shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- FINAL CTA -->
<section class="py-20 bg-teal-400 text-gray-900 text-center">
    <h2 class="text-4xl font-bold mb-4">Ready to Shop?</h2>
    <p class="mb-6">Check out our latest gadgets and bring your tech dreams to life today.</p>
    <a href="#products" class="bg-gray-900 text-white font-bold px-8 py-3 rounded-lg hover:bg-gray-800 transition">Shop Now</a>
</section>

@endsection
