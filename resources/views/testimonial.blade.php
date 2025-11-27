@extends('layouts.app')

@section('title', 'Testimonial-Page')

@section('content')

{{-- SUCCESS MESSAGE --}}
@if (session('success'))
    <div class="bg-green-200 dark:bg-green-700 text-green-800 dark:text-green-200 p-3 rounded text-center" 
        x-data="{ show: true }" x-show="show" x-transition
        x-init="setTimeout(() => show = false, 4000)">
        {{ session('success') }}
    </div>
@endif

{{-- ERROR MESSAGE --}}
@if (session('error'))
    <div class="bg-red-200 dark:bg-red-700 text-red-800 dark:text-red-200 p-3 rounded text-center" 
        x-data="{ show: true }" x-show="show" x-transition
        x-init="setTimeout(() => show = false, 4000)">
        {{ session('error') }}
    </div>
@endif

<!-- HERO SECTION -->
<section class="relative bg-gradient-to-r from-teal-500 via-teal-600 to-indigo-700 dark:from-gray-900 dark:via-indigo-900 dark:to-gray-800 text-white py-32 px-6 text-center md:text-left overflow-hidden">
    <div class="absolute -top-20 -left-20 w-56 h-56 bg-white/20 dark:bg-gray-700/20 rounded-full filter blur-3xl animate-pulse-slow"></div>
    <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-teal-300/20 dark:bg-indigo-700/20 rounded-full filter blur-3xl animate-pulse-slow"></div>

    <div class="relative z-10 max-w-7xl mx-auto">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6">What Our Customers Say</h2>
        <p class="text-lg md:text-xl mb-8 max-w-3xl">Read the experiences of our happy customers and discover why GadgetSoko is Kenya’s trusted electronics store.</p>

        @auth
            <div x-data="{ open: false }" class="inline-block">
                <button @click="open = true"
                    class="bg-yellow-400 dark:bg-teal-400 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-yellow-300 dark:hover:bg-teal-500 transition">
                    Leave a Review
                </button>

                <!-- Modal -->
                <div x-show="open" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div @click.away="open = false" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md relative">
                        <button @click="open = false"
                            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 dark:hover:text-gray-100 font-bold text-xl">&times;</button>

                        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100 text-center">Review Our Website</h2>

                        <form action="{{ route('testimonial.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block font-medium mb-2 text-gray-700 dark:text-gray-200">Rating</label>
                                <select name="rating" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-gray-100" required>
                                    <option value="">Select Rating</option>
                                    <option value="1">⭐ 1</option>
                                    <option value="2">⭐⭐ 2</option>
                                    <option value="3">⭐⭐⭐ 3</option>
                                    <option value="4">⭐⭐⭐⭐ 4</option>
                                    <option value="5">⭐⭐⭐⭐⭐ 5</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-medium mb-2 text-gray-700 dark:text-gray-200">Review</label>
                                <textarea name="review" rows="4" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-gray-100"
                                    placeholder="Write your thoughts about our website..." required></textarea>
                            </div>

                            <button class="bg-teal-500 dark:bg-teal-400 text-white px-6 py-2 rounded hover:bg-teal-600 dark:hover:bg-teal-500 transition w-full">
                                Submit Review
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
</section>

<!-- FEATURED TESTIMONIALS -->
<section class="py-16 bg-gray-50 dark:bg-gray-900 relative">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100 text-center">User Reviews</h2>

        <div class="flex flex-wrap justify-center gap-6">
            @forelse ($latestReviews as $latestReview)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 flex flex-col items-center text-center w-72">
                    <img src="{{ asset('storage/' . $latestReview->user->avatar) }}" alt="{{ $latestReview->user->firstName }}" 
                        class="w-20 h-20 rounded-full mb-4 object-cover">

                    <span class="text-yellow-500 mb-2">{{ str_repeat('⭐', $latestReview->rating) }}</span>

                    <p class="text-gray-600 dark:text-gray-300 italic mb-4">{{ $latestReview->review }}</p>

                    <h4 class="font-semibold text-blue-600 dark:text-teal-400">{{ $latestReview->user->firstName }}</h4>
                    <span class="text-gray-400 dark:text-gray-400 text-sm">{{ $latestReview->user->role ?? 'User' }}</span>
                    <p class="text-gray-500 dark:text-gray-500 text-sm mt-1">{{ $latestReview->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">No reviews yet. Be the first to review!</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ADDITIONAL REVIEWS --}}
<section class="py-16 bg-gray-100 dark:bg-gray-800 relative">
    <div class="max-w-7xl mx-auto px-6 text-center mb-12">
        <h3 class="text-3xl font-bold text-gray-800 dark:text-gray-100">More Customer Experiences</h3>
        <p class="text-gray-600 dark:text-gray-300 mt-2">See why thousands trust GadgetSoko for electronics in Kenya.</p>
    </div>

    <div class="relative">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 scrollbar-hide scroll-smooth" id="reviewsContainer">
            @forelse ($reviews as $review)
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-6 text-center">
                    <img src="{{ asset('storage/' . $review->user->avatar) }}" alt="{{ $review->user->firstName }}" 
                        class="w-16 h-16 rounded-full mx-auto mb-4 object-cover">
                    <span class="text-yellow-500 mb-2">{{ str_repeat('⭐', $review->rating) }}</span>
                    <p class="text-gray-600 dark:text-gray-300 italic mb-3">{{ $review->review }}</p>
                    <h4 class="font-semibold text-blue-600 dark:text-teal-400">{{ $review->user->firstName }}</h4>
                    <span class="text-gray-400 dark:text-gray-400 text-sm">{{ $review->user->role ?? 'User' }}</span>
                    <p class="text-gray-500 dark:text-gray-500 text-sm mt-1">{{ $review->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">No reviews yet. Be the first to review!</p>
            @endforelse
        </div>

        <!-- Scroll buttons -->
        <button class="hidden md:flex absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white dark:bg-gray-700 shadow rounded-full p-2 hover:bg-gray-100 dark:hover:bg-gray-600"
            onclick="document.getElementById('reviewsContainer').scrollBy({ left: -300, behavior: 'smooth' })">&#x276E;</button>
        <button class="hidden md:flex absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white dark:bg-gray-700 shadow rounded-full p-2 hover:bg-gray-100 dark:hover:bg-gray-600"
            onclick="document.getElementById('reviewsContainer').scrollBy({ left: 300, behavior: 'smooth' })">&#x276F;</button>
    </div>
</section>

<!-- CTA SECTION -->
<section class="py-16 bg-gradient-to-r from-teal-500 via-indigo-500 to-teal-400 dark:from-teal-600 dark:via-indigo-700 dark:to-teal-500 text-white text-center">
    <h3 class="text-3xl md:text-4xl font-bold mb-4">Want to Experience It Yourself?</h3>
    <p class="text-lg mb-6 max-w-2xl mx-auto">Browse our latest products and join thousands of satisfied customers today.</p>
    <a href="{{ route('product') }}"
       class="bg-amber-400 dark:bg-amber-500 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-amber-300 dark:hover:bg-amber-400 transition">
        Shop Now
    </a>
</section>


@endsection
