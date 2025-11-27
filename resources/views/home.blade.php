@extends('layouts.app')

@section('title', 'GadgetSoko')

@section('content')

{{-- SUCCESS MESSAGE --}}
@if (session('success'))
    <div class="bg-teal-400/80 dark:bg-teal-600/80 text-gray-900 dark:text-gray-100 p-3 rounded mb-4 shadow-md backdrop-blur-sm"
        x-data="{ show: true }" x-show="show" x-transition
        x-init="setTimeout(() => show = false, 4000)">
        {{ session('success') }}
    </div>
@endif

{{-- ERROR MESSAGE --}}
@if (session('error'))
    <div class="bg-red-600/80 dark:bg-red-500/80 text-white p-3 rounded mb-4 shadow-md backdrop-blur-sm"
        x-data="{ show: true }" x-show="show" x-transition
        x-init="setTimeout(() => show = false, 4000)">
        {{ session('error') }}
    </div>
@endif

<!-- HERO SECTION -->
<section id="home" class="relative bg-gradient-to-r from-teal-500 via-indigo-500 to-teal-400 dark:from-teal-600 dark:via-indigo-700 dark:to-teal-500 text-white min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-teal-50/20 dark:bg-gray-900/20 pointer-events-none animate-pulse-slow"></div>
    <div class="container mx-auto px-6 flex flex-col-reverse md:flex-row items-center justify-between relative z-10">
        <div class="md:w-1/2 space-y-6 text-center md:text-left">
            <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight drop-shadow-lg">
                GadgetSoko <span class="text-amber-400 dark:text-amber-500">Empowers Your Tech Life</span>
            </h1>
            <p class="text-white/90 dark:text-white/80 text-base sm:text-lg drop-shadow-sm">
                Premium gadgets, unbeatable deals, and fast delivery — all under one roof.
            </p>
            <a href="{{ route('product') }}"
                class="inline-block bg-amber-400 dark:bg-amber-500 text-gray-900 dark:text-gray-900 font-bold px-6 sm:px-8 py-3 rounded-lg shadow-xl hover:shadow-2xl hover:scale-105 transition transform">
                Shop Now
            </a>
        </div>
        <div class="md:w-1/2 mb-12 md:mb-0 relative">
            <img src="{{ asset('images/gadgetsokoHero.jpg') }}" alt="Tech Gadgets"
                class="rounded-xl shadow-2xl w-full md:w-auto max-w-md mx-auto object-cover transform hover:scale-105 transition duration-500">
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-500/30 rounded-full filter blur-3xl animate-pulse-slow"></div>
            <div class="absolute -top-10 -left-10 w-56 h-56 bg-teal-300/30 rounded-full filter blur-3xl animate-pulse-slow"></div>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section id="products" class="py-24 bg-gradient-to-b from-white/90 via-gray-100/70 to-white/90 dark:from-gray-900/80 dark:via-gray-800/70 dark:to-gray-900/80 text-gray-900 dark:text-gray-100 flex flex-col justify-center relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="w-64 h-64 bg-teal-400/10 rounded-full absolute -top-16 -left-16 animate-pulse-slow"></div>
        <div class="w-48 h-48 bg-indigo-500/10 rounded-full absolute -bottom-12 -right-12 animate-pulse-slow"></div>
    </div>

    <div class="container mx-auto px-6 text-center mb-12 relative z-10">
        <h2 class="text-4xl font-bold text-teal-500 dark:text-teal-400 mb-4 drop-shadow-lg">Featured Products</h2>
        <p class="text-gray-700 dark:text-gray-300 max-w-2xl mx-auto mb-6">Handpicked gadgets you’ll love. Browse our top sellers below.</p>
    </div>

    <div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 relative z-10">
        @foreach ($products as $product)
            <div class="bg-white/80 dark:bg-gray-800/80 rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-1 transition backdrop-blur-sm">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                    class="h-48 w-full object-cover">
                <div class="p-4 flex flex-col flex-1">
                    <h3 class="text-lg font-semibold text-teal-500 dark:text-teal-400 mb-1 truncate">{{ $product->title }}</h3>
                    <p class="text-gray-700 dark:text-gray-300 text-sm flex-1 truncate">{{ $product->description }}</p>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-teal-500 dark:text-teal-400 font-bold">Ksh {{ $product->price }}</span>
                        <a href="{{ route('productdetails', $product) }}"
                            class="bg-amber-400 dark:bg-amber-500 text-gray-900 dark:text-gray-900 px-3 py-1 rounded-lg font-semibold hover:scale-105 transition transform">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-16 relative z-10">
        <a href="{{ route('product') }}"
            class="bg-amber-400 dark:bg-amber-500 text-gray-900 dark:text-gray-900 font-bold px-8 py-3 rounded-lg hover:scale-105 transition transform">
            See More Products
        </a>
    </div>
</section>

<!-- TEAM MEMBERS -->
<section id="team" class="py-16 bg-gradient-to-r from-indigo-50/40 via-teal-50/40 to-indigo-50/40 dark:from-gray-800/60 dark:via-gray-900/60 dark:to-gray-800/60 text-center text-gray-900 dark:text-gray-100 relative overflow-hidden">
    <div class="absolute -top-20 -left-20 w-64 h-64 bg-teal-400/20 rounded-full filter blur-3xl animate-pulse-slow"></div>
    <div class="absolute -bottom-20 -right-20 w-56 h-56 bg-indigo-500/20 rounded-full filter blur-3xl animate-pulse-slow"></div>

    <h2 class="text-4xl font-bold text-teal-500 dark:text-teal-400 mb-8 relative z-10">Meet the Team</h2>
    <p class="text-gray-700 dark:text-gray-300 mb-8 relative z-10">Dedicated tech enthusiasts bringing you the best gadgets.</p>

    <div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 relative z-10">
        @foreach ([['name' => 'John Kamau', 'role' => 'Founder & CEO', 'img' => asset('images/john.jpg')],
                   ['name' => 'Jimmy Muhindi', 'role' => 'Head of Operations', 'img' => asset('images/Jimmy.jpg')],
                   ['name' => 'Kush Joseph', 'role' => 'Tech Specialist', 'img' => asset('images/kush.jpg')],
                   ['name' => 'Joyce Chege', 'role' => 'Customer Support Lead', 'img' => asset('images/joyce.jpg')]] as $member)
            <div class="bg-white/70 dark:bg-gray-800/70 rounded-xl shadow-lg p-4 hover:shadow-2xl transform hover:-translate-y-1 transition backdrop-blur-sm text-center">
                <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}"
                    class="w-24 h-24 rounded-full mx-auto mb-2 object-cover">
                <h4 class="font-bold text-teal-500 dark:text-teal-400 text-lg">{{ $member['name'] }}</h4>
                <p class="text-gray-700 dark:text-gray-300 text-sm">{{ $member['role'] }}</p>
            </div>
        @endforeach
    </div>
</section>

<!-- TIMELINE -->
<section class="py-16 bg-gradient-to-b from-gray-50/80 via-gray-100/70 to-gray-50/80 dark:from-gray-900/80 dark:via-gray-800/70 dark:to-gray-900/80 text-gray-900 dark:text-gray-100 relative overflow-hidden">
    <div class="absolute -top-20 -left-10 w-64 h-64 bg-teal-400/10 rounded-full filter blur-3xl animate-pulse-slow"></div>
    <div class="absolute -bottom-20 -right-10 w-56 h-56 bg-indigo-500/10 rounded-full filter blur-3xl animate-pulse-slow"></div>

    <div class="max-w-7xl mx-auto px-6 text-center mb-12 relative z-10">
        <h3 class="text-3xl font-bold text-teal-500 dark:text-teal-400">Our Journey</h3>
        <p class="text-gray-700 dark:text-gray-300 mt-2">Milestones that shaped GadgetSoko</p>
    </div>

    <div class="max-w-4xl mx-auto space-y-8 relative z-10">
        @foreach ([ ['year' => '2025', 'desc' => 'GadgetSoko was founded...'],
                    ['year' => '2026', 'desc' => 'Launched our first online store...'],
                    ['year' => '2027', 'desc' => 'Expanded to regional delivery...'] ] as $index => $item)
            <div class="flex flex-col md:flex-row md:justify-between items-center">
                <div class="z-20 flex items-center bg-teal-500 dark:bg-teal-400 shadow-xl w-8 h-8 rounded-full mx-auto mb-4 md:mb-0">
                    <span class="mx-auto text-white dark:text-gray-900 font-semibold text-sm">{{ $index + 1 }}</span>
                </div>
                <div class="bg-white/70 dark:bg-gray-800/70 rounded-lg shadow-xl px-4 py-3 md:px-6 md:py-4 w-full md:w-5/12 backdrop-blur-sm">
                    <h4 class="font-semibold text-teal-500 dark:text-teal-400">{{ $item['year'] }}</h4>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">{{ $item['desc'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- REVIEWS -->
<section id="reviews" class="py-20 bg-gradient-to-r from-indigo-50/40 via-teal-50/40 to-indigo-50/40 dark:from-gray-800/60 dark:via-gray-900/60 dark:to-gray-800/60 text-center text-gray-900 dark:text-gray-100 relative overflow-hidden">
    <div class="absolute -top-20 -left-20 w-64 h-64 bg-teal-400/20 rounded-full filter blur-3xl animate-pulse-slow"></div>
    <div class="absolute -bottom-20 -right-20 w-56 h-56 bg-indigo-500/20 rounded-full filter blur-3xl animate-pulse-slow"></div>

    <h2 class="text-4xl font-bold text-teal-500 dark:text-teal-400 mb-6 relative z-10">Customer Reviews</h2>
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 relative z-10">
        @forelse ($latestReviews as $latestReview)
            <div class="bg-white/70 dark:bg-gray-800/70 p-6 rounded-xl shadow hover:shadow-lg transform hover:-translate-y-1 transition backdrop-blur-sm">
                <p class="text-gray-700 dark:text-gray-300 italic">{{ $latestReview->review }}</p>
                <h4 class="mt-4 font-semibold text-teal-500 dark:text-teal-400">{{ $latestReview->user->firstName }}</h4>
            </div>
        @empty
            <p class="text-gray-500 dark:text-gray-400">No reviews yet. Be the first to review!</p>
        @endforelse
    </div>
    <div class="flex flex-col sm:flex-row justify-center gap-4 relative z-10">
        <a href="{{ route('testimonial') }}"
            class="bg-amber-400 dark:bg-amber-500 text-gray-900 dark:text-gray-900 font-bold px-6 py-3 rounded-lg hover:scale-105 transition transform">View More Reviews</a>
    </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact" class="py-24 bg-gradient-to-b from-white/90 via-gray-100/70 to-white/90 dark:from-gray-900/80 dark:via-gray-800/70 dark:to-gray-900/80 text-gray-900 dark:text-gray-100 flex items-center relative overflow-hidden">
    <div class="absolute -top-20 -left-20 w-64 h-64 bg-teal-400/10 rounded-full filter blur-3xl animate-pulse-slow"></div>
    <div class="absolute -bottom-20 -right-20 w-56 h-56 bg-indigo-500/10 rounded-full filter blur-3xl animate-pulse-slow"></div>

    <div class="container mx-auto px-6 flex flex-col md:flex-row md:space-x-12 relative z-10">
        <div class="md:w-1/2 bg-white/80 dark:bg-gray-800/80 p-8 md:p-10 rounded-xl shadow-lg backdrop-blur-sm">
            <h3 class="text-3xl font-bold mb-6 text-center md:text-left text-teal-500 dark:text-teal-400">Send a Message</h3>

            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Your Name"
                    class="w-full p-3 bg-white/90 dark:bg-gray-700/90 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg" required>
                <input type="email" name="email" placeholder="Your Email"
                    class="w-full p-3 bg-white/90 dark:bg-gray-700/90 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg" required>
                <input type="text" name="subject" placeholder="Subject"
                    class="w-full p-3 bg-white/90 dark:bg-gray-700/90 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg" required>
                <textarea name="message" rows="5" placeholder="Your Message"
                    class="w-full p-3 bg-white/90 dark:bg-gray-700/90 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg" required></textarea>
                <button type="submit"
                    class="w-full bg-amber-400 dark:bg-amber-500 text-gray-900 dark:text-gray-900 py-3 rounded-lg font-semibold hover:scale-105 transition transform">
                    Send Message
                </button>
            </form>
        </div>

        <div class="md:w-1/2 mt-8 md:mt-0 space-y-6 text-center md:text-left relative z-10">
            <div>
                <h4 class="text-2xl font-bold text-teal-500 dark:text-teal-400 mb-2">Contact Info</h4>
                <p class="text-gray-700 dark:text-gray-300">Email: support@gadgetsoko.com</p>
                <p class="text-gray-700 dark:text-gray-300">Phone: +254 712 345 678</p>
                <p class="text-gray-700 dark:text-gray-300">Address: Westlands, Nairobi, Kenya</p>
            </div>

            <div>
                <h4 class="text-2xl font-bold text-teal-500 dark:text-teal-400 mb-2">Business Hours</h4>
                <p class="text-gray-700 dark:text-gray-300">Mon-Fri: 9AM - 6PM</p>
                <p class="text-gray-700 dark:text-gray-300">Sat: 10AM - 4PM</p>
                <p class="text-gray-700 dark:text-gray-300">Sun: Closed</p>
            </div>

            <div>
                <h4 class="text-2xl font-bold text-teal-500 dark:text-teal-400 mb-2">Find Us</h4>
                <img src="https://via.placeholder.com/400x200?text=Map"
                    alt="Map" class="rounded-xl shadow-lg w-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- FINAL CTA -->
<section class="py-20 bg-gradient-to-r from-teal-500 via-indigo-500 to-teal-400 dark:from-teal-600 dark:via-indigo-700 dark:to-teal-500 text-white dark:text-gray-900 text-center relative overflow-hidden">
    <div class="absolute -top-20 -left-20 w-64 h-64 bg-indigo-500/20 rounded-full filter blur-3xl animate-pulse-slow"></div>
    <div class="absolute -bottom-20 -right-20 w-56 h-56 bg-teal-400/20 rounded-full filter blur-3xl animate-pulse-slow"></div>

    <h2 class="text-4xl font-bold mb-4 relative z-10">Ready to Shop?</h2>
    <p class="mb-6 relative z-10">Check out our latest gadgets and bring your tech dreams to life today.</p>

    <a href="{{ route('product') }}"
        class="bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 font-bold px-8 py-3 rounded-lg hover:scale-105 transition transform relative z-10">
        Shop Now
    </a>
</section>

@endsection
