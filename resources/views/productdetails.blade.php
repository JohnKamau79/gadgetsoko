@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="bg-green-200 dark:bg-green-700 text-green-800 dark:text-green-200 p-3 rounded mb-4"
            x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if (session('error'))
        <div class="bg-red-200 dark:bg-red-700 text-red-800 dark:text-red-200 p-3 rounded mb-4" x-data="{ show: true }"
            x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
            {{ session('error') }}
        </div>
    @endif

    <!-- PRODUCT DETAILS -->
    <section class="max-w-4xl mx-auto my-16 bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Product Image -->
            <div class="md:w-1/2">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                        class="w-full h-96 object-cover rounded-lg shadow-sm">
                @else
                    <div class="w-full h-96 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-lg">
                        <span class="text-gray-500 dark:text-gray-300">No image available</span>
                    </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="md:w-1/2 space-y-4">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $product->title }}</h2>

                <p class="text-gray-600 dark:text-gray-300 text-sm uppercase tracking-wide">
                    Category:
                    <span class="font-semibold text-gray-800 dark:text-gray-100">{{ $product->category ?? 'N/A' }}</span>
                </p>

                <p class="text-gray-700 dark:text-gray-200 leading-relaxed">
                    {{ $product->description ?? 'No description provided.' }}
                </p>

                <p class="text-2xl font-bold text-teal-600 dark:text-teal-400 mt-4">
                    Ksh {{ number_format($product->price, 2) }}
                </p>

                <!-- CTA Buttons -->
                <div class="mt-6 flex flex-wrap gap-4">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-teal-600 dark:bg-teal-500 text-white px-6 py-2 rounded-lg hover:bg-teal-500 dark:hover:bg-teal-400 transition font-semibold">
                            {{ in_array($product->id, $cartProductsIds) ? 'Added' : 'Add to Cart' }}
                        </button>
                    </form>

                    <a href="{{ route('product') }}"
                        class="bg-gray-800 dark:bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-600 transition font-semibold">
                        Back to Products
                    </a>

                    <a href="{{ route('cart') }}"
                        class="bg-red-600 dark:bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-700 dark:hover:bg-red-600 transition font-semibold">
                        Cart
                    </a>
                </div>

                {{-- ADD REVIEW FORM INSIDE CARD --}}
                @auth
                    <div class="mt-8 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-inner">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Leave a Review</h3>
                        <form method="POST" action="{{ route('productReview.store', $product->id) }}" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">Rating</label>
                                <select name="rating"
                                    class="border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 w-full bg-gray-50 dark:bg-gray-600 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-teal-400 focus:outline-none transition">
                                    <option value="1">1 ★</option>
                                    <option value="2">2 ★★</option>
                                    <option value="3">3 ★★★</option>
                                    <option value="4">4 ★★★★</option>
                                    <option value="5">5 ★★★★★</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">Comment</label>
                                <textarea name="comment"
                                    class="border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 w-full bg-gray-50 dark:bg-gray-600 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-teal-400 focus:outline-none transition"
                                    rows="4"></textarea>
                            </div>

                            <button type="submit"
                                class="bg-teal-600 dark:bg-teal-500 text-white px-6 py-2 rounded-lg hover:bg-teal-500 dark:hover:bg-teal-400 transition font-semibold w-full">
                                Submit Review
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </section>

    {{-- PRODUCT REVIEWS --}}
    <section class="max-w-4xl mx-auto mb-16">
        <h3 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Reviews</h3>

        @forelse($product->reviews ?? [] as $review)
            <div class="border-b border-gray-200 dark:border-gray-700 py-4">
                <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $review->user->firstName ?? 'Guest' }}</p>
                <p>
                    Rating:
                    <span class="text-yellow-500">
                        {{ str_repeat('⭐', $review->rating) }}
                    </span>
                </p>
                <p class="text-gray-700 dark:text-gray-200">{{ $review->comment }}</p>
                <small class="text-gray-500 dark:text-gray-400">{{ $review->created_at->diffForHumans() }}</small>
            </div>
        @empty
            <p class="text-gray-500 dark:text-gray-400">No reviews yet.</p>
        @endforelse
    </section>

    {{-- RELATED PRODUCTS --}}
    @if ($relatedProducts->count() > 0)
        <section class="max-w-6xl mx-auto my-16 px-6">
            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Related Products</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($relatedProducts as $relatedProduct)
                    <div
                        class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm hover:shadow-md transition overflow-hidden">
                        <a href="{{ route('productdetails', $relatedProduct) }}">
                            @if ($relatedProduct->image)
                                <img src="{{ asset('storage/' . $relatedProduct->image) }}"
                                    alt="{{ $relatedProduct->title }}"
                                    class="w-full h-48 sm:h-56 md:h-48 lg:h-48 object-contain bg-gray-100 dark:bg-gray-700 p-2">
                            @else
                                <div class="w-full h-48 flex items-center justify-center bg-gray-200 dark:bg-gray-700">
                                    <span class="text-gray-500 dark:text-gray-400">No image</span>
                                </div>
                            @endif
                            <div class="p-3">
                                <h4 class="font-semibold text-gray-800 dark:text-gray-100 text-lg truncate">
                                    {{ $relatedProduct->title }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                    {{ $relatedProduct->category ?? 'N/A' }}</p>
                                <p class="text-teal-600 dark:text-teal-400 font-bold">
                                    Ksh {{ number_format($relatedProduct->price, 2) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        <h3 class="text-center text-gray-500 dark:text-gray-400">No Related Products Found!</h3>
    @endif

@endsection
