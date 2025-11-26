@extends('layouts.app')

@section('title', 'Testimonial-Page')

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
    <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-24 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">What Our Customers Say</h2>
        <p class="text-lg md:text-xl max-w-3xl mx-auto">
            Read the experiences of our happy customers and discover why GadgetSoko is Kenya’s trusted electronics store.
        </p>
    </section>


    <section class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow my-10">
        <h2 class="text-xl font-semibold mb-4">Review Our Website</h2>

        @auth
            <form action="{{ route('testimonial.store') }}" method="POST">
                @csrf

                <label class="block font-medium mb-2">Rating</label>
                <select name="rating" class="border rounded p-2 w-full mb-4" required>
                    <option value="">Select Rating</option>
                    <option value="1">⭐ 1</option>
                    <option value="2">⭐⭐ 2</option>
                    <option value="3">⭐⭐⭐ 3</option>
                    <option value="4">⭐⭐⭐⭐ 4</option>
                    <option value="5">⭐⭐⭐⭐⭐ 5</option>
                </select>

                <label class="block font-medium mb-2">Review</label>
                <textarea name="review" rows="4" class="border rounded p-2 w-full mb-4"
                    placeholder="Write your thoughts about our website..."></textarea>

                <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Submit Review
                </button>
            </form>
        @else
            <p class="text-gray-600">
                <a href="{{ route('login') }}" class="text-blue-600 underline">Login</a> to leave a review.
            </p>
        @endauth
    </section>


    <!-- FEATURED TESTIMONIALS -->
    <section class="py-16 bg-white relative">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">User Reviews</h2>

            <!-- Scrollable container -->
            <div class="relative">
                <div class="flex space-x-6 pb-4">
                    @forelse ($latestReviews as $latestReview)
                        <div
                            class="bg-white rounded-xl shadow p-6 flex-shrink-0 w-80 flex flex-col items-center text-center">
                            <img src="{{ asset('storage/' . $latestReview->user->avatar) }}"
                                alt="{{ $latestReview->user->firstName }}"
                                class="w-20 h-20 rounded-full mb-4 object-cover object-center">

                            <span class="text-yellow-500">{{ str_repeat('⭐', $latestReview->rating) }}</span>

                            <p class="text-gray-600 italic mb-4">{{ $latestReview->review }}</p>

                            <h4 class="font-semibold text-blue-600">{{ $latestReview->user->firstName }}</h4>
                            <span class="text-gray-400 text-sm">{{ $latestReview->user->role ?? 'User' }}</span>
                            <p class="text-gray-500 text-sm mt-1">{{ $latestReview->created_at->diffForHumans() }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">No reviews yet. Be the first to review!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 bg-gray-100 relative">
        <div class="max-w-7xl mx-auto px-6 text-center mb-12">
            <h3 class="text-3xl font-bold text-gray-800">More Customer Experiences</h3>
            <p class="text-gray-600 mt-2">See why thousands trust GadgetSoko for electronics in Kenya.</p>
        </div>

        {{-- <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8"> --}}

        <!-- Scrollable container -->
        <div class="relative">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 scrollbar-hide scroll-smooth"
                id="reviewsContainer">
                @forelse ($reviews as $review)
                    <div class="bg-gray-50 rounded-xl shadow p-6 text-center">
                        <img src="{{ asset('storage/' . $review->user->avatar) }}" alt="{{ $review->user->name }}"
                            class="w-16 h-16 rounded-full mx-auto mb-4 object-cover object-center">
                        <span class="text-yellow-500">{{ str_repeat('⭐', $review->rating) }}</span>
                        <p class="text-gray-600 italic mb-3">
                            {{ $review->review }}
                        </p>
                        <h4 class="font-semibold text-blue-600">{{ $review->user->firstName }}</h4>
                        <span class="text-gray-400 text-sm">{{ $review->user->role ?? 'User' }}</span>
                        <p class="text-gray-500 text-sm mt-1">{{ $review->created_at->diffForHumans() }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">No reviews yet. Be the first to review!</p>
                @endforelse
            </div>

            <!-- Scroll buttons -->
            <button
                class="hidden md:flex absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white shadow rounded-full p-2 hover:bg-gray-100"
                onclick="document.getElementById('reviewsContainer').scrollBy({ left: -300, behavior: 'smooth' })">
                &#x276E; <!-- left arrow -->
            </button>
            <button
                class="hidden md:flex absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white shadow rounded-full p-2 hover:bg-gray-100"
                onclick="document.getElementById('reviewsContainer').scrollBy({ left: 300, behavior: 'smooth' })">
                &#x276F; <!-- right arrow -->
            </button>
        </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white text-center">
        <h3 class="text-3xl md:text-4xl font-bold mb-4">Want to Experience It Yourself?</h3>
        <p class="text-lg mb-6 max-w-2xl mx-auto">Browse our latest products and join thousands of satisfied customers
            today.</p>
        <a href="products.html"
            class="bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-yellow-300 transition">Shop
            Now</a>
    </section>

@endsection
