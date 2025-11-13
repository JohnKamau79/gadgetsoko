@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

    <!-- PRODUCT DETAILS -->
    <section class="max-w-4xl mx-auto my-16 bg-white p-8 rounded-lg shadow-md">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Product Image -->
            <div class="md:w-1/2">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-96 object-cover rounded-lg shadow-sm">
                @else
                    <div class="w-full h-96 flex items-center justify-center bg-gray-200 rounded-lg">
                        <span class="text-gray-500">No image available</span>
                    </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="md:w-1/2 space-y-4">
                <h2 class="text-3xl font-bold text-gray-900">{{ $product->title }}</h2>
                <p class="text-gray-600 text-sm uppercase tracking-wide">
                    Category: <span class="font-semibold text-gray-800">{{ $product->category ?? 'N/A' }}</span>
                </p>
                <p class="text-gray-700 leading-relaxed">
                    {{ $product->description ?? 'No description provided.' }}
                </p>
                <p class="text-2xl font-bold text-blue-600 mt-4">
                    ${{ number_format($product->price, 2) }}
                </p>

                <div class="mt-6">
                    <a href="{{ route('product') }}"
                        class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-700 transition">
                        Back to Products
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- RELATED PRODUCTS -->
    @if ($relatedProducts->count() > 0)
        <section class="max-w-6xl mx-auto my-16 px-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Related Products</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition overflow-hidden">
                        <a href="{{ route('productdetails', $relatedProduct) }}">
                            @if ($relatedProduct->image)
                                <img src="{{ asset('storage/' . $relatedProduct->image) }}"
                                    alt="{{ $relatedProduct->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 flex items-center justify-center bg-gray-200">
                                    <span class="text-gray-500">No image</span>
                                </div>
                            @endif
                            <div class="p-3">
                                <h4 class="font-semibold text-gray-800 text-lg truncate">{{ $relatedProduct->title }}</h4>
                                <p class="text-sm text-gray-500 mb-2">{{ $relatedProduct->category }}</p>
                                <p class="text-blue-600 font-bold">${{ number_format($relatedProduct->price, 2) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        <h3>No Related Products Found!</h3>

    @endif

@endsection
