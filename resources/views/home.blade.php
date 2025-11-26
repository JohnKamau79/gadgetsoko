@extends('layouts.app')

@section('title', 'GadgetSoko')

@section('content')

{{-- SUCCESS MESSAGE --}}
@if (session('success'))
    <div class="bg-green-200 text-green-800 p-3 rounded mb-4" x-data="{ show: true }" x-show="show" x-transition
        x-init="setTimeout(() => show = false, 4000)">
        {{ session('success') }}
    </div>
@endif

{{-- ERROR MESSAGE --}}
@if (session('error'))
    <div class="bg-red-200 text-red-800 p-3 rounded mb-4" x-data="{ show: true }" x-show="show" x-transition
        x-init="setTimeout(() => show = false, 4000)">
        {{ session('error') }}
    </div>
@endif

<!-- HERO SECTION -->
<section id="home" class="relative bg-gray-900 text-white min-h-screen flex items-center">
    <div class="container mx-auto px-6 flex flex-col-reverse md:flex-row items-center justify-between">
        <div class="md:w-1/2 space-y-6 text-center md:text-left">
            <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight">
                GadgetSoko <span class="text-teal-400">Empowers Your Tech Life</span>
            </h1>
            <p class="text-gray-300 text-base sm:text-lg">
                Premium gadgets, unbeatable deals, and fast delivery — all under one roof.
            </p>
            <a href="{{ route('product') }}"
                class="inline-block bg-teal-400 text-gray-900 font-bold px-6 sm:px-8 py-3 rounded-lg shadow hover:bg-teal-500 transition">
                Shop Now
            </a>
        </div>
        <div class="md:w-1/2 mb-12 md:mb-0">
            <img src="{{ asset('images/gadgetsokoHero.jpg') }}" alt="Tech Gadgets"
                class="rounded-xl shadow-xl w-full md:w-auto max-w-md mx-auto object-cover">
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section id="products" class="py-24 bg-gray-300 flex flex-col justify-center">
    <div class="container mx-auto px-6 text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Featured Products</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-6">Handpicked gadgets you’ll love. Browse our top sellers below.</p>
    </div>
    <div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition flex flex-col">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                    class="h-48 w-full object-cover">
                <div class="p-4 flex flex-col flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1 truncate">{{ $product->title }}</h3>
                    <p class="text-gray-500 text-sm flex-1 truncate">{{ $product->description }}</p>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-teal-500 font-bold">{{ $product->price }}</span>
                        <a href="{{ route('productdetails', $product) }}"
                            class="bg-blue-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-blue-500 transition">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-8">
        <a href="{{ route('product') }}"
            class="bg-yellow-400 text-gray-900 font-bold px-8 py-3 rounded-lg hover:bg-yellow-300 transition">
            See More Products
        </a>
    </div>
</section>

<!-- TEAM MEMBERS -->
<section id="team" class="py-16 bg-gray-100 text-center">
    <h2 class="text-4xl font-bold text-gray-800 mb-8">Meet the Team</h2>
    <p class="text-gray-600 mb-8">Dedicated tech enthusiasts bringing you the best gadgets.</p>
    <div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ([['name' => 'John Kamau', 'role' => 'Founder & CEO', 'img' => asset('images/john.jpg')], ['name' => 'Jimmy Muhindi', 'role' => 'Head of Operations', 'img' => asset('images/Jimmy.jpg')], ['name' => 'Kush Joseph', 'role' => 'Tech Specialist', 'img' => asset('images/kush.jpg')], ['name' => 'Joyce Chege', 'role' => 'Customer Support Lead', 'img' => asset('images/joyce.jpg')]] as $member)
            <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition text-center">
                <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-24 h-24 sm:w-20 sm:h-20 rounded-full mx-auto mb-2 object-cover">
                <h4 class="font-bold text-teal-400 text-lg">{{ $member['name'] }}</h4>
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

    <div class="max-w-4xl mx-auto space-y-8">
        @foreach ([
            ['year' => '2025', 'desc' => 'GadgetSoko was founded, aiming to bring affordable electronics to Nairobi residents.'],
            ['year' => '2026', 'desc' => 'Launched our first online store with over 500 products and gained our first 1000 customers.'],
            ['year' => '2027', 'desc' => 'Expanded to regional delivery across Kenya and introduced premium electronics categories.']
        ] as $index => $item)
            <div class="flex flex-col md:flex-row md:justify-between items-center">
                <div class="z-20 flex items-center bg-blue-600 shadow-xl w-8 h-8 rounded-full mx-auto mb-4 md:mb-0">
                    <span class="mx-auto text-white font-semibold text-sm">{{ $index + 1 }}</span>
                </div>
                <div class="bg-blue-100 rounded-lg shadow-xl px-4 py-3 md:px-6 md:py-4 w-full md:w-5/12">
                    <h4 class="font-semibold text-gray-800">{{ $item['year'] }}</h4>
                    <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- REVIEWS -->
<section id="reviews" class="py-20 bg-white text-center">
    <h2 class="text-4xl font-bold text-gray-800 mb-6">Customer Reviews</h2>
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        @forelse ($latestReviews as $latestReview)
            <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
                <p class="text-gray-600 italic">{{ $latestReview->review }}</p>
                <h4 class="mt-4 font-semibold text-teal-400">{{ $latestReview->user->firstName }}</h4>
            </div>
        @empty
            <p class="text-gray-500">No reviews yet. Be the first to review!</p>
        @endforelse
    </div>
    <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="{{ route('testimonial') }}"
            class="bg-teal-400 text-gray-900 font-bold px-6 py-3 rounded-lg hover:bg-teal-500 transition">Leave A Review</a>
        <a href="{{ route('testimonial') }}"
            class="bg-teal-400 text-gray-900 font-bold px-6 py-3 rounded-lg hover:bg-teal-500 transition">View More Reviews</a>
    </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact" class="py-24 bg-gray-900 text-white flex items-center">
    <div class="container mx-auto px-6 flex flex-col md:flex-row md:space-x-12">
        <div class="md:w-1/2 bg-gray-800 p-8 md:p-10 rounded-xl shadow-lg">
            <h3 class="text-3xl font-bold mb-6 text-center md:text-left">Send a Message</h3>
            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Your Name"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                <input type="email" name="email" placeholder="Your Email"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                <input type="text" name="subject" placeholder="Subject"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                <textarea name="message" rows="5" placeholder="Your Message"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required></textarea>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-500 transition">Send Message</button>
            </form>
        </div>
        <div class="md:w-1/2 mt-8 md:mt-0 space-y-6 text-center md:text-left">
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
                <img src="https://via.placeholder.com/400x200?text=Map" alt="Map" class="rounded-xl shadow-lg w-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- FINAL CTA -->
<section class="py-20 bg-teal-400 text-gray-900 text-center">
    <h2 class="text-4xl font-bold mb-4">Ready to Shop?</h2>
    <p class="mb-6">Check out our latest gadgets and bring your tech dreams to life today.</p>
    <a href="{{ route('product') }}"
        class="bg-gray-900 text-white font-bold px-8 py-3 rounded-lg hover:bg-gray-800 transition">Shop Now</a>
</section>

@endsection
 